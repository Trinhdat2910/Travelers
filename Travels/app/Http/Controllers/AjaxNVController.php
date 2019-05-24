<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Requests;
use App\tinh;
use App\loaidoitac;
use App\doitac;
use App\diadiemdulich;
use App\banggiadichvu;
use App\khuvuc;
use App\nhomtour;


class AjaxNVController extends Controller
{
     public function getDoiTac( $tinh, $dv){
     	$doitac = doitac::where('MaTinh',$tinh) -> where('MaLoaiDT',$dv) ->get();
     	foreach($doitac as $dt){
     		echo "<option value='".$dt -> MaDoiTac."'>".$dt -> TenDoiTac."</option>";	
     	}
    	
    }
    public function getDV( $dt){
     	$banggiadichvu = banggiadichvu::where('MaDoiTac',$dt) ->get();
     	foreach($banggiadichvu as $bg){
     		echo "<option value='".$bg -> MaGiaDV."'>".$bg -> TenDV."</option>";	
     	}
    	
    }
    public function getGiaDV( $iddv){
        $banggiadichvu = banggiadichvu::where('MaGiaDV',$iddv) ->get();
        foreach($banggiadichvu as $bg){
            echo $bg -> Gia;    
        }
        
    }
     public function getGiaDVTE( $iddv){
        $banggiadichvu = banggiadichvu::where('MaGiaDV',$iddv) ->get();
        foreach($banggiadichvu as $bg){
            echo $bg -> GiaTE;    
        }
        
    }
    public function getDiaDiemDL( $tinh){
        $diadiemdulich = diadiemdulich::where('MaTinh',$tinh) ->get();
        foreach($diadiemdulich as $dd){
            echo "<option value='".$dd -> MaDD."'>".$dd -> TenDD."</option>";   
        }
        
    }
    public function getTinh( $qg){
        $tinh = tinh::where('MaQG',$qg) ->get();
        foreach($tinh as $t){
            echo "<option value='".$t -> MaTinh."'>".$t -> TenTinh."</option>";   
        }
        
    }
    public function getKhuVuc( $lt){
        $khuvuc = khuvuc::where('MaLoaiTour',$lt) ->get();
        foreach($khuvuc as $t){
            echo "<option value='".$t -> MaKV."'>".$t -> TenKV."</option>";   
        }
        
    }
    public function getNhomTour( $kv){
        $nhomtour = nhomtour::where('MaKV',$kv) ->get();
        foreach($nhomtour as $t){
            echo "<option value='".$t -> MaNhomTour."'>".$t -> TenNhom."</option>";   
        }
        
    }
    public function getTimCB( $kh){
        $banggiadichvu = banggiadichvu::where('KhoiHanh',$kh) ->get();
        foreach($banggiadichvu as $t){
                    echo"<label class='infochuyenbay' for='radioCB".$t -> MaGiaDV."'>
                      
                      <div class='cellhangbay'>".$t -> doitac -> TenDoiTac."</div>
                      <div class='cellsohieu'>".$t -> TenDV."</div>
                      <div class='cellkhoihanh'>".$t -> KhoiHanh."</div>
                      <div class='celldiemden'>".$t -> DiemDen."</div>
                      <div class='cellngaybay'>".$t -> NgayBay."</div>
                      <div class='cellgiobay'>".$t -> GioBay."</div>
                      <div class='cellgiacb'><input  id='radioCB".$t -> MaGiaDV."' type='radio' class='MaGiaDV' name='MaGiaDV' value=".$t -> MaGiaDV.">  ".number_format($t -> Gia)." VND</div>
                    </label>" ;
        }
        
    }
    
    

}
?>
