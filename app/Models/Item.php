<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{

    use SoftDeletes;

    protected $fillable = ['name','description','logo','product_id'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function options(){
        return $this->belongsToMany(Option::class,'items_options','item_id','option_id')->withPivot('price');
    }

    public function getData(){
        $data = [];
        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['description'] = $this->description;
        $data['type'] = $this->type;
        $data['logo'] = $this->logo;
        return $data;
    }

}
