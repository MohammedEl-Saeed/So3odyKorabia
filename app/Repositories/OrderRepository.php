<?php namespace App\Repositories;

use App\Http\Traits\ResponseTraits;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\ItemsOption;
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
        $this->model = new Order();
    }

    /** get all orders due to type */
    public function index(){
        return  $this->model;

    }

    /** add new order in system */
    public function createOrder(){
        $cart = Cart::where('user_id',Auth::id())->first();
        if(is_null($cart)){
            return 'Cart is empty';
        } else {
            $order = $this->newOrder();
            $cartDetails = CartDetail::where('user_id', Auth::id())->get();
            $this->addOrderDetails($cartDetails, $order->id);
            $this->updateOrderPrice($order->id);
            return $this->model;
        }
    }

    /** show specific order  */
    public function show($id){
        $data = [];
        $order = $this->traitShow($this->model, $id);
        $data['total_price'] = $order->total_price;
        $data['order_id'] = $order->id;
        $data['user'] = $order->user->getData();
        $orderDetails = OrderDetail::where('order_id',$order->id)->get();
        foreach($orderDetails as $orderDetail){
            $results[] = $orderDetail->getData();
        }
        $data['orderDetails'] =$results;
        return $data;
    }

    /** change status for  comming model  */
    public function updateStatus($status ,$id){
        return $this->traitUpdateStatus($this->model ,$status ,$id);
    }

    public function newOrder(){
            $this->model->user_id = Auth::id();
            $this->model->status = 'Waiting';
            $this->model->save();
            return $this->model;
    }

    public function getOrders(){
        $data = [];
        $orders = $this->model->where('user_id',Auth::id())->get();
        foreach($orders as $order){
            $orderInfo = $this->show($order->id);
            unset($orderInfo['user']);
            $data[] = $orderInfo;
        }
        return $data;
    }

    public function reOrder($orderId){
        $orderDetails = OrderDetail::where('order_id',$orderId)->get();
        $order = $this->newOrder();
        $this->addOrderDetails($orderDetails, $order->id);
        $this->updateOrderPrice($order->id);
        return $order;
    }

    public function getTotalPriceFormItem($itemOptionIds){
        $itemOptionIds = explode(',',$itemOptionIds);
        $totalPrice = ItemsOption::find($itemOptionIds)->sum('price');
        return $totalPrice;
    }

    public function updateOrderPrice($orderId){
        $price = OrderDetail::where('order_id', $orderId)->sum('total_price');
        return $this->model->update(['total_price'=>$price]);
    }

    public function addOrderDetails($cartDetails, $orderId){
        foreach($cartDetails as $cartDetail){
            $orderDetail = new OrderDetail();
            $orderDetail->product_id = $cartDetail->product_id;
            $orderDetail->item_id = $cartDetail->item_id;
            $orderDetail->item_options_ids = $cartDetail->item_options_ids;
//            $orderDetail->total_price = $cartDetail->total_price;
            $orderDetail->total_price = $this->getTotalPriceFormItem($cartDetail->item_options_ids);
            $orderDetail->quantity = $cartDetail->quantity;
            $orderDetail->product_type = $cartDetail->product_type;
            $orderDetail->order_id = $orderId;
            $orderDetail->user_id = Auth::id();
            $orderDetail->save();
        }
    }
}
