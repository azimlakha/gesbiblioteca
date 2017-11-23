<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
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

        'name', 'email', 'password', 'created_at', 'updated_at'
    ];

    public function profile(){
        
        return $this->hasOne('App\Profile');
    }

    public function books(){
        return $this->belongsToMany('App\Book', 'wishlists');
    }

        public function bookings(){
        return $this->hasMany('App\Booking');
    }

    public function lends(){
        return $this->hasMany('App\Lend');
    }

    static function isUser(){
        $user = User::find(Auth::user()->id);
        if(($user->profile->profile == 'Estudante') || ($user->profile->profile == 'Professor')) {
                    return true;
                }
                return false;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
