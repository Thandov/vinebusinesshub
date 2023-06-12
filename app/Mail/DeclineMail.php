<?php

namespace App\Mail;

use App\Models\Industry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeclineMail extends Mailable
{
    use Queueable, SerializesModels;

    public $industry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Industry $industry)
    {
        $this->industry = $industry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Industry Declined')
            ->view('emails.decline_notification');
    }
}