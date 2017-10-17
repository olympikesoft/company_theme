<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Request_states Extends Eloquent{
protected $table = 'request_states';
protected $fillable = array('id, states');
public $timestamps = false;




public function request(){
    return $this->hasMany('App\Request');
}

}
