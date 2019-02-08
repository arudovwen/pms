<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','first_name','middle_name','last_name','city', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function companies(){
        return $this->hasMany(Company::class);
    } 
  
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
     public function projectsAddedTo(){
         return $this->belongsToMany(Project::class);
     }
     public function tasksAddedTo(){
        return $this->belongsToMany(Task::class);
    }
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
