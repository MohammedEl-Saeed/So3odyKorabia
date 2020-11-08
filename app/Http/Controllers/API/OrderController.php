<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $service;

    public function __construct(ProductService $service){
        $this->service = $service;
    }
    public function getOptionsByProductId(Request $request){
        $data = $this->service->getOptionsByProductId($request->product_id);
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }
}
