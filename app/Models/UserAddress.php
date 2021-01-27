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
        $data['city_id'] = $this->city_id;
        $data['city_name'] = $this->city->name ?? '';
        $data['area_name'] = $this->area->name ?? '';
        $data['area_id'] = $this->area_id;
        $data['street'] = $this->street;
        $data['building_number'] = $this->building_number;
        $data['floor'] = $this->floor;
        $data['type'] = $this->type;
        $data['apartment_number'] = $this->apartment_number;
        $data['address_latitude'] = $this->address_latitude;
        $data['address_longitude'] = $this->address_longitude;
        $data['default_address'] = $this->default_address;
        $data['note'] = $this->note;
        return $data;
    }
}
