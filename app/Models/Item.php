<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ['name','description','logo','product_id'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function options(){
        return $this->belongsToMany(Option::class,'items_options','item_id','option_id')->withPivot('price');
    }

}
