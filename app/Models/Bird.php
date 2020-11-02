<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bird extends Model
{
    protected $fillable = ['name','description','logo'];

    public function slicings(){
        return $this->belongsToMany('App\Models\Slicing','birds_slicings','bird_id','slicing_id')->withPivot('price');
    }

    public function baggings(){
        return $this->belongsToMany('App\Models\Bagging','birds_baggings','bird_id','bagging_id')->withPivot('price');
    }

    public function weights(){
        return $this->belongsToMany('App\Models\Weight','birds_weights','bird_id','weight_id')->withPivot('price');
    }

    public function kinds(){
        return $this->belongsToMany('App\Models\Kind','birds_kinds','bird_id','kind_id')->withPivot('price');
    }

}
