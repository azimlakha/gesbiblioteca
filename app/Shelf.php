<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];

    public function locations(){
    	return $this->hasMany('App\Location');
    }
}
