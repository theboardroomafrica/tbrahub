<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConnectionRequestNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
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
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Opportunity Connection Request')
            ->greeting('Dear ' . $notifiable->user->first_name . ',')
            ->line('You have a new connection request for an opportunity.')
            ->line('**Opportunity**: ' . $notifiable->opportunity->name)
            ->line('**Organisation**: ' . $notifiable->opportunity->company)
            ->action('View Opportunity Details', url('/opportunities/' . $notifiable->opportunity->id))
            ->line('Please visit the link above to confirm or decline your interest in this opportunity.')
            ->line('If you have any questions, feel free to reach out to us.')
            ->salutation('Best regards, TheBoardroom Africa Team');
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
