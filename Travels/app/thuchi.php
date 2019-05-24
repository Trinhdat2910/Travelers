<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thuchi extends Model
{
	protected $table = "thuchi";
	protected $primaryKey = "id";
	public $timestamps= false;
    public function hopdong(){
    	return $this->belongsTo('App\hopdong','MaHD','MaHD');
    }
    public function dichvutour(){
    	return $this->belongsTo('App\dichvutour','MaDVTour','MaDVTour');
    }
}
