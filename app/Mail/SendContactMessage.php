<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactMessage extends Mailable
{
    use Queueable, SerializesModels;
    public $sender_name;
    public $reciever_name;
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender_name, $reciever_name, $msg)
    {
        $this->sender_name = $sender_name;
        $this->reciever_name = $reciever_name;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.name');
    }
}