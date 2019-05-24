<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaidoitac extends Model
{
    protected $table = "loaidoitac";
    public function doitac(){
    	return $this->hasMany('App\doitac','MaDoiTac','MaDoiTac');
    }
}
