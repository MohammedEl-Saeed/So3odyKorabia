<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

     public function area(){
        return $this->belongsTo(Area::class,'area_id');
    }

    public function getData(){
        $data = [];
        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['email'] = $this->email;
        $data['type'] = $this->type;
        $data['image'] = $this->image;
        return $data;
    }
}
