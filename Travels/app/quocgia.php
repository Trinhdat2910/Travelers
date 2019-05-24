<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quocgia extends Model
{
    protected $table = "quocgia";
    

    public function khachhang(){
    	return $this->hasMany('App\khachhang','MaKH','MaKH');
    }

    public function tinh(){
    	return $this->hasMany('App\tinh','MaQG','MaQG');
    }
}
