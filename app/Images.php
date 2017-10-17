<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Images Extends Eloquent{
protected $table = 'images';
protected $fillable = array('id,description, Projects_id');
public $timestamps = false;


public function projects(){
       return $this->belongsTo('App\Worker','Projects_id');
   }

}
