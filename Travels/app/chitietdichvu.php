<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdichvu extends Model
{
    protected $table = "chitietdichvu";
    protected $primaryKey = "MaDVTour";
    public $timestamps= false;

    public function chitiettour(){
    	return $this->belongsTo('App\chitiettour','MaCTTour','MaCTTour');
    }
    public function doitac(){
    	return $this->belongsTo('App\doitac','MaDoiTac','MaDoiTac');
    }
}
