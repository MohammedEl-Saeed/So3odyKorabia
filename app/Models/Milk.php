<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milk extends Model
{
    protected $fillable = ['name','description','logo'];

    public function packages(){
        return $this->belongsToMany('App\Models\Package','milks_packages','milk_id','package_id')->withPivot('price');
    }

}
