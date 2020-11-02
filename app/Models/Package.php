<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name','description','logo'];

    public function butters(){
        return $this->belongsToMany('App\Models\Butter','butters_packages','package_id','butter_id')->withPivot('price');
    }

    public function eggs(){
        return $this->belongsToMany('App\Models\Egg','eggs_packages','package_id','egg_id')->withPivot('price');
    }

    public function milks(){
        return $this->belongsToMany('App\Models\Milk','milks_packages','package_id','milk_id')->withPivot('price');
    }

}
