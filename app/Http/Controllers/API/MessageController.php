<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTraits;
use App\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    use ResponseTraits;
    protected $service;
    public function __construct(MessageService $service){
        $this->service = $service;
    }

    public function createMessage(Request $request){
        $validator = Validator::make($request->all(), [
            'text' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->service->store($request);
        return $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

}
