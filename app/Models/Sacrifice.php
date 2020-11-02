<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sacrifice extends Model
{
    protected $fillable = ['name','description','logo'];

    public function sizes(){
        return $this->belongsToMany('App\Models\Size','sacrifices_sizes','sacrifice_id','size_id')->withPivot('price');
    }

     public function slicings(){
        return $this->belongsToMany('App\Models\Slicing','sacrifices_slicings','sacrifice_id','slicing_id')->withPivot('price');
    }

     public function baggings(){
        return $this->belongsToMany('App\Models\Bagging','sacrifices_baggings','sacrifice_id','bagging_id')->withPivot('price');
    }


}
