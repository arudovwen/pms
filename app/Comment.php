<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function commentable(){
        return $this->morphTo();
    }
    // return the user associated with this comment
    // @return array 

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
