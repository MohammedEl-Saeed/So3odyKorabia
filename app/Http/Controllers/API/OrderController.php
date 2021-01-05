<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTraits;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use ResponseTraits;
    protected $service;

    public function __construct(OrderService $service){
        $this->service = $service;
    }

    public function createOrder(Request $request){
        $validator = Validator::make($request->all(), [
            'user_address_id' => 'required|exists:user_addresses,id',
            'code' => 'exists:offers,code',
        ]);
        if ($validator->fails()) {
            return $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        if(!is_null($request->code)) {
            $request->offer_id = $this->service->offerAvailability($request->code);
        }
        $data = $this->service->createOrder($request);
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

    public function getOrders(){
        $data = $this->service->getOrders();
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

    public function reOrder(Request $request){
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
        ]);
        if ($validator->fails()) {
            return   $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->service->reOrder($request->order_id);
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

    public function orderStatus(Request $request){
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
        ]);
        if ($validator->fails()) {
            return   $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->service->orderStatus($request->order_id);
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

    public function getCities(){
        $data = $this->service->getCities();
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }
}
