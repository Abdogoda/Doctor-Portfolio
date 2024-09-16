<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessageNotification extends Notification
{
    use Queueable;

    private $appointmentDetails;

    public function __construct($appointmentDetails){
        $this->appointmentDetails = $appointmentDetails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
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
            ->subject('تم حجز موعد جديد')
            ->greeting('مرحباً دكتور محمد!')
            ->line('تم حجز موعد جديد بالتفاصيل التالية:')
            ->line('الاسم: ' . $this->appointmentDetails['name'])
            ->line('رقم الهاتف: ' . $this->appointmentDetails['phone'])
            ->line('البريد الإلكتروني: ' . $this->appointmentDetails['email'])
            ->line('التاريخ والوقت: ' . $this->appointmentDetails['time'])
            ->line('الخدمة: ' . $this->appointmentDetails['service'])
            ->action('عرض المواعيد', url('/admin/messages'))
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