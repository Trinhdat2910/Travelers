<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diadiemtour extends Model
{
    protected $table = "diadiemtour";
    protected $primaryKey = "id";
    public $timestamps= false;


    public function tour(){
    	return $this->belongsTo('App\tour','MaTour','MaTour');
    }
    public function diadiemdulich(){
    	return $this->belongsTo('App\diadiemdulich','MaDD','MaDD');
    }

}
