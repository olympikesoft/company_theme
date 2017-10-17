<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Request Extends Eloquent{
protected $table = 'request';
protected $fillable = array('id,name, content, datetime, state, Guest_id, Request_states_id, Budget_id, Category_id, Tecnology_id');
public $timestamps = false;


public function worker(){
       return $this->belongsTo('App\Guest','Guest_id');
   }

public function request_states(){
    return $this->belongsTo('App\Request_states', 'Request_states_id');
}

public function budget(){
    return $this->belongsTo('App\Budget', 'Budget_id');
}

public function category(){
    return $this->belongsTo('App\Category','Category_id');
}

public function tecnology(){
    return $this->belongsTo('App\Tecnology', 'Tecnology_id');
}

public function messages(){
    return $this->hasMany('App\Message');
}


}
