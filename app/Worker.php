<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Worker Extends Eloquent{
protected $table = 'worker';
protected $fillable = array('id', 'role', 'user_id', 'last_login');
public $timestamps = false;



public function user(){
       return $this->belongsTo('App\User');
   }


public function messages(){
    return $this->hasMany('App\Message');
}

public function projects(){
    return $this->hasMany('App\Project');
}

public function posts(){
    return $this->hasMany('App\Posts');
}
}