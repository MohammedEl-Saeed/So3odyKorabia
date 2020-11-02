<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['name','description','logo'];

    public function sacrifices(){
        return $this->belongsToMany('App\Models\Sacrifice','sacrifices_sizes','size_id','sacrifice_id')->withPivot('price');
    }

}
