<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Services\ItemService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTraits;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use ResponseTraits;
    public function __construct(ProductService $product_service){
        $this->product_service = $product_service;
    }

    public function getProducts(Request $request){
        $validator = Validator::make($request->all(), [
            'type' => 'in:Sacrifice,Bird,Butter,Milk,Egg',
        ]);
        if ($validator->fails()) {
            return   $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        if($request->type == 'Egg' || $request->type == 'Milk' || $request->type == 'Butter'){
            $product = $this->product_service->index($request->type);
            $data['items'] = $this->item_service->index($product[0]->id);
            $data ['product_id'] = $product[0]->id;
        } else {
            $data = $this->product_service->index($request->type);
        }
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

}
