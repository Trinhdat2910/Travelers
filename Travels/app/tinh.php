<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tinh extends Model
{
    protected $table = "tinh";
    

    public function diadiemdulich(){
    	return $this->hasMany('App\diadiemdulich','MaDD','MaDD');
    }
    public function quocgia(){
    	return $this->belongsTo('App\quocgia','MaQG','MaQG');
    }
    public function doitac(){
    	return $this->hasMany('App\doitac','MaDoiTac','MaDoiTac');
    }
}
