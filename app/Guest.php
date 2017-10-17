<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Guest Extends Eloquent{
protected $table = 'post';
protected $fillable = array('id,state, User_id');
public $timestamps = false;


public function messages(){
    return $this->hasMany('App\Message');
}

public function user(){
    return $this->belongsTo('App\Guest', 'User_id');
}

public function subscriptions(){
    return $this->belongsTo('App\Subscription');
}

}
