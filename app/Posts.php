<?php
namespace App;

use Eloquent; // ******** This Line *********
use DB;       // ******** This Line *********

Class Posts Extends Eloquent{
protected $table = 'posts';
protected $fillable = array('id,title, text, image,  Worker_id, Category_id');
public $timestamps = false;


public function worker(){
       return $this->belongsTo('App\Worker','Worker_id');
   }

public function category(){
    return $this->belongsTo('App\Category', 'Category_id');
}
}
