<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;

class BlastChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toBlast($notifiable);
        try {

            $client = new \GuzzleHttp\Client();
            $response = $client->post(
                'https://blast.my/api/v1/sms',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . config('blast.api_token'),
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'phones' => $to,
                        'message' => $message,
                        'delay' => $delay ?? 0,
                        'webhook_url' => config('blast.app.web_hook'),
                    ],
                ]
            );
            $body = $response->getBody();
            print_r(json_decode((string) $body));
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }
    }
}