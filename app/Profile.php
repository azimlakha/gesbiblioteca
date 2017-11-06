<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [

        'surname', 'code', 'phone', 'profile', 'user_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
