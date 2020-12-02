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
    protected $model ,$item;

    public function __construct()
    {
//        $this->model = $model;
        $this->item = new ItemRepository();
    }
    /** get all item by itemId  */
    public function index($productId){
        return $this->item->index($productId)->get();
    }

    /** add new item to sysytem */
    public function store($request){
        return $this->item->store($request);
    }

    /** show specific item  */
    public function show($id){
         return $this->item->show($id);
    }

    /** accept updates for item */
    public function update($updated_data){
        return  $this->item->update($updated_data);
    }

    /** block specific item */

    public function blockStatus($item_id){

        return  $this->item->blockStatus( $item_id);

    }

    public function unblockStatus( $item_id){

        return  $this->item->unblockStatus( $item_id);
    }


//    public function getServices(){
//        return $this->item->getServices();
//    }

    /** delete item */
    public function delete(){
        return $this->item->delete();
    }

    public function getOptionsByItemId($itemId){
       $data = $this->item->getOptionsByItemId($itemId);
        return $data;
    }

    public function getOptions(){
        return $this->item->getOptions();
    }

}
