<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['name','type','price'];

    public function items(){
        return $this->belongsToMany(Item::class,'items_options','option_id','item_id')->withPivot('price');
    }

}
