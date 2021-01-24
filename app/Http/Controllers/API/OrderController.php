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

    public function checkCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|exists:offers,code',
        ]);
        if ($validator->fails()) {
            return $this->prepare_response(true, $validator->errors(), 'Error validation', null, 0, 200);
        }
        $data = null;
        $codeId = $this->service->offerAvailability($request->code);
        $cart = $this->checkCart();
        if(!$cart){
            $message = 'You cart is empty!';
        }elseif(is_null($codeId)){
            $message = 'This code may you use before or not available now';
        }else{
            $data = $this->service->checkCode($request->code);
            $message = 'return Successfully';
        }
        event(new BeamsEvent(['1'], $data));

        //
//        event(new BeamsEvent($this->getUsers([$patient_id]),$this->getNotificationObject('Reservation',
//                'Doctor Accept  Your Reservation',
//                ProviderTypes::PATIENT,
//                ProviderTypes::DOCTOR,
//                NotificationTypes::DOCTOR_RESERVATION, $request->id)));
        //
        return $this->prepare_response(false,null,$message,$data,0 ,200,4);
    }
}
