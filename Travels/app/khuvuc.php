<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khuvuc extends Model
{
    protected $table = "khuvuc";
    public $timestamps= false;

    public function tour(){
    	return $this->hasMany('App\tour','MaTour', 'MaTour');
    }
    public function user(){
    	return $this->hasMany('App\user','MaNV', 'MaNV');
    }
    public function nhomtour(){
    	return $this->hasMany('App\nhomtour','MaNhomTour', 'MaNhomTour');
    }

    
}
