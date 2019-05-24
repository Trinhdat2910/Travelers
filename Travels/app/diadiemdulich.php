<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diadiemdulich extends Model
{
    protected $table = "diadiemdulich";
    public $timestamps= false;
    protected $primaryKey='MaDD';

    public function chitiettour(){
    	return $this->hasMany('App\chitiettour','MaDD','MaDD');
    }

   
    public function tinh(){
    	return $this->belongsTo('App\tinh','MaTinh','MaTinh');
    }
}
