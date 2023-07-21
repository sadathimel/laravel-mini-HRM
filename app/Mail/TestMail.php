<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;



    public $send_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($send_email)
    {

        $this->send_email = $send_email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Asiatic MCL HRD',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function build()
    // {
    //     //  return $this->view('emails.test');
    //     return "test";
    // }

    public function build()
    {
        //return $this->view('backend.users.mail');
        return $this->subject('Mail from Asiatic MCL HRD')
            ->view('emails.test');
    }
}
