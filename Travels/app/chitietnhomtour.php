<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietnhomtour extends Model
{
    protected $table = "chitietnhomtour";

    public function tour(){
    	return $this->belongsTo('App\tour','MaTour','MaTour');
    }

    public function nhomtour(){
    	return $this->belongsTo('App\nhomtour','MaNhomTour','MaNhomTour');
    }
}
