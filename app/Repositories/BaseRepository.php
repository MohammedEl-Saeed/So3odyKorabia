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

class BaseRepository
{
    public function getTotalPriceForItem($itemOptionIds){
        if (gettype($itemOptionIds) == 'string') {
            $itemOptionIds = explode(',', $itemOptionIds);
        }
        $totalPrice = ItemsOption::find($itemOptionIds)->sum('price');
        return $totalPrice;
    }

    public function updateTotalPriceForCart($cartId){
        $cartDetails = CartDetail::where('cart_id',$cartId)->get();
        $totalPrice = 0;
        foreach ($cartDetails as $cartDetail){
            $cartDetailPrice = $cartDetail->quantity * $this->getTotalPriceForItem($cartDetail->item_options_ids);
            $cartDetail->update(['total_price'=>$cartDetailPrice]);
            $totalPrice += $cartDetailPrice;
        }
        Cart::find($cartId)->update(['total_price'=>$totalPrice]);
        return $totalPrice;
    }
}
