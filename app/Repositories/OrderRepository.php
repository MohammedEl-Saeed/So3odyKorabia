<?php namespace App\Repositories;

use App\Http\Traits\ResponseTraits;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\models\Service;
use App\models\UserServiceDepartment;
use App\Http\Traits\BasicTrait;
use App\models\User;
use Carbon\Carbon;
use DB;
use Auth;

class OrderRepository
{
    use  BasicTrait;
    use ResponseTraits;
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct()
    {
        $this->model = new OrderDetail();
    }

    /** get all orders due to type */
    public function index(){
        $this->model = new Order();
        return  $this->model;

    }

    /** add new order in system */
    public function createOrder(){
        $cartDetails = CartDetail::where('user_id',Auth::id())->get();
        $order = $this->newOrder();
        foreach($cartDetails as $cartDetail){
            $this->model->product_id = $cartDetail->product_id;
            $this->model->item_id = $cartDetail->item_id;
            $this->model->item_options_ids = $cartDetail->item_options_ids;
            $this->model->total_price = $cartDetail->total_price;
            $this->model->quantity = $cartDetail->quantity;
            $this->model->product_type = $cartDetail->product_type;
            $this->model->order_id = $order->id;
            $this->model->user_id = Auth::id();
            $this->model->save();
        }
        return $this->model;
    }

    /** show specific order  */
    public function show($id){
        return  $this->traitShow($this->model ,$id);
    }

    /** update order Or when Accepting Update request , new changes will be add to order */
    public function update($request, $id){
        $arr= [];
        $arr['code'] = $request->code;
        $arr['description'] = $request->description;
        $arr['discount'] = $request->discount;
        $arr['discount_type'] = $request->discount_type;
        $arr['start_at'] = $request->start_at;
        $arr['end_at'] = $request->end_at;
        $arr['status'] = $request->status;

        return $this->traitupdate($this->model , $id ,$arr);
    }

    /** get all updates request */
    public function getUpdatesRequest($type){
        return $this->traitIndex($this->model);
    }


    /** change status for  comming model  */
    public function updateStatus($status ,$id){
        return $this->traitUpdateStatus($this->model ,$status ,$id);
    }


     /** admin can block order . If admin blocked order , order couldn`t logged in */
    public function blockStatus($blocked_reason =null , $proudct_id){
            $arr['block']=true;
        return $this->traitupdate($this->model, $proudct_id, $arr);
    }

    public function unblockStatus($proudct_id){
        $arr['block']=false;
        return $this->traitupdate($this->model,$proudct_id,$arr);
    }

    public function getOrderDetails($orderId){
        $order = $this->show($orderId);
    }

    public function newOrder(){
        $cart = Cart::where('user_id',Auth::id())->first();
        $order = new Order();
        $order->total_price = $cart->total_price;
        $order->user_id = Auth::id();
        $order->status = 'Waiting';
        $order->save();
        return $order;
    }

    public function getOrders(){

    }

}
