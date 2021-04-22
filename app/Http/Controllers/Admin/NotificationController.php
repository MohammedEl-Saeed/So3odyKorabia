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
//        $userIds = ["5"];
        $title = $request->title;
        $body = $request->body;
        $notificationType = NotificationTypes::UPDATE_ORDER_STATUS;
        $data_id = '1';
//        $user_id = [Order::find($id)->user_id];
        $this->sendNotification($userIds, $title, $body, $notificationType, null);
//        $this->sendNotification($userIds, $request->title, $request->body, 'General News', null);
        return redirect()->route('notifications.create');
    }
}
