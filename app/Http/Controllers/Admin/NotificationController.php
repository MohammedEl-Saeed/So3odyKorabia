<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function create(){
        return view('admin.notifications.insert');
    }

    public function send(NotificationRequest $request){
        $userIds = User::all()->pluck('id')->toArray();
        return redirect()->route('notifications.create');
    }
}
