<?php namespace App\Repositories;

use App\Http\Traits\ResponseTraits;
use App\Models\CartDetail;
use App\Models\Item;
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
use App\Repositories\BaseRepository;

class CartRepository extends BaseRepository
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
        if(!$this->checkQuantity($request->item_id, $request->quantity)){
            return null;
        }
        $item_options_ids = implode(',',$request->item_options_ids);
        $quantity = $request->quantity;
        $total_price = $quantity * $this->getTotalPriceForItem($request->item_options_ids);
        $item_key = Auth::id().','.$request->item_id.','.$item_options_ids;
        // to increment quantity of cart if this item exists before to this user in cart and if not existed before create new one
        $existOrderItem = $this->model::where('item_key',$item_key)->first();
        if($existOrderItem){
            $existOrderItem->increment('quantity', $quantity);
            $existOrderItem->increment('total_price',$total_price);
            $this->updateCart($total_price);
            return $existOrderItem;
        } else {
            $this->model->product_id = $request->product_id;
            $this->model->item_id = $request->item_id;
            $this->model->item_options_ids = $item_options_ids;
            $this->model->total_price = $total_price;
            $this->model->quantity = $quantity;
            $this->model->product_type = $request->product_type;
            $this->model->item_key = $item_key;
            $cart = $this->updateCart($total_price);
            $this->model->cart_id = $cart->id;
            $this->model->user_id = Auth::id();
            $this->model->save();
            return $this->model;
        }

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

    public function getCartDetails($orderId){
        $order = $this->show($orderId);
    }

    private function updateCart($totalPrice){
        $cart = Cart::firstOrCreate(['user_id'=>Auth::id()]);
        $cart->increment('total_price',$totalPrice);
        return $cart;
    }

    private function updateCartPrice(){
      $cartDetailsPrice = CartDetail::where('user_id',Auth::id())->sum('total_price');
      Cart::where('user_id',Auth::id())->first()->update(['total_price'=>$cartDetailsPrice]);
    }

    public function showCartInfo(){
        $data = [];
        $cart = Cart::where('user_id',Auth::id())->first();
        $results = [];
        if ($cart) {
            $cartTotalPrice = $this->updateTotalPriceForCart($cart->id);
//            $this->updateCartPrice();
            $data['total_price'] = $cartTotalPrice;
            $cartDetails = $this->index()->where('user_id', Auth::id())->where('cart_id', $cart->id)->get();
            foreach ($cartDetails as $cartDetail) {
                $results[] = $cartDetail->getData();
//            $results[$cartDetail->product_id] = $cartDetail->getData();
            }
            $data['cartDetails'] = $results;
            return $data;
        }
        return null;
    }

    public function emptyCart(){
        Cart::where('user_id',Auth::id())->delete();
        $this->model->where('user_id',Auth::id())->delete();
        return true;
    }

    public function delete($cartDetailsId){
        $cart = Cart::where('user_id',Auth::id())->first();
        $cart->total_price = $cart->total_price - $this->model::find($cartDetailsId)->total_price;
        $cart->update();
        $this->traitDelete($this->model,$cartDetailsId);
        $data = $this->traitIndex($this->model);
        if(count($data) == 0){
            Cart::where('user_id',Auth::id())->delete();
        }
        return true;
    }

    public function checkQuantity($itemId, $quantity){
       $maxQuantity = Item::find($itemId)->order_quantity;
       $cartQuantity = $this->model::where('user_id',Auth::id())
           ->where('item_id',$itemId)->sum('quantity');
       $totalQuantity = $cartQuantity + $quantity;
       if($totalQuantity > $maxQuantity){
           return false;
       }
       return true;
    }
}
