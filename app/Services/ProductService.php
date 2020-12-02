<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductOption;
use App\Repositories\ProductRepository;
 use App\Http\Traits\BasicTrait;
 use Carbon\CarbonPeriod;
 use Carbon\Carbon;
 use Auth;
 use DB;
use Illuminate\Database\Eloquent\Model;

class ProductService
{

   use  BasicTrait;
    protected $model ,$product;

    public function __construct()
    {
//        $this->model = $model;
        $this->product = new ProductRepository();
    }
    /** get all product by type  */
    public function index($type){
        return $this->product->index($type)->get();
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

    public function getOptionsByProductId($productId){
       $data = $this->product->getOptionsByProductId($productId);
        return $data;
    }

    public function getOptions(){
        return $this->product->getOptions();
    }

    public function checkProduct($type){
        $product = Product::where('type',$type)->first();
        if(is_null($product)){
            $product = new Product();
            $product->name = $type;
            $product->description = $type;
            $product->type = $type;
            $product->save();
        }
        return $product;
    }
}
