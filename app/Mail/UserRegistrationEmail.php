<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;



use App\User;


class UserRegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * User Object
     *
     * @var User
     */
     public $user;

     /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(User $user)
     {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.userRegistationEmail');
    }
}
