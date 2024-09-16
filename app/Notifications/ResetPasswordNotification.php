<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    
    private $resetLink;

    public function __construct($resetLink){
        $this->resetLink = $resetLink;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->mailer(env('MAIL_MAILER'))
        ->from(env('MAIL_FROM_ADDRESS'))
        ->subject('Reset Password Link')
        ->greeting('Hello Dr. Mohammed Alkholy')
        ->line('Hello there, You have requested to reset your password.')
        ->line('We cannot simply send you your old password. A unique link to reset your password has been generated for you. To reset your password, click the  following link and follow the instructions.')
        ->action('Reset Password', url($this->resetLink))
        ->line('نتمني لك حظا موفقا!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}