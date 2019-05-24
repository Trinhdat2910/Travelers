<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Requests;
use App\khachhang;
use App\quocgia;
use Auth;
class KhachHangController extends Controller
{
    public function getLogin(){
       
        return view('home.login');
    }
    public function postLogin(Request $request)
    {
        
           
       $username = $request->input('Username');
        $password = $request->input('password');
 
        if( Auth::guard('khachs')->attempt(['Username' => $username, 'password' =>$password])) {
            // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
            return redirect('/');
        } else {
           dd('đăng nhập không thành công');
        }
    }
    public function getLogout(){
        Auth::guard('khachs')->logout();
        return redirect('/');
    }
    public function getRegister(){
       
        return view('home.register');
    }
    public function postRegisterMember(Request $request){
        $this -> validate($request,
        [
            'username' => 'required|min:6|unique:khachhang',
            'email' => 'required',
            'HoTen' => 'required',
            'Diachi' => 'required',
            'Tel' => 'required',
            'Password'=> 'required|min:8',
            'confirmPass'=> 'required|same:Password',

            

        ],[
            'HoTen.required' => 'Bạn chưa nhập Họ tên',
            'Email.required' => 'Bạn chưa nhập Email',
            'Tel.required' => 'Bạn chưa nhập Số điện thoại',
            'Diachi.required' => 'Bạn chưa nhập địa chỉ',
            'Password.required'=> 'Bạn chưa nhập password'
            
        ]);

        $username =  $request -> username;
        $password = $request -> Password;
        $hoten= $request -> HoTen;
        $email= $request -> email;
        $tel= $request -> Tel;
        $diachi= $request -> Diachi;
        $quocgia= $request -> quocgia;

            if(khachhang::insert(['Username'=> $username, 'password'=> bcrypt($password),'TenKH'=> $hoten,'Email'=> $email,'Tel'=> $tel,'DiaChi'=> $diachi, 'MaQG'=> $quocgia]))
            {
                return redirect('registerMember') -> with('thongbao', 'Đăng Ký  Thành Công');
            }else{
                return redirect()-> back()-> with('thongbao', 'Đăng Ký Không Thành Công');
            }
        // $khachhang = new khachhang;
        // $khachhang -> TenKH= $request -> HoTen;
        // $khachhang -> Email= $request -> email;
        // $khachhang -> password= bcrypt($request -> Password);
        // $khachhang -> Tel= $request -> Tel;
        // $khachhang -> DiaChi= $request -> Diachi;
        // $khachhang -> Username= $request -> username;
        // $khachhang -> MaQG= $request -> quocgia;
        // $khachhang -> save();
       
           

       
    }
    public function getDanhSachKH(){
    	$khachhang = khachhang::all();
    	return view('admin.qlKH.danhsach',['khachhang'=>$khachhang]);
    }
    public function getEditKH($MaKH){
    	$khachhang = khachhang::where('MaKH',$MaKH)->first();
    	return view('admin.qlKH.sua',['khachhang'=>$khachhang]);
    }
    public function SuaKH(Request $request, $MaKH){
    	$khachhang = khachhang::where('MaKH',$MaKH)->first();
    	$this -> validate($request,
    	[
    		'Tenkh' => 'required',
    		'Emailkh' => 'required',
    		'Telkh' => 'required',
    		'Diachikh' => 'required',
    		

    	],[
    		'Tenkh.required' => 'Bạn chưa nhập Họ tên',
    		'Emailkh.required' => 'Bạn chưa nhập Email',
    		'Telkh.required' => 'Bạn chưa nhập Số điện thoại',
    		'Diachikh.required' => 'Bạn chưa nhập địa chỉ',
    		
    	]);


    	$khachhang -> TenKH= $request -> Tenkh;
    	$khachhang -> Email= $request -> Emailkh;
    	$khachhang -> Tel= $request -> Telkh;
    	$khachhang -> DiaChi= $request -> Diachikh;
        $khachhang -> MaQG= $request -> MaQGkh;
    	$khachhang -> save();
    	return redirect('admin/qlKH/danhsachKH') -> with('thongbao', 'Sửa Thành Công');
    }

    
    public function XoaKH($MaKH){
    	$khachhang = khachhang::where('MaKH',$MaKH)->first();
    	$khachhang->delete();

    	return redirect('admin/qlKH/danhsachKH')->with('thongbao', 'Bạn đã xóa Thành Công');
    }
}
