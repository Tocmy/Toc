<?php
namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{

    /**
     * use Illuminate\Contracts\Translation\HasLocalePreference;
     *  public function preferredLocale()
    *   {
    *    return $this->locale;
    *    }
     *   Mail::to($request->user())->send(new OrderShipped($order));
     */

    Public function send($data, $template, $text =null){
        $template = $template ? [$template, $text] : ['text' => $text];
        Mail::send('Html.view', $data, function ($message) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->sender('john@johndoe.com', 'John Doe');
            $message->to('john@johndoe.com', 'John Doe');
            $message->cc('john@johndoe.com', 'John Doe');
            $message->bcc('john@johndoe.com', 'John Doe');
            $message->replyTo('john@johndoe.com', 'John Doe');
            $message->subject('Subject');
            $message->priority(3);
            $message->attach('pathToFile');
        });
    }
}

?>
