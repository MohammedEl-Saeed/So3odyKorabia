<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{

    public function item(){
        return $this->belongsTo(Item::class,'item_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function itemOption(){
        return $this->belongsTo(ItemsOption::class,'item_options_id');
    }

    public function getData(){
        $data = [];
        $data['id'] = $this->id;
        $data['user_id'] = $this->user_id;
        $data['cart_id'] = $this->cart_id;
        $data['total_price'] = $this->total_price;
        $data['product'] = $this->product->getData();
        $data['item'] = $this->item->getData();
        $item_options_ids = explode(',',$this->item_options_ids);
        $item_options = ItemsOption::find($item_options_ids);
        foreach($item_options as $item_option){
            $data['item_options'][] = $item_option->getData();
        }
        return $data;
    }
}
