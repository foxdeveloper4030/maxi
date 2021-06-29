<?php

namespace App\Listners;

use App\Exceptions\MySMSKavenegarException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Kavenegar;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class sendVerificationNotification
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
     * @param  Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
//        if (!$event->user->hasVerified()) {         //  send by sms
        if ($event->field == 'mobile') {
            try {
                $activeCode = $event->user->activation_code;
                $receptor = $event->user->user_temp;
                if (strcmp($receptor, 'verified' . $event->user->id) == 0) {   //  for User purchase Or forget password
                    $receptor = $event->user->mobile;
                }
                $result = Kavenegar::VerifyLookup($receptor, $activeCode, '', '', 'verifyRegister');
//                    dd($result);
            } catch (ApiException $e) {
                echo '1' . $e->errorMessage();
                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
//                    throw new MySMSKavenegarException($e->errorMessage());
            } catch (HttpException $e) {
                echo '1' . $e->errorMessage();
                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
//                    throw new MySMSKavenegarException($e->errorMessage());
            }
        } elseif ($event->field == 'email') {       //  send by email
            $activation_code = $event->user->activation_code;
            $addressEmail = $event->user->user_temp;
            if (strcmp($addressEmail, 'verified' . $event->user->id) == 0) {   //  for User purchase Or forget password
                $addressEmail = $event->user->email;
            }
            $subject = $event->subject;
            $this->html_email($activation_code, $addressEmail, $subject);
        }
//        }
    }

    public function basic_email($activation_code, $addressEmail, $subject)
    {
        $data = array('activation_code' => $activation_code);
        $fromAddressMailer = config('mail.from.address');

        Mail::send(['text' => 'email.register'], $data, function ($message)
        use ($addressEmail, $subject, $fromAddressMailer) {
            $message->to($addressEmail, 'maximorse ')->subject($subject);
            $message->from($fromAddressMailer, 'alireza');
        });
    }

    public function html_email($activation_code, $addressEmail, $subject)
    {
        $data = array('activation_code' => $activation_code);
        $fromAddressMailer = config('mail.from.address');

        Mail::send('email.register', $data, function ($message)
        use ($addressEmail, $subject, $fromAddressMailer) {
            $message->to($addressEmail, 'maximorse ')->subject($subject);
            $message->from($fromAddressMailer, 'maximorse ');
        });
    }

    public function attachment_email()
    {
        $data = array('name' => "Virat Gandhi");
        Mail::send('mail', $data, function ($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            $message->from('xyz@gmail.com', 'Virat Gandhi');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }
}
