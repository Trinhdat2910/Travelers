<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dichvutour extends Model
{
     protected $table = "dichvutour";
    protected $primaryKey = "MaDVTour";
    public $timestamps= false;

    public function chitiettour(){
    	return $this->belongsTo('App\chitiettour','MaCTTour','MaCTTour');
    }
    public function doitac(){
    	return $this->belongsTo('App\doitac','MaDoiTac','MaDoiTac');
    }
    public function hopdongdichvu(){
        return $this->hasMany('App\hopdongdichvu','MaHDDV','MaHDDV');
    }
    public function thuchi(){
        return $this->hasMany('App\thuchi','MaDVTour','MaDVTour');
    }
}
