<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
class CustomResetPasswordNotification extends  ResetPassword
{
    use Queueable;

    /*
     * Create a new notification instance.
     *
     * @return void
     */
    public $token;
    public function __construct($token)
    {
        $this->token=$token;
    }

    /*
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /*
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
            // return (new MailMessage)
            //     ->line('This is your custom text above the action button.')
            //     ->action('Reset Password', route('password.reset', ['token'=>$this->token]))
            //     ->line('This is your custom text below the action button.');

        return (new MailMessage)->subject('Password Reset!!!')->view(
                'email.forgotpassword',['token'=>$this->token]
            );

            
    }

    /*
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}