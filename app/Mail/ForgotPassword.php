<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }


    /**
     * Get the message content definition.
     */
    public function build()
    {
        $data = $this->data;
        return $this->markdown('emails.forgot-password')->subject('Forgot Password')->with('data',$data);

    }

}
