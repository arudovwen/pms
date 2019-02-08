<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function addedUsers(){
        return $this->belongsToMany(User::class);
    }
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
