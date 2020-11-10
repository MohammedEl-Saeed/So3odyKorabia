<?php

namespace App\Services;

use App\Models\Item;
use App\Models\ItemOption;
use App\Repositories\ItemRepository;
 use App\Http\Traits\BasicTrait;
 use Carbon\CarbonPeriod;
 use Carbon\Carbon;
 use Auth;
 use DB;
use Illuminate\Database\Eloquent\Model;

class ItemService
{

   use  BasicTrait;
    protected $model ,$product;

    public function __construct()
    {
//        $this->model = $model;
        $this->product = new ItemRepository();
    }
    /** get all product by productId  */
    public function index($productId){
        return $this->product->index($productId)->get();
    }

    /** add new product to sysytem */
    public function store($request){
        return $this->product->store($request);
    }

    /** show specific product  */
    public function show($id){
         return $this->product->show($id);
    }

    /** accept updates for product */
    public function update($updated_data){
        return  $this->product->update($updated_data);
    }

    /** block specific product */

    public function blockStatus($product_id){

        return  $this->product->blockStatus( $product_id);

    }

    public function unblockStatus( $product_id){

        return  $this->product->unblockStatus( $product_id);
    }


//    public function getServices(){
//        return $this->product->getServices();
//    }

    /** delete product */
    public function delete(){
        return $this->product->delete();
    }

    public function getOptionsByItemId($productId){
       $data = $this->product->getOptionsByItemId($productId);
        dd($data);
        return $data;
    }

    public function getOptions(){
        return $this->product->getOptions();
    }

}
