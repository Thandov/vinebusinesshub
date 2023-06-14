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
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Industry $industry, $status, $url)
    {
        $this->industry = $industry;
        $this->status = $status;
        $this->url = $url;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = 'https://www.kayiseit.co.za/';

        return $this->subject('Industry Declined')
            ->view('emails.decline_notification', ['url' => $url]);

    }
}
