<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class khachhang extends Authenticatable
{
    use Notifiable;



    protected $table = "khachhang";
    public $timestamps= false;

   	protected $primaryKey='MaKH';
   	protected $fillable = [
        'Username','TenKH', 'password','Email','Tel','DiaChi','MaQG',
    ];
     protected $hidden = [
        'password',
    ];

    public function quocgia(){
    	return $this->belongsTo('App\quocgia','MaQG','MaQG');
    }

    public function chitietdattour(){
    	return $this->hasMany('App\chitietdattour','MaKH','MaKH');
    }
}
