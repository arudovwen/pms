<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function addedUsers(){
        return $this->belongsToMany(User::class);
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

}
