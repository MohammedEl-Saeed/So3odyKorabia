<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OptionType extends Model
{
    use SoftDeletes;

    public function options(){
        return $this->hasMany(Option::class, 'option_type_id');
    }
}
