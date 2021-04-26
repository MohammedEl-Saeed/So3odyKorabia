<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Models\Order;
use App\Models\User;
use App\Utility\NotificationTypes;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function create(){
        return view('admin.notifications.insert');
    }

    public function send(NotificationRequest $request){
        $userIds = User::all()->pluck('id')->toArray();
        $title = $request->title;
        $body = $request->body;
        $notificationType = 'General News';
        $data_id = null;
        $this->sendNotification($userIds, $title, $body, $notificationType, $data_id);
//        $this->sendNotification($userIds, $request->title, $request->body, 'General News', null);
        return redirect()->route('notifications.create');
    }
}
