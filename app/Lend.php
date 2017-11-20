<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    protected $fillable = [
        'cod_lend', 'start_date', 'end_date', 'users_id', 'copy_id', 'return_date'
    ];

    public function copy(){
        return $this->belongsTo('App\Copy'); // link between publisher and book
    }

    public function user(){
        return $this->belongsTo('App\User'); // link between knowledge_area and book
    }
}
