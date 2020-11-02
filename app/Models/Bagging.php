<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bagging extends Model
{
    protected $fillable = ['name','description','logo'];

    public function sacrifices(){
        return $this->belongsToMany('App\Models\Sacrifice','sacrifices_baggings','bagging_id','sacrifice_id')->withPivot('price');
    }

    public function birds(){
        return $this->belongsToMany('App\Models\Bird','birds_baggings','bagging_id','bird_id')->withPivot('price');
    }

}
