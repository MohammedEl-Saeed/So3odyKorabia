<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['name','type','price'];

    public function products(){
        return $this->belongsToMany(Product::class,'products_options','option_id','product_id')->withPivot('price');
    }

}
