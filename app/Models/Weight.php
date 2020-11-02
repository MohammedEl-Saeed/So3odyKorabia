<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = ['name','description','logo'];

    public function birds(){
        return $this->belongsToMany('App\Models\Bird','birds_weights','weight_id','bird_id')->withPivot('price');
    }

}
