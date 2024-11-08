<?php

namespace App\Notifications\Channels;


use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class WebhookChannel
{
    public function send($notifiable, Notification $notification)
    {
        $webhookUrl = config('services.webhook.url');

        // Check if the notification has a `toWebhook` method
        if (method_exists($notification, 'toWebhook')) {
            $data = $notification->toWebhook($notifiable);
            Http::post($webhookUrl, $data);
        }
    }
}
