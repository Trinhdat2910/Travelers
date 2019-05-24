<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $primaryKey='MaNV';

    protected $fillable = [
        'name', 'email', 'password','level','MaKV','MaNV'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tour(){
        return $this->hasMany('App\tour','MaNV', 'MaNV');
    }
    public function chitiettour(){
        return $this->hasMany('App\chitiettour','MaCTTour', 'MaMaCTTour');
    }
    
    public function khuvuc(){
        return $this->belongsTo('App\khuvuc','MaKV','MaKV');
    }
    public function chucvu(){
        return $this->belongsTo('App\chucvu','level','level');
    }
   
}
