<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTraits;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    use ResponseTraits;
    protected $service;
    public function __construct(CartService $service){
        $this->service = $service;
    }

    public function addToCart(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'item_id' => 'required|exists:items,id',
            'item_options_ids.*' => 'exists:items_options,id',
            'total_price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return   $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->service->addToCart($request);
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

    public function showCartInfo(Request $request){
        $data = $this->service->showCartInfo($request);
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

     public function editCart(Request $request){
        $validator = Validator::make($request->all(), [
            'cart_details_id' => 'required|exists:cart_details,id',
            'item_options_ids.*' => 'exists:items_options,id',
            'total_price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return   $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->service->editCart($request, $request->cart_details_id);
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

     public function removeFromCart(Request $request){
        $validator = Validator::make($request->all(), [
            'cart_details_id' => 'required|exists:cart_details,id',
        ]);
        if ($validator->fails()) {
            return   $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->service->delete($request->cart_details_id);
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

      public function EmptyCart(){
        $data = $this->service->emptyCart();
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }



}
