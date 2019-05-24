<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Requests;
use App\ tour;
use App\chitiettour;
use App\chitietdichvu;
use App\diadiemdulich;

use App\loaitour;
use App\doitac;
use App\loaidoitac;
use App\hopdong;
use App\hopdongdichvu;
use App\dichvutour;

class HopDongNVController extends Controller
{
    public function getDanhSachHD(){
    	$hopdong = hopdong::all();
    	return view('employee.qlHD.danhsach',['hopdong'=>$hopdong]);
    }
    public function getXuLyHD($MaHD){
    	$hopdong = hopdong::find($MaHD);
    	return view('employee.qlHD.XuLyHD',['hopdong'=>$hopdong]);
    }
    public function postXuLyHD(Request $request, $MaHD){
    	foreach ($request-> MaDVCB as $key => $value) {
    		$data = array('MaHD' =>  $MaHD,
                    'MaDVTour'=>  $request -> MaDVCB[$key],
                    'SLNL'=> $request -> SLKCB[$key],
                    'Gia'=> $request -> GiaCB[$key],
                    'ThanhTien'=> $request -> TotalCB[$key],
                    'NgayDK' => date(now())
                ); 
    		hopdongdichvu::insert($data);
    		$data1 = array(
    		'SLNL'=> $SL[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVCB[$key])->sum('SLNL'),
    		'SLTE'=> $SL1[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVCB[$key])->sum('SLTE'),
    		'TongTien' => $TT[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVCB[$key])->sum('ThanhTien'),
    		);
    		$data2=array(
    		'MaDVTour' =>  $request-> MaDVCB[$key],
    		);
    		dichvutour::where('MaDVTour', $data2)->update($data1);
              
              
              	

              

    	}
    	foreach ($request-> MaDVHT as $key => $value) {
    		$data = array('MaHD' =>  $MaHD,
                    'MaDVTour'=>  $request -> MaDVHT[$key],
                    'SLNL'=> $request -> SLKHT[$key],
                    'Gia'=> $request -> GiaHT[$key],
                    'ThanhTien'=> $request -> TotalHT[$key],
                    'NgayDK' => date(now())
                ); 
    		hopdongdichvu::insert($data);
    		$data1 = array(
    		'SLNL'=> $SL[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVHT[$key])->sum('SLNL'),
    		'SLTE'=> $SL1[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVHT[$key])->sum('SLTE'),
    		'TongTien' => $TT[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVHT[$key])->sum('ThanhTien'),
    		);
    		$data2=array(
    		'MaDVTour' =>  $request-> MaDVHT[$key],
    		);
    		dichvutour::where('MaDVTour', $data2)->update($data1);
              
              
              	

              

    	}
    	foreach ($request-> MaDVRT as $key => $value) {
    		$data = array('MaHD' =>  $MaHD,
                    'MaDVTour'=>  $request -> MaDVRT[$key],
                    'SLNL'=> $request -> SLNLRT[$key],
                    'Gia'=> $request -> GiaRT[$key],
                    'SLTE'=> $request -> SLTERT[$key],
                    'GiaTE'=> $request -> GiaTERT[$key],
                    'ThanhTien'=> $request -> TotalRT[$key],
                    'NgayDK' => date(now())
                ); 
    		hopdongdichvu::insert($data);
    		$data1 = array(
    		'SLNL'=> $SL[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVRT[$key])->sum('SLNL'),
    		'SLTE'=> $SL1[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVRT[$key])->sum('SLTE'),
    		'TongTien' => $TT[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVRT[$key])->sum('ThanhTien'),
    		);
    		$data2=array(
    		'MaDVTour' =>  $request-> MaDVRT[$key],
    		);
    		dichvutour::where('MaDVTour', $data2)->update($data1);
              
              
              	

              

    	}
    	foreach ($request-> MaDVST as $key => $value) {
    		$data = array('MaHD' =>  $MaHD,
                    'MaDVTour'=>  $request -> MaDVST[$key],
                    'SLNL'=> $request -> SLNLST[$key],
                    'Gia'=> $request -> GiaST[$key],
                    'SLTE'=> $request -> SLTEST[$key],
                    'GiaTE'=> $request -> GiaTEST[$key],
                    'ThanhTien'=> $request -> TotalST[$key],
                    'NgayDK' => date(now())
                ); 
    		hopdongdichvu::insert($data);
    		$data1 = array(
    			'SLNL'=> $SL[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVST[$key])->sum('SLNL'),
    		'SLTE'=> $SL1[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVST[$key])->sum('SLTE'),
    		'TongTien' => $TT[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVST[$key])->sum('ThanhTien'),
    		);
    		$data2=array(
    		'MaDVTour' =>  $request-> MaDVST[$key],
    		);
    		dichvutour::where('MaDVTour', $data2)->update($data1);
              
              
              	

              

    	}
    	return  redirect('employee/qlHD/danhsachHD/')->with('thongbao', 'Đăng Kí Dịch Vụ Thành Công');
    }
    public function getUpdateDVHD($MaHD){
    	$hopdong = hopdong::find($MaHD);
    	return view('employee.qlHD.UpdateDVHD',['hopdong'=>$hopdong]);
    }
    public function postUpdateDVHD(Request $request, $MaHD){
    	foreach ($request-> MaDVCB as $key => $value) {
    		$data = array('MaHD' =>  $MaHD,
                    'MaDVTour'=>  $request -> MaDVCB[$key],
                    'SLNL'=> $request -> SLKCB[$key],
                    'Gia'=> $request -> GiaCB[$key],
                    'ThanhTien'=> $request -> TotalCB[$key],
                    'NgayDK' => date(now())
                ); 
    		hopdongdichvu::where('MaDVTour',$request-> MaDVCB[$key])->where('MaHD', $MaHD)->update($data);
    		$data1 = array(
    		'SLNL'=> $SL[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVCB[$key])->sum('SLNL'),
    		'SLTE'=> $SL1[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVCB[$key])->sum('SLTE'),
    		'TongTien' => $TT[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVCB[$key])->sum('ThanhTien'),
    		);
    		$data2=array(
    		'MaDVTour' =>  $request-> MaDVCB[$key],
    		);
    		dichvutour::where('MaDVTour', $data2)->update($data1);
              
              
              	

              

    	}
    	foreach ($request-> MaDVHT as $key => $value) {
    		$data = array('MaHD' =>  $MaHD,
                    'MaDVTour'=>  $request -> MaDVHT[$key],
                    'SLNL'=> $request -> SLKHT[$key],
                    'Gia'=> $request -> GiaHT[$key],
                    'ThanhTien'=> $request -> TotalHT[$key],
                    'NgayDK' => date(now())
                ); 
    		hopdongdichvu::where('MaDVTour',$request-> MaDVHT[$key])->where('MaHD', $MaHD)->update($data);
    		$data1 = array(
    		'SLNL'=> $SL[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVHT[$key])->sum('SLNL'),
    		'SLTE'=> $SL1[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVHT[$key])->sum('SLTE'),
    		'TongTien' => $TT[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVHT[$key])->sum('ThanhTien'),
    		);
    		$data2=array(
    		'MaDVTour' =>  $request-> MaDVHT[$key],
    		);
    		dichvutour::where('MaDVTour', $data2)->update($data1);
              
              
              	

              

    	}
    	foreach ($request-> MaDVRT as $key => $value) {
    		$data = array('MaHD' =>  $MaHD,
                    'MaDVTour'=>  $request -> MaDVRT[$key],
                    'SLNL'=> $request -> SLNLRT[$key],
                    'Gia'=> $request -> GiaRT[$key],
                    'SLTE'=> $request -> SLTERT[$key],
                    'GiaTE'=> $request -> GiaTERT[$key],
                    'ThanhTien'=> $request -> TotalRT[$key],
                    'NgayDK' => date(now())
                ); 
    		hopdongdichvu::where('MaDVTour',$request-> MaDVRT[$key])->where('MaHD', $MaHD)->update($data);
    		$data1 = array(
    		'SLNL'=> $SL[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVRT[$key])->sum('SLNL'),
    		'SLTE'=> $SL1[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVRT[$key])->sum('SLTE'),
    		'TongTien' => $TT[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVRT[$key])->sum('ThanhTien'),
    		);
    		$data2=array(
    		'MaDVTour' =>  $request-> MaDVRT[$key],
    		);
    		dichvutour::where('MaDVTour', $data2)->update($data1);
              
              
              	

              

    	}
    	foreach ($request-> MaDVST as $key => $value) {
    		$data = array('MaHD' =>  $MaHD,
                    'MaDVTour'=>  $request -> MaDVST[$key],
                    'SLNL'=> $request -> SLNLST[$key],
                    'Gia'=> $request -> GiaST[$key],
                    'SLTE'=> $request -> SLTEST[$key],
                    'GiaTE'=> $request -> GiaTEST[$key],
                    'ThanhTien'=> $request -> TotalST[$key],
                    'NgayDK' => date(now())
                ); 
    		hopdongdichvu::where('MaDVTour',$request-> MaDVST[$key])->where('MaHD', $MaHD)->update($data);
    		$data1 = array(
    			'SLNL'=> $SL[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVST[$key])->sum('SLNL'),
    		'SLTE'=> $SL1[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVST[$key])->sum('SLTE'),
    		'TongTien' => $TT[$key]= hopdongdichvu::where('MaDVTour', $request-> MaDVST[$key])->sum('ThanhTien'),
    		);
    		$data2=array(
    		'MaDVTour' =>  $request-> MaDVST[$key],
    		);
    		dichvutour::where('MaDVTour', $data2)->update($data1);
              
              
              	

              

    	}
    	return  redirect('employee/qlHD/danhsachHD/')->with('thongbao', 'Đăng Kí Dịch Vụ Thành Công');
    }
}
