<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotifactions extends Notification
{
    use Queueable;
    public $token;
    public static $toMailCallback;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable,$this->token);
        }

        return (new MailMessage)
                    ->subject(__('Reset Password Notification Email'))
                    ->line(__('You are receiving this email because we received a password reset request for your account.'))
                    ->action(__('Reset Password'),url(config('app.url').route('auth.password.rest',
                                ['token' => $this->token,
                                 'email' => $notifiable->getEmailForPasswordReset() ], false)))
                    ->line(__('This password reset link will expire in:count minute.',
                           [
                               'count' => Config('auth.password.' .config('auth.default.password'). 'expire')
                           ]))
                    ->line(__('If you did not request a password reset, no further action is required'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
