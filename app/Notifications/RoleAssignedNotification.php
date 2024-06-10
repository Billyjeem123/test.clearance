<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RoleAssignedNotification extends Notification
{
    use Queueable;

    public mixed $details;
    public $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($details, $type)
    {
        $this->details = $details;
        $this->type = $type;
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
       if($this->type === "Assigned"){
           return (new MailMessage)
               ->greeting('Dear ' . $notifiable->name . ',')
               ->line('You have been assigned a new role: ' . $this->details['role'])
               ->line('Please login to the portal and use  your email and  pass key for logging in.')
               ->line('Pass Key: ' . $this->details['pass_key'])
               ->line('Email: ' . $this->details['email'])
               ->line('Thank you for your dedication and hard work!')
               ->line('Best regards,')
               ->line('The Fountain Team');
       }else{
           return (new MailMessage)
               ->greeting('Dear ' . $notifiable->name . ',')
               ->line('You have been relieved of  your role: ' . $this->details['role'])
               ->line('Thank you!')
               ->line('Best regards,')
               ->line('The Fountain Team');
       }
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {

        if($this->type === "Assigned"){

            return [
                'title' => 'New Role Assigned',
                'message' => 'Dear ' . $this->details['name'] . ', you have been assigned a new role in the ' . $this->details['role'] . ' unit.'
            ];
        }else{

            return [
                'title' => 'You have been relieved of your duties',
                'message' => 'Dear ' . $this->details['name'] . ', you have been   relieved of your  role  as the' . $this->details['role'] . ' unit.'
            ];
        }


    }
}
