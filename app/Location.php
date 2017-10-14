<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
     protected $fillable = [
        'section_id', 'bookcase_id', 'shelf_id', 'created_at', 'updated_at'
    ];

    public function copies(){
    	return $this->hasMany('App\Copy');
    }

    public function section(){
    	return $this->belongsTo('App\Section'); // link between section and location
    }

    public function bookcase(){
    	return $this->belongsTo('App\Bookcase'); // link between bookcase and location
    }

    public function shelf(){
    	return $this->belongsTo('App\Shelf'); // link between shelf and location
    }
}
