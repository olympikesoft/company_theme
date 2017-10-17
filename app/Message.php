<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Message Extends Eloquent{
protected $table = 'message';
protected $fillable = array('id,content, datetime, Request_id,  Worker_id, Guest_id');
public $timestamps = false;


public function worker(){
       return $this->belongsTo('App\Worker','Worker_id');
   }

public function request(){
    return $this->belongsTo('App\Category', 'Category_id');
}

public function guest(){
    return $this->belongsTo('App\Guest', 'Guest_id');
}



}
