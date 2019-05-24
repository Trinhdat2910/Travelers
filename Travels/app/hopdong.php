<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hopdong extends Model
{
    protected $table = "hopdong";
     public $timestamps = false;
     protected $primaryKey='MaHD';
    protected $fillable = [
        'MaKH','MaCTTour', 'NgayDat','SoCho','SLNL','SLTE','SLEB','MaLoaiTT','HinhThucTT','ThanhTien'
    ];
    

    public function chitiettour(){
        return $this->belongsTo('App\chitiettour','MaCTTour','MaCTTour');
    }
    public function khachhang(){
    	return $this->belongsTo('App\khachhang','MaKH','MaKH');
    }
    public function nhanvien(){
        return $this->belongsTo('App\nhanvien','MaNV','MaNV');
    }
    public function loaitt(){
        return $this->belongsTo('App\loaitt','MaLoaiTT','MaLoaiTT');
    }
    public function thongtinkhach(){
    	return $this->hasMany('App\thongtinkhach','MaHD','MaHD');
    }
    public function hopdongdichvu(){
        return $this->hasMany('App\hopdongdichvu','MaHDDV','MaHDDV');
    }
    public function thuchi(){
        return $this->hasMany('App\thuchi','MaHD','MaHD');
    }
}
