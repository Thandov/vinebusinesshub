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
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Industry $industry, $status)
    {
        $this->industry = $industry;
        $this->status = $status;
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
