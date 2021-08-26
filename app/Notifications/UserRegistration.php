<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;

class UserRegistration extends Notification
{
    use Queueable;
    public static $toMailCallback;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user = $notifiable;
        if ($user->email_verified_at == '') {
            $verificationUrl = $this->verificationUrl($notifiable);

            if (static::$toMailCallback) {
                return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
            }
            return (new MailMessage())
                    ->subject(__('Thank you for registration'))
                    ->line(__('Please click the button below to verify your email address'))
                    ->action(__('verify Email Address'), $verificationUrl)
                    ->line(__('If you did not create an account, no further action is required. '));

        }
        return (new MailMessage)
                   ->subject(__('Thank you for registration'))
                   ->line(__('Thank you for registration at'.Config::get('app.name'). '.'))
                   ->action(__('Vist Application'), url('/'))
                   ->line(__('We are really happy that you started to use.'.Config::get('app.name').'!' ));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            //
        ];
    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinute(Config::get('auth.verification.expire', 60)),
            [
                'id'    =>$notifiable->getKey(),
                'hash'  =>sha1($notifiable->getEmailForVerification()),
            ]
            );
    }
}
