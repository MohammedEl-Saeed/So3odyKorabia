<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsOption extends Model
{
    public function option(){
        return $this->belongsTo(Option::class,'option_id');
    }
}
