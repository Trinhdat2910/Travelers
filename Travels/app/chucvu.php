<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chucvu extends Model
{
    protected $table = "chucvu";
    public function user(){
    	return $this->hasMany('App\user','MaNV','MaNV');
    }
}
