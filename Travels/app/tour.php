<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tour extends Model
{
    protected $table = "tour";
    protected $primaryKey='MaTour';
    public $timestamps= false;

    
    public function chitiettour(){
    	return $this->hasMany('App\chitiettour','MaTour','MaTour');
    }
    public function nhomtour(){
    	return $this->belongsTo('App\nhomtour','MaNhomTour','MaNhomTour');
    }
    public function user(){
    	return $this->belongsTo('App\user', 'MaNV', 'MaNV');
    }
    public function hinhthucdl(){
        return $this->belongsTo('App\hinhthucdl', 'MaHT', 'MaHT');
    }
    public function khuvuc(){
        return $this->belongsTo('App\khuvuc', 'MaKV', 'MaKV');
    }
    public function chitietnhomtour(){
        return $this->belongsTo('App\chitietnhomtour','id','id');
    }

}
