<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'title', 'edition', 'ISBN', 'publisher_id', 'subject_id', 'knowledge_area_id'
    ];

    public function publisher(){
    	return $this->belongsTo('App\Publisher'); // link between publisher and book
    }

    public function knowledge_area(){
    	return $this->belongsTo('App\Knowledge_area'); // link between knowledge_area and book
    }

    public function subject(){
    	return $this->belongsTo('App\Subject'); // link between subject and book
    }

     public function copies(){
    	return $this->hasMany('App\Copy'); //// link between copies and book
}
