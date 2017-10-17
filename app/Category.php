<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Category Extends Eloquent{
protected $table = 'category';
protected $fillable = array('id, name');
public $timestamps = false;




public function request(){
    return $this->hasMany('App\Request');
}

public function projects(){
    return $this->hasMany('App\Project');
}

public function posts(){
    return $this->hasMany('App\Posts');
}



}
