<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'cod_booking', 'start_date', 'end_date', 'user_id', 'copy_id', 'status'
    ];

    public function copy(){
        return $this->belongsTo('App\Copy'); // link between publisher and book
    }

    public function user(){
        return $this->belongsTo('App\User'); // link between knowledge_area and book
    }
}
