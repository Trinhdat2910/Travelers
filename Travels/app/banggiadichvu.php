<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class banggiadichvu extends Model
{
    protected $table = "banggiadichvu";
    protected $primaryKey = "MaGiaDV";
    public $timestamps= false;
    
    public function doitac(){
    	return $this->belongsTo('App\doitac','MaDoiTac','MaDoiTac');
    }
}
