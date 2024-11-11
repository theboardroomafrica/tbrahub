<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConnectionResponseNotification extends Notification implements ShouldQueue
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
    public function toMail(object $notifiable): MailMessage
    {

        $subject = "Member " . strtolower($notifiable->statusText) . " interest in {$notifiable->opportunity->name}";

        return (new MailMessage)
            ->subject($subject)
            ->greeting('Hi,')
            ->line("A member has responded to your request to connect.")
            ->line("**Opportunity**: " . $notifiable->opportunity->name)
            ->line("**Member**: " . $notifiable->user->name)
            ->line("**Response**: The member **" . strtolower($notifiable->statusText) . "** this opportunity.")
            ->line('Thank you for using TheBoardroom Africa to connect with talented professionals.')
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
