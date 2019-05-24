<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doitac extends Model
{
	protected $table = "doitac";
	protected $primaryKey = "MaDoiTac";
    public $timestamps= false;
    public function loaidoitac(){
    	return $this->belongsTo('App\loaidoitac','MaLoaiDT','MaLoaiDT');
    }
    public function dichvutour(){
    	return $this->hasMany('App\chitietdichvu','MaDoiTac','MaDoiTac');
    }
    public function tinh(){
    	return $this->belongsTo('App\tinh','MaTinh','MaTinh');
    }
    public function banggiadichvu(){
        return $this->hasMany('App\banggiadichvu','MaGiaDV','MaGiaDV');
    }
}
