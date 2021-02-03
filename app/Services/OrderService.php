<?php

namespace App\Services;

use App\Http\Traits\BasicTrait;
use App\Models\Cart;
use App\Models\Offer;
use App\Models\UserAddress;
use App\Repositories\CartRepository;
use App\Repositories\CityRepository;
use App\Repositories\OrderRepository;
use Auth;
use DB;

class OrderService
{

    use  BasicTrait;

    protected $model, $order;

    public function __construct()
    {
//        $this->model = $model;
        $this->order = new OrderRepository();
    }

    /** get all order by type  */
    public function index()
    {
        return $this->order->index();
    }

    /** add new order to database */
    public function createOrder($request)
    {
        $order = $this->order->createOrder($request);
        $cart = new CartRepository();
        $cart->emptyCart();
        return $order;

    }

    /** show specific order  */
    public function show($id)
    {
        return $this->order->show($id);
    }

    /** accept updates for order */
    public function update($updated_data)
    {
        return $this->order->update($updated_data);
    }

    /** block specific order */

    public function blockStatus($order_id)
    {
        return $this->order->blockStatus($order_id);
    }

    public function unblockStatus($order_id)
    {
        return $this->order->unblockStatus($order_id);
    }

//    public function getServices(){
//        return $this->order->getServices();
//    }

    /** delete order */
    public function delete()
    {
        return $this->order->delete();
    }

    /** update status for order by accept or reject  */
    public function updateStatus($status, $id)
    {
        return $this->order->updateStatus($status, $id);
    }

    public function getOrders()
    {
        return $this->order->getOrders();
    }

    public function reOrder($orderId)
    {
        return $this->order->reOrder($orderId);
    }

    public function orderStatus($orderId)
    {
        $order = $this->order->orderStatus($orderId);
        $order->delivery_time = $order->deliveryTimeRemaining();
        return $order;
    }

    public function getCities()
    {
        $city = new CityRepository();
        return $city->getCities();
    }

    public function offerAvailability($code)
    {
        $now = date('Y-m-d H:m:i');
        $offer = Offer::where('code', $code)
            ->whereDate('start_at', '<', $now)
            ->whereDate('end_at', '>', $now)
            ->whereRaw('count < uses_number OR uses_number IS NULL')
            ->where('status', 'Available')
            ->orWhere('status', 'Reopened')
            ->first();
        if ($offer && !$offer->user->contains(Auth::id())) {
            return $offer->id;
        } else {
            return null;
        }
    }

    public function getOffers()
    {
        $now = date('Y-m-d H:m:i');
        $offers = Offer::whereDate('start_at', '<', $now)
            ->whereDate('end_at', '>', $now)
            ->whereRaw('count < uses_number OR uses_number IS NULL')
            ->where('status', 'Available')
            ->orWhere('status', 'Reopened')
            ->get();
        return $offers;
    }

    public function checkCode($code)
    {
        $offer = $this->getOffer($code);
        $cartPrice = Auth::user()->cart->total_price;
        return $this->order->getOfferedPrice($offer, $cartPrice);
    }

    public function getOrderPriceDetails($request){
        $data = [];
        $cartId = Auth::user()->cart->id ?? 0;
        $cartPrice = 0;
        if($cartId) {
            $cartPrice = $this->order->updateTotalPriceForCart($cartId);
        }
        $deliveryCosts = $this->order->getDeliveryFees($request->address_id);
        $offer = $this->getOffer($request->code);
        $totalPriceAfterOffer = $cartPrice;
        //get price after using promocode
        if($offer) {
            $totalPriceAfterOffer = $this->order->getOfferedPrice($offer, $cartPrice);
            $data['promoCodePercent'] = $this->order->getPromocodeValue($offer, $cartPrice);
        }
        $data['cartPrice'] = $cartPrice;
        $data['deliveryFees'] = $deliveryCosts;
        //get price after add delivery fees
        $data['totalPrice'] = $totalPriceAfterOffer + $deliveryCosts;
        return $data;
    }

    private function getOffer($code){
        return Offer::where('code', $code)->select('discount', 'discount_type')->first();
    }

}
