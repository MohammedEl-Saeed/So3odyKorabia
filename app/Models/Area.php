<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['city_id','name','delivery_time','delivery_cost'];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
