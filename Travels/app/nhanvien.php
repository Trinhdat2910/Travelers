<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class nhanvien extends Authenticatable
{
    use Notifiable;
   

    protected $table = "nhanvien";
    public $timestamps= false;
    protected $primaryKey='MaNV';
    protected $fillable = [
        'MaNV','TenNV', 'password','Email', 'Quyen'
    ];
     protected $hidden = [
        'password',
    ];

    public function tour(){
    	return $this->hasMany('App\tour','MaNV', 'MaNV');
    }
    public function chitiettour(){
    	return $this->hasMany('App\chitiettour','MaCTTour', 'MaMaCTTour');
    }
    public function chucvu(){
    	return $this->belongsTo('App\chucvu','MaChucVu','MaChucVu');
    }
    public function khuvuc(){
        return $this->belongsTo('App\khuvuc','MaKV','MaKV');
    }
    public function trinhdo(){
        return $this->belongsTo('App\trinhdo','MaTD','MaTD');
    }

}
