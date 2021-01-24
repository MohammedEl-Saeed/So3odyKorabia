<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\PushNotifications\PushNotifications;

class PusherController extends Controller
{
    public function getPusherBeamsToken()
    {
        $user = Auth::user();
        $beamsClient = new PushNotifications(array(
            'secretKey' =>  config('broadcasting.connections.beams.secret_key'),
            'instanceId' => config('broadcasting.connections.beams.instance_id'),
        ));
        $beamsToken = $beamsClient->generateToken((string)$user->id);
        return response()->json($beamsToken);
    }
}
