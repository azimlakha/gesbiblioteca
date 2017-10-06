<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //

    public function copies(){
    	return $this->hasMany('App\Copy');
    }
}
