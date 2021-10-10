<?php
namespace App\Services;

use Error;
use ErrorException;
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
     * backup /cka-crm_mail
     */

    Public function send($data, $template, $text =null){
        $template = $template ? [$template, $text] : ['text' => $text];
        Mail::send($template, $data, function ($message) use($data) {
            unset($data['content']);
            foreach ($data as $key => $value){
                if (is_array($key)) {
                    foreach ($value as $v){
                        $message->{$key}($v);
                    }
                }else {
                    try{
                        $message->{$key}($value);
                    } catch(ErrorException $e){
                        $message->{$key} = $value;
                    }
                }
            }
        });
    }
}

?>
