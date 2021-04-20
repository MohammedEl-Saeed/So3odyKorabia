<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Services\ItemService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTraits;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    use ResponseTraits;
    protected $item_service;

    public function __construct(ItemService $item_service){
        $this->item_service = $item_service;
    }
    public function getItems(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'exists:products,id',
        ]);
        if ($validator->fails()) {
            return   $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->item_service->index($request->product_id)->get();
        return  $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

    public function getOptionsByItemId(Request $request){
        $validator = Validator::make($request->all(), [
            'item_id' => 'exists:items,id',
        ]);
        if ($validator->fails()) {
            return $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),0,200) ;
        }
        $data = $this->item_service->getOptionsByItemId($request->item_id);
        return $this->prepare_response(false,null,'return Successfully',$data,0 ,200);
    }

}
