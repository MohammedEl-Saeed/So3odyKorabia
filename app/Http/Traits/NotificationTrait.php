<?php

namespace App\Http\Traits;

trait NotificationTrait
{
    public function getNotificationObject(string $title = "meat-village", string $body = "",
                                           string $notificationType = "",
                                          int $data_id = null, array $data_object = [])
    {
        return [
            'title' => $title,
            'body' => $body,
            'NotificationType' => $notificationType,
            'data_object' => $data_object,
            'data_id' => $data_id,
        ];
    }

    public function getUsers(array $ids)
    {
        return array_map(function ($value) {
            return (string)$value;
        }, $ids);
    }
}
