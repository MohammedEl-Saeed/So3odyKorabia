<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsOption extends Model
{
    public function option(){
        return $this->belongsTo(Option::class,'option_id');
    }

    public function getData(){
        $data = [];
        $data['id'] = $this->id;
        $data['price'] = $this->price;
        $data['option_name'] = $this->option->name;
        return $data;
    }

}
