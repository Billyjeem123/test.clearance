<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RoleAssignedNotification extends Notification
{
    use Queueable;

    public mixed $unit;
    public mixed $staff;

    /**
     * Create a new notification instance.
     */
    public function __construct($unit, $staff)
    {
        $this->unit = $unit;
        $this->staff = $staff;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Role Assigned')
            ->markdown('emails.role_assigned', [
                'unit' => $this->unit,
                'staff' => $this->staff,
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
            'title' => 'New Role Assigned',
            'message' => 'Dear ' . $this->staff->name . ', you have been assigned a new role in the ' . $this->unit->unit_name . ' unit.'
        ];

    }
}
