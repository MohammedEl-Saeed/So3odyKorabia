<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\User;
use App\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SupportReply;

class MessageController extends Controller
{

    protected $service;

    public function __construct(MessageService $service){
        $this->service = $service;

    }

    public function index(){
        $data = $this->service->index();
        // dd($data->toArray());
        return view('admin.messages.index', compact('data'));
    }

    public function replyMessage($messageId){
        $item = $this->service->show($messageId);
        $item->email = $item->user->email;
        return view('admin.messages.replyMessage', compact('item'));
    }

    public function store(MessageRequest $request){
        $this->service->store($request);
        Mail::to($request->to)->send(new SupportReply($request));
        return redirect()->route('offers.index');
    }
}
