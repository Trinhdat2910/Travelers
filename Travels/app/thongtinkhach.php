<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thongtinkhach extends Model
{
    protected $table = "thongtinkhach";
    protected $fillable = [
        'MaKhach','HoTen', 'NgaySinh','GioiTinh','DiaChi','Tel','Passport', 'MaHD'
    ];

    public function hopdong(){
    	return $this->belongsTo('App\hopdong','MaHD','MaHD');

    }
}
