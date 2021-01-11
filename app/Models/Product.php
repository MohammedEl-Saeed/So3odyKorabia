<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','description','logo'];

    public function options(){
        return $this->belongsToMany(Option::class,'products_options','product_id','option_id')->withPivot('price');
    }

    public function getData(){
        $data = [];
        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['description'] = $this->description;
        $data['logo'] = $this->logo;
        return $data;
    }

    public function items(){
        return $this->hasMany(Item::class);
    }
}
