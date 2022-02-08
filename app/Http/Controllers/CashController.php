<?php

namespace App\Http\Controllers;

use App\Mail\OrderCheck;
use App\Repositories\InvoiceRepository;
use App\Repositories\OfferRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Http\Controllers\WebhookController;
use Stripe\StripeClient;

class CashController extends WebhookController
{
    public function show(Request $request)
    {
        $priceConfig=[
            'subscription' => [
                'name' => 'up_to_top',
                'price' => 'price_1KNtfvLxbTxLEi1k94EDqtQf',
                'amount'=>10,
                'url'=>'/accept/payment/subscription'
            ],
          'marketer' => [
              'name'=>'marketer_work',
              'price'=>'price_1KOig5LxbTxLEi1knhBZjSAJ',
              'amount'=>200,
              'url'=>'/accept/payment/one_time'
          ],

        ];
        return response()->view('payment',['paymentType'=>$priceConfig[$request->paymentType]]);
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
        $user->invoicePrice($request->price);
//        return response(['status'=>true]);
    }

    public function subscription(Request $request, OfferRepository $offerRepository)
    {
        $user = Auth::user();
//        if($user->subscribed($request->name)){
//            return response(['status'=>false]);
//        }
        $user->createOrGetStripeCustomer();
        if (!$user->hasPaymentMethod()){
            $user->addPaymentMethod($request->paymentMethod['id']);
        }
        $user->newSubscription($request->name, $request->price)
            ->create($request->paymentMethod['id']);
        $offerRepository->updateToTop(Auth::id());
//        return response(['status'=>true]);
    }
    public function handleWebhook(Request $request)
    {
        return parent::handleWebhook($request);
    }

    protected function handleCustomerSubscriptionCreated(array $payload)
    {
        /** @var InvoiceRepository $invoiceRepository */
        $invoiceRepository = app(InvoiceRepository::class);
        $user = Cashier::findBillable($payload['data']['object']['customer']);
        $invoice = $user->findInvoice($payload['data']['object']['latest_invoice']);
        Mail::to($user)->send(new OrderCheck($invoice,$user));
        $invoiceRepository->create(['invoice_id'=>$invoice->id,'user_id'=>$user->id,'invoice_number'=>$invoice->number]);
        return response(['Webhook Handled']);
    }

    protected function handleInvoicePaymentSucceeded(array $payload)
    {
        /** @var InvoiceRepository $invoiceRepository */
        $invoiceRepository = app(InvoiceRepository::class);
        $user = Cashier::findBillable($payload['data']['object']['customer']);
        $invoice = $user->findInvoice($payload['data']['object']['id']);
        Mail::to($user)->send(new OrderCheck($invoice,$user));
        $invoiceRepository->create(['invoice_id'=>$invoice->id,'user_id'=>$user->id,'invoice_number'=>$invoice->number]);
        return response(['Webhook Handled']);
    }

}
