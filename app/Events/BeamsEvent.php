<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BeamsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data = [];
    public $users = [];

    public function __construct(array $users, array $data)
    {
        $this->data = $data;
        $this->users = $users;
//        dd($users, $data);
    }

    public function broadcastOn()
    {
        return new Channel('auth-request');
    }

    public function broadcastWith()
    {
        return $this->data;
    }

    public function broadcastAs()
    {
        return 'key-dispatched';
    }
}
