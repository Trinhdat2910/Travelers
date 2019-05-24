<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hopdongdichvu extends Model
{
    protected $table = "hopdongdichvu";
    
    public $timestamps= false;
    protected $primaryKey='MaHDDV';
    protected $fillable = [
        'MaHDDV','MaHD', 'MaDVTour','NgayDK', 'SLNL','SLTE','Gia','GiaTE','ThanhTien',
    ];

    public function dichvutour(){
    	return $this->belongsTo('App\dichvutour','MaDVTour','MaDVTour');
    }
    public function hopdong(){
    	return $this->belongsTo('App\hopdong','MaHD','MaHD');
    }
}
