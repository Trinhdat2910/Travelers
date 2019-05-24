<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Requests;
use App\diadiemdulich;
use App\tinh;


class DiaDiemController extends Controller
{
    public function getDanhSachDD(){
    	$diadiem = diadiemdulich::all();
    	return view('admin.qlDD.danhsach',['diadiemdulich'=>$diadiem]);
    }

    public function getThemDD(){
    	$tinh = tinh::all();
        
    	return view('admin.qlDD.them',['tinh'=>$tinh]);
    }

     public function postThemDD(Request $request ){
    	$this -> validate($request,
    	[
    		'Ten' => 'required',
    		'Tinh' => 'required',
    		

    	],[
    		'Ten.required' => 'Bạn chưa nhập Địa Điểm',
    		'Tinh.required' => 'Bạn chưa nhập Tỉnh/TP',
    		
    	]);

    	$diadiemdulich = new diadiemdulich;
    	$diadiemdulich -> TenDD= $request -> Ten;
    	$diadiemdulich -> MaTinh= $request -> Tinh;
        if($request -> hasFile('HinhAnh'))
        {
            $file = $request->file('HinhAnh');

            $name = $file -> getClientOriginalName();

            $Hinh = str_random(4)."_".$name;
            while(file_exists('upload/diadiem'.$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/diadiem", $Hinh);
            $diadiemdulich -> HinhAnh= $Hinh;
        }
        else
        {
            $diadiemdulich -> HinhAnh="";
        }
       
    	$diadiemdulich -> save();
    	return redirect('admin/qlDD/danhsachDD') -> with('thongbao', 'Thêm Thành Công');
    }
     public function getEditDD($MaDD){
        $diadiemdulich = diadiemdulich::find($MaDD);
        $tinh = tinh::all();
        return view('admin.qlDD.sua',['tinh'=>$tinh],['diadiemdulich'=>$diadiemdulich]);
    }
     public function SuaDD(Request $request, $MaDD){
        $diadiemdulich = diadiemdulich::find($MaDD);
        $this -> validate($request,
        [
            'Tendd' => 'required',
            'tinhdd' => 'required'           

        ],[
            'Tendd.required' => 'Bạn chưa nhập tên địa điểm',
            'tinhdd.required' => 'Bạn chưa chọn tỉnh',
            
        ]);
        if ($request-> HinhAnh== "") {
            $diadiemdulich -> TenDD= $request -> Tendd;
            $diadiemdulich -> MaTinh= $request -> tinhdd;

            $diadiemdulich -> save();
        }else{

        $diadiemdulich -> TenDD= $request -> Tendd;
        $diadiemdulich -> MaTinh= $request -> tinhdd;
        if($request -> hasFile('HinhAnh'))
        {
            $file = $request->file('HinhAnh');

            $name = $file -> getClientOriginalName();

            $Hinh = str_random(4)."_".$name;
            while(file_exists('upload/diadiem'.$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/diadiem", $Hinh);
            $diadiemdulich -> HinhAnh= $Hinh;
        }
        else
        {
            $diadiemdulich -> HinhAnh="";
        }
       
        $diadiemdulich -> save();
    }
        return redirect()->back() -> with('thongbao', 'Sửa Thành Công');
    }
    
    public function XoaDD($MaDD){
    	$diadiem = diadiemdulich::find($MaDD);
        if($diadiem->delete()){
            return redirect('admin/qlDD/danhsachDD')->with('thongbao', 'Bạn đã xóa Thành Công');
        }
        else{
            return  redirect('admin/qlDD/danhsachDD')->with('thongbao', 'Bạn không được phép xóa');
        }

    	
    }

    
}
