<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepository;
 use App\Http\Traits\BasicTrait;
 use Carbon\CarbonPeriod;
 use Carbon\Carbon;
 use Auth;
 use DB;
use Illuminate\Database\Eloquent\Model;

class OrderService
{

   use  BasicTrait;
    protected $model ,$order;

    public function __construct()
    {
//        $this->model = $model;
        $this->order = new OrderRepository();
    }
    /** get all order by type  */
    public function index(){
        return $this->order->index();
    }

    /** add new order to database */
    public function createOrder(){
        return $this->order->createOrder();
    }

    /** show specific order  */
    public function show($id){
         return $this->order->show($id);
    }

    /** accept updates for order */
    public function update($updated_data){
        return  $this->order->update($updated_data);
    }

    /** block specific order */

    public function blockStatus($order_id){
        return  $this->order->blockStatus( $order_id);
    }

    public function unblockStatus( $order_id){
        return  $this->order->unblockStatus( $order_id);
    }

//    public function getServices(){
//        return $this->order->getServices();
//    }

    /** delete order */
    public function delete(){
        return $this->order->delete();
    }

    /** update status for order by accept or reject  */
    public function updateStatus($status ,$id){
        return $this->user->updateStatus($status ,$id);
    }

}
