<?php

namespace App\Http\Controllers;

use App\Listeners\StripeEventListener;
use App\Mail\OrderCheck;
use App\Repositories\OfferRepository;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Http\Controllers\WebhookController;
use Stripe\Stripe;
use Stripe\StripeClient;

class CashController extends WebhookController
{
    public function show(Request $request)
    {

        return response()->view('payment');
    }

    public function createIntent()
    {
        $stripe = new StripeClient(
            env('STRIPE_SECRET')
        );
        return response(['intent'=>$stripe->setupIntents
            ->create
            ([
                'payment_method_types' => ['card'],
            ])
        ]);
    }

    public function oneTimePayment(Request $request)
    {
        $user = Auth::user();
        $user->createOrGetStripeCustomer();
        if (!$user->hasPaymentMethod()){
            $user->addPaymentMethod($request->paymentMethod['id']);
        }
        $user->updateDefaultPaymentMethod($request->paymentMethod['id']);
        $user->invoicePrice('price_1KOig5LxbTxLEi1knhBZjSAJ');
    }

    public function subscription(Request $request, OfferRepository $offerRepository)
    {
        $user = Auth::user();
        if($user->subscribed('up to top')){
            return response(['status'=>false]);
        }
        $user->createOrGetStripeCustomer();
        if (!$user->hasPaymentMethod()){
            $user->addPaymentMethod($request->paymentMethod['id']);
        }
        $user->newSubscription('up to top', 'price_1KNtfvLxbTxLEi1k94EDqtQf')
            ->create($request->paymentMethod['id']);
        $offerRepository->updateToTop(Auth::id());
        return response(['status'=>true]);
    }
    public function handleWebhook(Request $request)
    {
        return parent::handleWebhook($request);
    }

    protected function handleCustomerSubscriptionCreated(array $payload)
    {
        $user = Cashier::findBillable($payload['data']['object']['customer']);
        $invoice = $user->findInvoice($payload['data']['object']['latest_invoice']);
        Mail::to($user)->send(new OrderCheck($invoice,$user));
        return response(['Webhook Handled']);
    }

    protected function handleInvoicePaymentSucceeded(array $payload)
    {
        $user = Cashier::findBillable($payload['data']['object']['customer']);
        $invoice = $user->findInvoice($payload['data']['object']['id']);
        Mail::to($user)->send(new OrderCheck($invoice,$user));
        return response(['Webhook Handled']);
    }

}
