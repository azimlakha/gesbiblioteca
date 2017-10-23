<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    //
    protected $fillable = [
        'id', 'conservation', 'location_id', 'book_id'
    ];

    public function location(){
    	return $this->belongsTo('App\Location'); // link between location and copy
    }

    public function book(){
    	return $this->belongsTo('App\Book'); // link between book and copy
    }

    public function bookings(){
        return $this->hasMany('App\Booking');
    }

    public function lends(){
        return $this->hasMany('App\Lend');
    }
}
