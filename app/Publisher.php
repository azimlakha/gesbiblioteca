<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //
    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];

    public function books(){
    	return $this->hasMany('App\Book');
    }
}
