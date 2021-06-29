<?php

namespace App\Listners;

use App\Events\EventPurchase;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar;

class sendSmsPurchaseNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param EventPurchase $event
     * @return void
     */
    public function handle(EventPurchase $event)
    {
        $email = $event->user->email;
        $mobile = $event->user->mobile;
        $price = $event->price;
        $refrence = $event->reference;
        $buyerMobile = $event->buyerMobile;
        $msg = $event->msg;
        if (!empty($mobile)) {
            $userMobile = $mobile;
            try {
                $result = Kavenegar::VerifyLookup($userMobile, $refrence, $price, '', 'PurchaseReview');
            } catch (ApiException $e) {
                echo '1' . $e->errorMessage();
            } catch (HttpException $e) {
                echo '2' . $e->errorMessage();
            }
        } elseif (!empty($email)) {
            $userEmail = $event->user->email;
            $subject = $refrence . " سفارش";
            $this->html_email($refrence, $price, $userEmail, $subject, $msg);
        }

        //  for buyer user ...
        if ($buyerMobile != $mobile) {
            try {
                $result = Kavenegar::VerifyLookup($buyerMobile, $refrence, $price, '', 'PurchaseReview');
            } catch (ApiException $e) {
                echo '1' . $e->errorMessage();
            } catch (HttpException $e) {
                echo '2' . $e->errorMessage();
            }
        }
    }

    public function html_email($refrence, $price, $addressEmail, $subject, $msg)
    {
        $data = array('refrence' => $refrence, 'price' => $price, 'msg' => $msg);
        $fromAddressMailer = config('mail.from.address');

        Mail::send('email.purchase', $data, function ($message)
        use ($addressEmail, $subject, $fromAddressMailer) {
            $message->to($addressEmail, 'maximorse ')->subject($subject);
            $message->from($fromAddressMailer, 'maximorse ');
        });
    }
}
