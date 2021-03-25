<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\PushNotifications\PushNotifications;

class PusherController extends Controller
{

//    public $pusher;

//    public function __construct()
//    {
//        $this->pusher = new \Pusher\Pusher(
//            config('broadcasting.connections.pusher.key'),
//            config('broadcasting.connections.pusher.secret'),
//            config('broadcasting.connections.pusher.app_id'),
//            [
//                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
//                'encrypted' => false
//            ]
//        );
//    }
//
//    public function authPusherChannel(Request $request)
//    {
//        $result = $this->pusher->socket_auth($request->channel_name, $request->socket_id);
//        return ($result);
//    }

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
