<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function parentMessage(){
        return $this->belongsTo(Message::class,'parent_id');
    }

}
