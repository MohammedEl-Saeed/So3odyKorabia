<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['code','description','discount','discount_type','status','start_at','end_at','uses_number','image'];

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
