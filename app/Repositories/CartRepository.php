<?php namespace App\Repositories;

use App\Http\Traits\ResponseTraits;
use App\Models\CartDetail;
use App\Models\Option;
use App\Models\Cart;
use App\models\Service;
use App\models\UserServiceDepartment;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\FileHelper;
use App\Http\Traits\BasicTrait;
use App\models\User;
use App\models\CopyUser;
use App\models\Department;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlockedMail;
use App\Mail\ApprovedMail;
use Carbon\Carbon;
use DB;
use Auth;

class CartRepository
{
    use  BasicTrait;
    use ResponseTraits;
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct()
    {
        $this->model = new CartDetail();
    }

    /** get all users due to type */
    public function index(){
        return  $this->model;

    }

    /** add new user in system */
    public function addToCart($request){
        $this->model->product_id = $request->product_id;
        $this->model->item_id = $request->item_id;
        $this->model->item_options_ids = implode(',',$request->item_options_ids);
        $this->model->total_price = $request->total_price;
        $this->model->quantity = $request->quantity;
        $this->model->product_type = $request->product_type;
        $cart = $this->updateCart($request->total_price);
        $this->model->cart_id = $cart->id;
        $this->model->user_id = Auth::id();
        $this->model->save();
        return $this->model;

    }

    /** show specific user  */
    public function show($id){
        return  $this->traitShow($this->model ,$id);
    }

    /** update cart details info */
    public function editCart($request, $id){
        $arr= [];
        $arr['item_options_ids'] = implode(',',$request->item_options_ids);
        $arr['total_price'] = $request->total_price;
        $arr['quantity'] = $request->quantity;
        $data = $this->traitupdate($this->model , $id ,$arr);
        $this->updateCartPrice();
        return $this->traitShow($this->model, $id);
    }

    /** change status for  comming model  */
    public function updateStatus($status ,$id){
        return $this->traitUpdateStatus($this->model ,$status ,$id);
    }


     /** admin can block user . If admin blocked user , user couldn`t logged in */
    public function blockStatus($blocked_reason =null , $proudct_id){
            $arr['block']=true;
        return $this->traitupdate($this->model, $proudct_id, $arr);
    }

    public function unblockStatus($proudct_id){
        $arr['block']=false;
        return $this->traitupdate($this->model,$proudct_id,$arr);
    }

    public function getCartDetails($orderId){
        $order = $this->show($orderId);
    }

    private function updateCart($totalPrice){
        $cart = Cart::where('user_id',Auth::id())->first();
        if(is_null($cart)) {
            $cart = new Cart();
            $cart->user_id = Auth::id();
        }
        $cart->total_price += $totalPrice;
        $cart->save();
        return $cart;
    }

    private function updateCartPrice(){
      $cartDetailsPrice = CartDetail::where('user_id',Auth::id())->sum('total_price');
      Cart::where('user_id',Auth::id())->first()->update(['total_price'=>$cartDetailsPrice]);
    }

    public function showCartInfo(){
        $data = [];
        $this->updateCartPrice();
        $cart = Cart::where('user_id',Auth::id())->first();
        $data['total_price'] = $cart->total_price;
        $cartDetails = $this->index()->where('user_id',Auth::id())->where('cart_id',$cart->id)->get();
        foreach($cartDetails as $cartDetail){
            $results[] = $cartDetail->getData();
//            $results[$cartDetail->product_id] = $cartDetail->getData();
        }
        $data['cartDetails'] =$results;
        return $data;
    }

    public function emptyCart(){
        Cart::where('user_id',Auth::id())->delete();
        $this->model->where('user_id',Auth::id())->delete();
        return true;
    }

    public function delete($cartDetailsId){
        $this->traitDelete($this->model,$cartDetailsId);
        $data = $this->traitIndex($this->model);
        if(count($data) == 0){
            Cart::where('user_id',Auth::id())->delete();
        }
        return true;
    }
}
