<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentRegistered extends Notification
{
    use Queueable;

    public  $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data  = $data;
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
    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to Foundation University!')
            ->markdown('email.UserRegistrationMail', [
                'user_name' => $this->data['firstname'],
                'student_dept' => $this->data['student_dept'],
                'student_level' => $this->data['student_level'],
                'matric_number' => $this->data['matric_number'],
            ]);
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
