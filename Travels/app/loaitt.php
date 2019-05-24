<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitt extends Model
{
    protected $table = "loaitt";
    public function tour(){
    	return $this->hasMany('App\tour','MaLoaiTour','MaLoaiTour');
    }
}
