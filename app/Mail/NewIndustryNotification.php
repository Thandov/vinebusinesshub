<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewIndustryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $industry;
    public $business_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($industry, $business_name)
    {
        $this->industry = $industry;
        $this->business_name = $business_name;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $business_name = $this->business_name;
        $industry = $this->industry;

        return $this->subject('New Industry Added')
            ->to('ntokozoflex99@gmail.com')
            ->view('emails.newIndustry', [
                'business_name' => $business_name,
                'industry' => $industry,
            ]);

    }
}
