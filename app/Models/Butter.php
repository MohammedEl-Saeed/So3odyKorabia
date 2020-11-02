<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Butter extends Model
{
    protected $fillable = ['name','description','logo'];

    public function packages(){
        return $this->belongsToMany('App\Models\Package','butters_packages','butter_id','package_id')->withPivot('price');
    }

}
