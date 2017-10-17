<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Tecnology Extends Eloquent{
protected $table = 'tecnology';
protected $fillable = array('id, name');
public $timestamps = false;




public function request(){
    return $this->hasMany('App\Request');
}

}
