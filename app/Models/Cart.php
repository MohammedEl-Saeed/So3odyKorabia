<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id','total_price'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
