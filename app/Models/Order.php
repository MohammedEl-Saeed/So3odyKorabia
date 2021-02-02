<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['user_id','total_price','user_address_id','offer_id','delivery_time','delivery_cost','offer_cost'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function userAddress(){
        return $this->belongsTo(UserAddress::class,'user_address_id');
    }

    public function offer(){
        return $this->belongsTo(Offer::class,'offer_id');
    }

    public function payment_type(){
        if($this->payment_type == 1){
            $type = 'Transfer';
        }elseif($this->payment_type == 2){
            $type = 'Credit Card';
        } else{
            $type = 'Cash';
        }
        return $type;
    }

    public function deliveryTimeRemaining(){
        if($this->delivery_time){
            $orderDeliveryTime = $this->created_at->addDays($this->delivery_time);
            $deliveryDate = $orderDeliveryTime->format('y-m-d');
            $now = Carbon::now();
            $nowDate = $now->format('y-m-d');
            $data = [];
//            dd($nowDate , $deliveryDate, $nowDate > $deliveryDate);
            $data['delivery_day'] = $orderDeliveryTime->format('D');
            $data['delivery_time_remaining'] = $orderDeliveryTime->diffInDays($nowDate);
           if($deliveryDate == $nowDate){
                $data['delivery_day'] = 'Today';
            } elseif($deliveryDate < $nowDate){
                $data['delivery_time_remaining'] = -$orderDeliveryTime->diffInDays($now);
            }
            return $data;
        }
    }
}
