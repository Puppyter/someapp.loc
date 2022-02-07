<?php

namespace App\Services;

use App\Mail\OrderCheck;
use App\Repositories\OfferRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CashService
{
    public function sendMail($user,$invoice)
    {
        Mail::to($user)->send(new OrderCheck($invoice, $user));
    }

    public function checkPaymentMethod($user,$paymentMethod)
    {
        if (!$user->hasPaymentMethod()){
            $user->addPaymentMethod($paymentMethod['id']);
        }
    }

    public function oneTimePayment($user,$paymentMethod)
    {

    }

    public function subscription($user,$paymentMethod)
    {
        /** @var OfferRepository $offerRepository */
        $offerRepository = app(OfferRepository::class);
        $this->checkPaymentMethod($user,$paymentMethod);
        $subscription = $user->newSubscription('up to top', 'price_1KNtfvLxbTxLEi1k94EDqtQf')
            ->create($paymentMethod['id']);
        $offerRepository->updateToTop(Auth::id());
        $this->sendMail($user,$user->invoices()
            ->filter(function ($invoice) use($subscription){
                return $invoice->subscription === $subscription->stripe_id;
            })[0]);
    }
}
