<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Budget Extends Eloquent{
protected $table = 'budget';
protected $fillable = array('id, amount');
public $timestamps = false;




public function request(){
    return $this->hasMany('App\Request');
}

}
