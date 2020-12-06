<?php

namespace App\Services;

use App\Models\Cart;
use App\Repositories\CartRepository;
 use App\Http\Traits\BasicTrait;
 use Carbon\CarbonPeriod;
 use Carbon\Carbon;
 use Auth;
 use DB;
use Illuminate\Database\Eloquent\Model;

class CartService
{

   use  BasicTrait;
    protected $model ,$cart;

    public function __construct()
    {
//        $this->model = $model;
        $this->cart = new CartRepository();
    }
    /** get all cart by type  */
    public function index(){
        return $this->cart->index()->get();
    }

    /** add new cart to sysytem */
    public function addToCart($request){
        return $this->cart->addToCart($request);
    }

    /** show specific cart  */
    public function show($id){
         return $this->cart->show($id);
    }

    /** update cart */
    public function editCart($request, $id){
        return  $this->cart->editCart($request, $id);
    }

    /** block specific cart */

    public function blockStatus($cart_id){
        return  $this->cart->blockStatus( $cart_id);
    }

    public function unblockStatus( $cart_id){
        return  $this->cart->unblockStatus( $cart_id);
    }

//    public function getServices(){
//        return $this->cart->getServices();
//    }

    /** delete cart */
    public function delete($cartDetailsId){
        return $this->cart->delete($cartDetailsId);
    }

    /** update status for cart by accept or reject  */
    public function updateStatus($status ,$id){
        return $this->user->updateStatus($status ,$id);
    }

    /** showCartInfo */
    public function showCartInfo(){
        return $this->cart->showCartInfo();
    }

    /** empty cart */
    public function emptyCart(){
        return $this->cart->emptyCart();
    }

}
