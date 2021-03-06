<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $activation_code;

    /**
     * Create a new message instance.
     * @param string
     * @return void
     */
    public function __construct($activation_code)
    {
        $this->activation_code=$activation_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.register');
    }
}
