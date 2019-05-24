<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hinhthucdl extends Model
{
     protected $table = "hinhthucdl";
     public function tour(){
    	return $this->hasMany('App\tour','MaHT','MaHT');
    }
}
