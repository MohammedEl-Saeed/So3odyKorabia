<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','logo'];

    public function options(){
        return $this->belongsToMany(Option::class,'products_options','product_id','option_id')->withPivot('price');
    }

}
