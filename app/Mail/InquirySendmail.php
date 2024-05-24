<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquirySendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $inquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inquiry)
    {
        $this->email = $inquiry['email'];
        $this->inquiry = $inquiry['contact'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->email)
            ->subject('自動送信メール')
            ->view('inquiry.mail')
            ->with([
                'email' => $this->email,
                'contact' => $this->inquiry,
            ]);
    }
}
