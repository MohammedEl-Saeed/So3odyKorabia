<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    protected $fillable = ['name','description','logo'];

    public function birds(){
        return $this->belongsToMany('App\Models\Bird','birds_kinds','kind_id','bird_id')->withPivot('price');
    }

}
