<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
     protected $fillable = [
        'section', 'bookcase', 'shelf', 'created_at', 'updated_at'
    ];

    public function copies(){
    	return $this->hasMany('App\Copy');
    }
}
