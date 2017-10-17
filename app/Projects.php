<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Projects Extends Eloquent{
protected $table = 'projects';
protected $fillable = array('id,name, date_initial,state,  description, thumbs, Category_id, Worker_id');
public $timestamps = false;

/*public function users() {
    return $this->belongsTo('App\User', name_of_column_in_user_table, name_of_column_in_post_table);
}*/

public function worker(){
       return $this->belongsTo('App\Worker','Worker_id');
   }

public function category(){
    return $this->belongsTo('App\Category', 'Category_id');
}

public function images(){
    return $this->hasMany('App\Images');
}


}
