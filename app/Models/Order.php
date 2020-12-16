<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['user_id','total_price','user_address_id','offer_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function userAddress(){
        return $this->belongsTo(UserAddress::class,'user_address_id');
    }

    public function offer(){
        return $this->belongsTo(Offer::class,'offer_id');
    }

}
