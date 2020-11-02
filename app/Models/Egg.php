<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Egg extends Model
{
    protected $fillable = ['name','description','logo'];

    public function packages(){
        return $this->belongsToMany('App\Models\Package','eggs_packages','egg_id','package_id')->withPivot('price');
    }

}
