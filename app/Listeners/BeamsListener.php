<?php

namespace App\Listeners;

use App\Events\BeamsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Pusher\PushNotifications\PushNotifications;

class BeamsListener
{
    use InteractsWithQueue;

    protected $beams;

    public function __construct()
    {
        $this->beams = new PushNotifications(array(
            "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
            "secretKey" =>  env('PUSHER_BEAMS_SECRET_KEY'),
        ));
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(BeamsEvent $event)
    {
        $notificationData = array(
            "fcm" => array(
                "data" => $event->data
            ),
            "apns" => array(
                "aps" => array(
                    "alert" => $event->data,
                    "sound" => "default"
                )
            )
        );
        $result = $this->beams->publishToUsers($event->users, $notificationData);
        return ($result);
    }
}
