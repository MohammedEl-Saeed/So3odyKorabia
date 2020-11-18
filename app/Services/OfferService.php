<?php

namespace App\Services;

use App\Models\Offer;
use App\Repositories\OfferRepository;
 use App\Http\Traits\BasicTrait;
 use Carbon\CarbonPeriod;
 use Carbon\Carbon;
 use Auth;
 use DB;
use Illuminate\Database\Eloquent\Model;

class OfferService
{

   use  BasicTrait;
    protected $model ,$product;

    public function __construct()
    {
//        $this->model = $model;
        $this->product = new OfferRepository();
    }
    /** get all product by type  */
    public function index(){
        return $this->product->index()->get();
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

}
