<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhomtour extends Model
{
   protected $table = "nhomtour";

    public function chitietnhomtour(){
    	return $this->hasMany('App\chitietnhomtour','MaNhomTour','MaNhomTour');
    }
    public function khuvuc(){
    	return $this->belongsTo('App\khuvuc','MaKV','MaKV');
    }
}
