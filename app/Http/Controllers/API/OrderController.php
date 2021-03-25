<?php

namespace App\Http\Controllers\API;

use App\Events\BeamsEvent;
use App\Http\Controllers\Controller;
use App\Http\Traits\NotificationTrait;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTraits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use ResponseTraits, NotificationTrait;
    protected $service;

    public function __construct(OrderService $service){
        $this->service = $service;
    }

    public function createOrder(Request $request){
        $validator = Validator::make($request->all(), [
            'user_address_id' => 'required|exists:user_addresses,id',
            'code' => 'exists:offers,code',
            'payment_type'=>'required|in:0,1,2',
            'transfer_image'=>'required_if:payment_type,1|mimes:jpeg,jpg,bmp,png|max:20240'
        ]);
        if ($validator->fails()) {
            return $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        if(!is_null($request->code)) {
            $request->offer_id = $this->service->offerAvailability($request->code);
        }
        $data = $this->service->createOrder($request);
        if(is_null($data)){
            $message = 'Your cart is empty';
        }else{
            $data['url'] = url(route('vapulusPayment.payForm', $data['order_id']));
            $message = 'return Successfully';
        }
        return  $this->prepare_response(false,null,$message,$data,0 ,200);
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
            return $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->service->orderStatus($request->order_id);
        if($data->user_id != Auth::id()){
            $data = null;
            $message = 'You may not authorized to show this data';
        }else{
            $message = 'return Successfully';
        }
        return $this->prepare_response(false,null,$message,$data,0 ,200);
    }

    public function getCities(){
        $data = $this->service->getCities();
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

    public function getOffers(){
        $data = $this->service->getOffers();
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }


    public function deleteOrder(Request $request){
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
        ]);
        if ($validator->fails()) {
            return $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $this->service->delete($request->order_id);
        return $this->prepare_response(false,null,'return Successfully',null,0 ,200,4);
    }
}
