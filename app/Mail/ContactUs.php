<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $contact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $contact)
    {
        $this->user = $user;
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contactus')->with('user',$this->user)->with('contact',$this->contact);
    }
}
