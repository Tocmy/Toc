<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GeneralMail extends Mailable
{
    use Queueable, SerializesModels;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $message;
    public $subject;
    public $attach;
    public function __construct($message, $subject, $attach=null)
    {
        $this-> message = $message;
        $this-> subject  = $subject;
        $this-> attach   = $attach;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->attach !=null) {
            return $this->subject($this->subject)->html($this->message)->attach($this->attach);
        }
        return $this->subject($this->subject)->html($this->message);
    }
}
