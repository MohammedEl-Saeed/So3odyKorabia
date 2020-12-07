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

    public function createOrder(){
            $data = $this->service->createOrder();
            return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
        }

}
