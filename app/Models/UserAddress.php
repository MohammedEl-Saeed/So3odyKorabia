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

    public function getFullAddress(){
        $data = [];
        $data['city_name'] = $this->city->name ?? '';
        $data['area_name'] = $this->area->name ?? '';
        if($this->street){
            $data['street'] = 'الشارع: '.$this->street;
        }
        if($this->building_number){
            $data['building_number'] = 'رقم المبنى:'.$this->building_number;
        }
        if($this->floor){
            $data['floor'] = 'الطابق:'.$this->floor;
        }
        if($this->apartment_number){
            $data['apartment_number'] = 'رقم الشقة:'.$this->apartment_number;
        }
        if($this->type){
            switch ($this->type){
                case '0':
                    $data['type'] = 'النوع:'.'منزل';
                    break;
                case '1':
                    $data['type'] = 'النوع:'.'عمل';
                    break;
                case '2':
                    $data['type'] = 'النوع:'.'أخرى';
                    break;
                default:
                    $data['type'] = 'النوع:'.'لم يتم الاختيار';
            }
        }
        return $data;
    }
}
