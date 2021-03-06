<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemsOption extends Model
{
//    use SoftDeletes;
    public function option(){
        return $this->belongsTo(Option::class,'option_id');
    }

    public function getData(){
        $data = [];
        $data['id'] = $this->id;
        $data['price'] = $this->price;
        $data['option_name'] = $this->option->name;
        $data['option_type'] = $this->option->type;
        return $data;
    }

}
