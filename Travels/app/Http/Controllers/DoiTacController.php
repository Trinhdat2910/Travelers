<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Requests;
use App\ tour;
use App\chitiettour;
use App\chitietdichvu;
use App\diadiemdulich;
use App\banggiadichvu;
use App\loaitour;
use App\doitac;
use App\loaidoitac;

class DoiTacController extends Controller
{
    public function getDanhSachDT(){
    	$doitac = doitac::where('MaTinh','!=', "")->get();
    	return view('admin.qlDoiTac.danhsach',['doitac'=>$doitac]);
    }
    public function getThemDT(){
    	
    
    	return view('admin.qlDoiTac.them');
    }
    public function getSuaDT($MaDT){
        
        $doitac = doitac::find($MaDT);
        return view('admin.qlDoiTac.sua', ['doitac'=>$doitac]);
    }
    public function postThemDT(Request $request ){
    	$this -> validate($request,
    	[
    		'Ten' => 'required',
    		'Email' => 'required',
    		'loaidichvu' => 'required',
    		'Tel' => 'required',
    		'DiaChi' => 'required',
    		'tinh' => 'required'
    		

    	],[
    		'Ten.required' => 'Bạn chưa nhập Tên Đối Tác',
    		'Email.required' => 'Bạn chưa nhập Email',
    		'loaidichvu.required' => 'Bạn chưa nhập Loại dịch vu',
    		'Tel.required' => 'Bạn chưa nhập Số điện thoại',
    		'DiaChi.required' => 'Bạn chưa nhập địa chỉ',
    		'tinh.required' => 'Bạn chưa nhập Tỉnh'
    		
    	]);

    	$doitac = new doitac;
    	$doitac -> TenDoiTac= $request -> Ten;
    	$doitac -> Email= $request -> Email;
    	$doitac -> MaLoaiDT= $request -> loaidichvu;
    	$doitac -> Tel= $request -> Tel;
    	$doitac -> DiaChi= $request -> DiaChi;
    	$doitac -> MaTinh= $request -> tinh;
    	$doitac -> NganHang= $request -> nganhang;
    	$doitac -> STK= $request -> STK;
    	
        if($doitac -> save()){
            $MaDoiTac = $doitac -> MaDoiTac;
            foreach($request -> TenDV as $key => $v) {
               $data = array('MaDoiTac' =>  $MaDoiTac,
                'TenDV'=>  $request -> TenDV[$key],
                    'Gia' =>  $request -> GiaNL[$key],
                    'GiaTE' =>  $request -> GiaTE[$key]
                ); 
               banggiadichvu::insert($data);
            }
        }
    	return redirect('admin/qlDoiTac/danhsachDT') -> with('thongbao', 'Thêm Thành Công');
    }
    public function postSuaDT(Request $request , $MaDT){
        $this -> validate($request,
        [
            'Ten' => 'required',
            'Email' => 'required',
            'loaidichvu' => 'required',
            'Tel' => 'required',
            'DiaChi' => 'required',
            'tinh' => 'required'
            

        ],[
            'Ten.required' => 'Bạn chưa nhập Tên Đối Tác',
            'Email.required' => 'Bạn chưa nhập Email',
            'loaidichvu.required' => 'Bạn chưa nhập Loại dịch vu',
            'Tel.required' => 'Bạn chưa nhập Số điện thoại',
            'DiaChi.required' => 'Bạn chưa nhập địa chỉ',
            'tinh.required' => 'Bạn chưa nhập Tỉnh'
            
        ]);

        $doitac = doitac::find($MaDT);
        $doitac -> TenDoiTac= $request -> Ten;
        $doitac -> Email= $request -> Email;
        $doitac -> MaLoaiDT= $request -> loaidichvu;
        $doitac -> Tel= $request -> Tel;
        $doitac -> DiaChi= $request -> DiaChi;
        $doitac -> MaTinh= $request -> tinh;
        $doitac -> NganHang= $request -> nganhang;
        $doitac -> STK= $request -> STK;
        
        if($doitac -> save()){
            $MaDoiTac = $doitac -> MaDoiTac;
            
            if(empty($request -> TenDV1)){
                foreach ($request -> TenDV as $key => $v) {
               $data = array( 
                    'TenDV'=>  $request -> TenDV[$key],
                    'Gia' =>  $request -> GiaNL[$key],
                    'GiaTE' =>  $request -> GiaTE[$key]
                ); 
               banggiadichvu::where('MaGiaDV', $key)->where('MaDoiTac', $MaDoiTac)->update($data);
            }
           
            }
            else {
                foreach ($request -> TenDV as $key => $v) {
               $data = array( 
                    'TenDV'=>  $request -> TenDV[$key],
                    'Gia' =>  $request -> GiaNL[$key],
                    'GiaTE' =>  $request -> GiaTE[$key]
                ); 
               banggiadichvu::where('MaGiaDV', $key)->where('MaDoiTac', $MaDoiTac)->update($data);
            }
            foreach ($request -> TenDV1 as $key => $v) {
               $data1 = array( 'MaDoiTac' =>  $MaDoiTac,
                    'TenDV'=>  $request -> TenDV1[$key],
                    'Gia' =>  $request -> GiaNL1[$key],
                    'GiaTE' =>  $request -> GiaTE1[$key]
                ); 
               banggiadichvu::insert($data1);
            }
            }
        }
        return redirect('admin/qlDoiTac/danhsachDT') -> with('thongbao', 'Update Thành Công');
    }


    public function getXoaDT($MaDT){
        $banggiadichvu = banggiadichvu::find($MaDT);
        if(banggiadichvu::where('MaDoiTac',$MaDT)->count() > 0 ){
        $banggiadichvu -> delete();
        }
        $doitac = doitac::find($MaDT);
        $doitac->delete();

        return redirect('admin/qlDoiTac/danhsachDT')->with('thongbao', 'Bạn đã xóa Thành Công');
    }
    public function XoaDV($MaDV){
        $banggiadichvu = banggiadichvu::find($MaDV);
        $banggiadichvu -> delete();       

        return redirect()->back()->with('thongbao', 'Bạn đã xóa Thành Công');
    }
}
