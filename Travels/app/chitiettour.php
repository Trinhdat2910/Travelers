<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiettour extends Model
{
    protected $table = "chitiettour";
    protected $primaryKey = "MaCTTour";
    public $timestamps= false;


    public function tour(){
    	return $this->belongsTo('App\tour','MaTour','MaTour');
    }
    public function user(){
    	return $this->belongsTo('App\user','MaNV','MaNV');
    }
    public function hopdong(){
    	return $this->hasMany('App\hopdong','MaHD','MaHD');
    }
    public function dichvutour(){
    	return $this->hasMany('App\chitietdichvu','MaDVTour','MaDVTour');
    }
}
