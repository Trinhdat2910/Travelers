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
use App\chitiettour;
use App\thuchi;
use App\user;
use Carbon\Carbon;

class AjaxController extends Controller
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
    public function getTimTour( $Tour){
        $chitiettour = chitiettour::where('MaTour',$Tour) ->get();
        foreach($chitiettour as $t){
            echo "<option value='".$t -> MaCTTour."'>".$t -> NgayKhoiHanh."</option>";   
        }
        
    }
    public function getTimTCTour( $macttour){
        $thuchi = thuchi::where('MaCTTour',$macttour) ->get();
        foreach($thuchi as $tc){
          foreach(chitiettour::where('MaCTTour',$tc -> MaCTTour)->get() as $mact){
            foreach(user::where('MaNV',$tc -> MaNV)->get() as $manv){
            echo "<tr>
                          <td style='line-height: 20px;'>". $tc -> id."</td>
                          <td style='line-height: 20px'>";
                          if($tc -> MaHD != null){
                          echo   $tc -> hopdong-> khachhang -> TenKH."<br>";
                           echo  $tc -> DichVu;
                           }
                          elseif($tc -> MaDVTour!= null){
                            echo $tc -> dichvutour-> doitac-> TenDoiTac ."<br>";
                            echo  $tc -> DichVu;
                          }
                            else{
                             echo $tc -> DichVu;
                            }
                            
                         echo  "</td>
                          <td style='line-height: 20px'>
                            
                            Mã Tour:  ".$mact -> MaTour." - ".$mact -> MaCTTour."<br>
                            Tên Tour:  ".$mact -> tour -> TenTour."

                            

                          </td>
                          <td style='line-height: 20px'>";
                            if($tc-> LoaiThuChi==1){
                              echo "Thu";
                            }
                            else{
                             echo "Chi";
                            }
                           
                          echo "<td style='line-height: 20px;'>". number_format($tc -> SoTien)." VND</td></td>
                          <td style='line-height: 20px'>
                            ". $tc -> NoiDung."
                          </td>
                          <td style='line-height: 20px'> 
                            ". $tc -> NgayTT."
                          </td>
                          <td style='line-height: 20px'>
                            
                              ".$manv -> TenNV."
                            
                          </td>
                        </tr>";   
                      
                    }
          }
        }
        
    }
    public function getTimTCNgay( $ngay){
        $thuchi = thuchi::where('NgayTT',$ngay) ->get();
        foreach($thuchi as $tc){
          foreach(chitiettour::where('MaCTTour',$tc -> MaCTTour)->get() as $mact){
            foreach(user::where('MaNV',$tc -> MaNV)->get() as $manv){
            echo "<tr>
                          <td style='line-height: 20px;'>". $tc -> id."</td>
                          <td style='line-height: 20px'>";
                          if($tc -> MaHD != null){
                          echo   $tc -> hopdong-> khachhang -> TenKH."<br>";
                           echo  $tc -> DichVu;
                           }
                          elseif($tc -> MaDVTour!= null){
                            echo $tc -> dichvutour-> doitac-> TenDoiTac ."<br>";
                            echo  $tc -> DichVu;
                          }
                            else{
                             echo $tc -> DichVu;
                            }
                            
                         echo  "</td>
                          <td style='line-height: 20px'>
                            
                            Mã Tour:  ".$mact -> MaTour." - ".$mact -> MaCTTour."<br>
                            Tên Tour:  ".$mact -> tour -> TenTour."

                            

                          </td>
                          <td style='line-height: 20px'>";
                            if($tc-> LoaiThuChi==1){
                              echo "Thu";
                            }
                            else{
                             echo "Chi";
                            }
                           
                          echo "<td style='line-height: 20px;'>". number_format($tc -> SoTien)." VND</td></td>
                          <td style='line-height: 20px'>
                            ". $tc -> NoiDung."
                          </td>
                          <td style='line-height: 20px'> 
                            ". $tc -> NgayTT."
                          </td>
                          <td style='line-height: 20px'>
                            
                              ".$manv -> TenNV."
                            
                          </td>
                        </tr>";   
                      
                    }
          }
        }
        
    }
     public function getTimTCThang( $ngay1, $ngay2){

        $thuchi = thuchi::whereBetween('NgayTT', [$ngay1, $ngay2]) ->get();
        foreach($thuchi as $tc){
          foreach(chitiettour::where('MaCTTour',$tc -> MaCTTour)->get() as $mact){
            foreach(user::where('MaNV',$tc -> MaNV)->get() as $manv){
            echo "<tr>
                          <td style='line-height: 20px;'>". $tc -> id."</td>
                          <td style='line-height: 20px'>";
                          if($tc -> MaHD != null){
                          echo   $tc -> hopdong-> khachhang -> TenKH."<br>";
                           echo  $tc -> DichVu;
                           }
                          elseif($tc -> MaDVTour!= null){
                            echo $tc -> dichvutour-> doitac-> TenDoiTac ."<br>";
                            echo  $tc -> DichVu;
                          }
                            else{
                             echo $tc -> DichVu;
                            }
                            
                         echo  "</td>
                          <td style='line-height: 20px'>
                            
                            Mã Tour:  ".$mact -> MaTour." - ".$mact -> MaCTTour."<br>
                            Tên Tour:  ".$mact -> tour -> TenTour."

                            

                          </td>
                          <td style='line-height: 20px'>";
                            if($tc-> LoaiThuChi==1){
                              echo "Thu";
                            }
                            else{
                             echo "Chi";
                            }
                           
                          echo "<td style='line-height: 20px;'>". number_format($tc -> SoTien)." VND</td></td>
                          <td style='line-height: 20px'>
                            ". $tc -> NoiDung."
                          </td>
                          <td style='line-height: 20px'> 
                            ". $tc -> NgayTT."
                          </td>
                          <td style='line-height: 20px'>
                            
                              ".$manv -> TenNV."
                            
                          </td>
                        </tr>";   
                      
                    }
          }
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
                      <div class='cellgiacb'><input  id='radioCB".$t -> MaGiaDV."' type='radio' class='MaGiaDV' name='MaGiaDV' value=".$t -> MaGiaDV.">   ".number_format($t -> Gia)." VND</div>
                    </label>" ;
        }
        
    }
    
    

}
?>
