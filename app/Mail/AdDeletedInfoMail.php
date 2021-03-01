<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdDeletedInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $adMailDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adMailDetails)
    {
        $this->adMailDetails = $adMailDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail From ClassiHut')->view('emails.ad_deleted_info_mail')->with(['adMailDetails', $this->adMailDetails]);
    }
}
