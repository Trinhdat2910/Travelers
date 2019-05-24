<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Requests;
use App\User;

use Auth;

class NhanVienNVController extends Controller
{
    // public function getLogin(){
                
    //     return view('admin.loginAdmin');
    // }
    // public function postLogin(Request $request)
    // {
    //     $arr = [
    //         'MaNV' => $request->MaNV,
    //         'password' => $request->password,
    //     ];
    //     if ($request->remember == trans('remember.Remember Me')) {
    //         $remember = true;
    //     } else {
    //         $remember = false;
    //     }
    //     //kiểm tra trường remember có được chọn hay không
        
    //     if (Auth::guard('nhanviens')->attempt($arr)) {
    //         $id = Auth::guard('nhanviens')-> id();
    //         foreach (nhanvien::where('MaNV', $id)->get() as $MaNV) {
    //             if ($MaNV->Quyen == 0) {
    //                 return redirect('/indexAdmin');
    //             }
    //             elseif ($MaNV->Quyen == 1) {
    //                 return redirect('/indexAdmin');
    //             }
    //             else{
    //                 dd('kjbadjskf');
    //             }
    //         }
            
    //         //..code tùy chọn
    //         //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
    //     } else {

    //         dd($arr);
    //         //...code tùy chọn
    //         //đăng nhập thất bại hiển thị đăng nhập thất bại
    //     }
    // }
    // public function getLogoutAdmin(){
    //     Auth::guard('nhanviens')->logout();
    //     return redirect('admin/login');
    // }

    public function getDanhSachNV(){
    	$user = user::where('level',1)->get();
    	
    	return view('employee.qlNV.danhsach',['user'=>$user]);
    }
    public function getDanhSachDH(){
        $user = user::where('level',2)->get();
        
        return view('employee.qlNV.danhsachDH',['user'=>$user]);
    }
    public function getThemNV(){

    	return view('employee.qlNV.them');
    }

    public function postThemNV(Request $request ){
    	$this -> validate($request,
    	[
    		'TenNV' => 'required',
    		'Email' => 'required|unique:users',
    		'Password' => 'required|min:8',
    		'Tel' => 'required',
    		'Diachi' => 'required',
    		'Phamvi' => 'required',


    	],[
    		'TenNV.required' => 'Bạn chưa nhập Họ tên',
    		'Email.required' => 'Bạn chưa nhập Email',
    		'Password.required' => 'Bạn chưa nhập mật khẩu',
    		'Tel.required' => 'Bạn chưa nhập Số điện thoại',
    		'Diachi.required' => 'Bạn chưa nhập địa chỉ',
    		'Phamvi.required' => 'Bạn chưa nhập Phạm vi hướng dẫn',
    	]);

    	$user = new user;
        $user -> TenNV= $request -> TenNV;
    	$user -> email= $request -> Email;
    	$user -> password= bcrypt($request -> Password);
    	$user -> Tel= $request -> Tel;
    	$user -> DiaChi= $request -> Diachi;
    	$user -> MaKV= $request -> Phamvi;
        $user -> level= 1;


        if($request -> hasFile('HinhAnh'))
        {
          
            $file = $request->file('HinhAnh');

            $name = $file -> getClientOriginalName();

            $Hinh = str_random(4)."_".$name;
            while(file_exists('upload/nhanvien'.$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/nhanvien", $Hinh);
            $user -> HinhAnh= $Hinh;
        }
        else
        {
            
            $user -> HinhAnh="";
        }

    	$user -> save();
    	return redirect('employee/qlNV/danhsachNV') -> with('thongbao', 'Thêm Thành Công');
    }
    public function postThemDH(Request $request ){
        $this -> validate($request,
        [
            'TenNV' => 'required',
            'Email' => 'required|unique:users',
            'Password' => 'required|min:8',
            'Tel' => 'required',
            'Diachi' => 'required',
            'Phamvi' => 'required',


        ],[
            'TenNV.required' => 'Bạn chưa nhập Họ tên',
            'Email.required' => 'Bạn chưa nhập Email',
            'Password.required' => 'Bạn chưa nhập mật khẩu',
            'Tel.required' => 'Bạn chưa nhập Số điện thoại',
            'Diachi.required' => 'Bạn chưa nhập địa chỉ',
            'Phamvi.required' => 'Bạn chưa nhập Phạm vi hướng dẫn',
        ]);

        $user = new user;
        $user -> TenNV= $request -> TenNV;
        $user -> email= $request -> Email;
        $user -> password= bcrypt($request -> Password);
        $user -> Tel= $request -> Tel;
        $user -> DiaChi= $request -> Diachi;
        $user -> MaKV= $request -> Phamvi;
        $user -> level= 2;


        if($request -> hasFile('HinhAnh'))
        {
          
            $file = $request->file('HinhAnh');

            $name = $file -> getClientOriginalName();

            $Hinh = str_random(4)."_".$name;
            while(file_exists('upload/nhanvien'.$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/nhanvien", $Hinh);
            $user -> HinhAnh= $Hinh;
        }
        else
        {
            
            $user -> HinhAnh="";
        }

        $user -> save();
        return redirect('employee/qlNV/danhsachDH') -> with('thongbao', 'Thêm Thành Công');
    }
    public function getEditNV($MaNV){
    	$user = user::find($MaNV);
    	return view('employee.qlNV.sua',['nhanvien'=>$nhanvien]);
    }
    public function SuaNV(Request $request, $MaNV){
    	$user = user::find($MaNV);
    	// $this -> validate($request,
    	// [
    	// 	'Tennv' => 'required',
    	// 	'Emailnv' => 'required',
    	// 	'Telnv' => 'required',
    	// 	'Diachinv' => 'required',

    	// 	'Phamvinv' => 'required',


    	// ],[
    	// 	'Tennv.required' => 'Bạn chưa nhập Họ tên',
    	// 	'Emailnv.required' => 'Bạn chưa nhập Email',
    		
    	// 	'Telnv.required' => 'Bạn chưa nhập Số điện thoại',
    	// 	'Diachinv.required' => 'Bạn chưa nhập địa chỉ',

    	// 	'Phamvinv.required' => 'Bạn chưa nhập Phạm vi hướng dẫn',

    	// ]);
        if($request -> HinhAnh == ""){
        $user -> TenNV= $request -> Tennv ;
    	$user -> email= $request ->  Emailnv;
    	$user -> Tel= $request -> Telnv;
    	$user -> DiaChi= $request -> Diachinv;
    	$user -> MaKV= $request -> Phamvinv;

    	$user -> save();
        }
        else{
        $user -> TenNV= $request -> Tennv ;
        $user -> email= $request ->  Emailnv;

        $user -> Tel= $request -> Telnv;
        $user -> DiaChi= $request -> Diachinv;
        $user -> MaKV= $request -> Phamvinv;

        if($request -> hasFile('HinhAnh'))
        {
            $file = $request->file('HinhAnh');

            $name = $file -> getClientOriginalName();

            $Hinh = str_random(4)."_".$name;
            while(file_exists('upload/nhanvien'.$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/nhanvien", $Hinh);
            $user -> HinhAnh= $Hinh;
        }
        else
        {
            $user -> HinhAnh="";
        }
        $user -> save();
        }
    	return redirect()->back() -> with('thongbao', 'Sửa Thành Công');
    }
    public function XoaNV($MaNV){
    	$user = user::find($MaNV);
    	$user->delete();

    	return redirect()->back()->with('thongbao', 'Bạn đã xóa Thành Công');
    }
}
