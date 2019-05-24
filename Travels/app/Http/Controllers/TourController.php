<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Requests;
use App\ tour;
use App\chitiettour;
use App\dichvutour;
use App\diadiemdulich;
use App\chitietdichvu;
use App\banggiadichvu;
use App\doitac;
use App\thuchi;
use App\diadiemtour;
use App\chitietnhomtour;


class TourController extends Controller
{
    public function getDanhSachTour(){
    	$tour = tour::all();
    	return view('admin.qlTour.danhsach',['tour'=>$tour]);
    }
    public function getXuLyTour(){
        
        return view('admin.qlTour.xulyTour');
    }
    public function getXuLyTourMB(){
        
        return view('admin.qlTour.xulyTourMB');
    }
    public function getXuLyTourMT(){
        
        return view('admin.qlTour.xulyTourMT');
    }
    public function getXuLyTourMN(){
        
        return view('admin.qlTour.xulyTourMN');
    }
    public function getdsTourMB(){
        $tour = tour::where('MaKV', 1)->get();
        return view('admin.qlTour.dsTourMB',['tour'=>$tour]);
    }
    public function getdsTourMT(){
        $tour = tour::where('MaKV',2)->get();
        return view('admin.qlTour.dsTourMT',['tour'=>$tour]);
    }
    public function getdsTourMN(){
        $tour = tour::where('MaKV',3)->get();
        return view('admin.qlTour.dsTourMN',['tour'=>$tour]);
    }
    public function getdanhsachCTTour($MaTour){
    	
    	$diadiemtour= diadiemtour::where('MaTour',$MaTour)->get();
    	$tour = tour::find($MaTour);
    	
    	
    	return view('admin.qlTour.danhsachCTtour',['tour'=>$tour], [ 'diadiemtour'=>$diadiemtour]  );

    }
    public function getChiTietTour($MaCTTour){
        
      
        $chitiettour = chitiettour::find($MaCTTour);
        
        return view('admin.qlTour.chitiettour',['chitiettour'=>$chitiettour] );

    }
    public function getThemTour(){
 
    
    	return view('admin.qlTour.them');
    }
    public function postThemTour(Request $request ){
       

        $tour = new tour;
        $tour -> TenTour= $request -> Ten;
        $tour -> DiemKhoiHanh= $request -> DiemKhoiHanh;
        $tour -> TieuDe= $request -> TieuDe;
        $tour -> MaNV= $request -> NhanVienPT;
        $tour -> MaHT= $request -> HinhThuc;
        $tour -> MaKV= $request -> khuvuc;
        $tour -> MoTa= $request -> MoTa;
        $tour -> Gia= $request -> Gia;
        $tour -> GiaTE= $request -> GiaTE;
        $tour -> GiaEB= $request -> GiaEB;
        $tour -> SoNgay= $request -> SoNgay;
        if($request -> hasFile('HinhAnh'))
        {
            $file = $request->file('HinhAnh');

            $name = $file -> getClientOriginalName();

            $Hinh = str_random(4)."_".$name;
            while(file_exists('upload/tour'.$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tour", $Hinh);
            $tour -> HinhAnh= $Hinh;
        }
        else
        {
            $tour -> HinhAnh="";
        }

        if($tour -> save()){
            $MaTour = $tour -> MaTour;
            foreach ($request -> CTNhomTour as $key => $v) {
               $data = array('MaTour' =>  $MaTour,
                    'MaNhomTour' =>  $v,
                ); 
               chitietnhomtour::insert($data);
            }
            foreach ($request -> DiaDiemTour as $key => $v) {
               $data = array('MaTour' =>  $MaTour,
                    'MaDD' =>  $v,
                ); 
               diadiemtour::insert($data);
            }
        }

        return redirect('admin/qlTour/danhsachTour') -> with('thongbao', 'Thêm Thành Công');
    }

    public function getThemCTTour(){
        
        return view('admin.qlTour.themCTTour');
    }
    public function postThemCTTour(Request $request, $MaTour ){
        $this -> validate($request,
        [
            
            'NgayKhoiHanh' => 'required',
            'SL' => 'required',
            'NhanVienHD' => 'required',



        ],[
            
            'NgayKhoiHanh.required' => 'Bạn chưa nhập Ngày khởi hành',
            'SL.required' => 'Bạn chưa nhập Số lượng',
            'NhanVienHT.required' => 'Bạn chưa nhập Nhân viên hướng dẫn',
            
        ]);

        $chitiettour = new chitiettour;
        $chitiettour -> MaTour= $MaTour;
        $chitiettour -> NgayKhoiHanh= $request -> NgayKhoiHanh;
        $chitiettour -> NgayKetThuc= $request -> NgayKetThuc;
        $chitiettour -> MaNV= $request -> NhanVienHD;
        $chitiettour -> SL= $request -> SL;
        
        

        $chitiettour ->  save();
         return redirect()->back() -> with('thongbao3', 'Thêm Thành Công');
    }
    public function suaCTTour(Request $request, $MaCTTour ){
        $chitiettour = chitiettour::find($MaCTTour);
        $this -> validate($request,
        [
            
            'NgayKhoiHanh' => 'required',
            'SL' => 'required',
            'NhanVienHD' => 'required',



        ],[
            
            'NgayKhoiHanh.required' => 'Bạn chưa nhập Ngày khởi hành',
            'SL.required' => 'Bạn chưa nhập Số lượng',
            'NhanVienHT.required' => 'Bạn chưa nhập Nhân viên hướng dẫn',
            
        ]);

        
        
        $chitiettour -> NgayKhoiHanh= $request -> NgayKhoiHanh;
        $chitiettour -> NgayKetThuc= $request -> NgayKetThuc;
        $chitiettour -> MaNV= $request -> NhanVienHD;
        $chitiettour -> SL= $request -> SL;
        
        

        $chitiettour ->  save();
         return redirect()->back() -> with('thongbao3', 'Thêm Thành Công');
    }

    public function postSuaTour(Request $request, $MaTour ){
        $tour= tour::find($MaTour);
        $this -> validate($request,
        [
            'Ten' => 'required',            
            'DiemKhoiHanh' => 'required',
           
            'NhanVienPT' => 'required',
            'Gia' => 'required',


        ],[
            'Ten.required' => 'Bạn chưa nhập Tên Tour',
            
            'DiemKhoiHanh.required' => 'Bạn chưa nhập điểm khởi hành',
          
            'HinhThuc.required' => 'Bạn chưa nhập Hình thức du lịch',
            'NhanVienPT.required' => 'Bạn chưa nhập Nhân viên phụ trách',            
            'Gia.required' => 'Bạn chưa nhập Gía',
        ]);
        if ($request-> HinhAnh== "") {
        $tour -> TenTour= $request -> Ten;
        $tour -> TieuDe= $request -> TieuDe;
        $tour -> DiemKhoiHanh= $request -> DiemKhoiHanh;
        $tour -> MaNV= $request -> NhanVienPT;
        $tour -> MaHT= $request -> HinhThuc;
        $tour -> MaKV= $request -> khuvuc;
        $tour -> MoTa= $request -> MoTa;
        $tour -> Gia= $request -> Gia;
        $tour -> GiaTE= $request -> GiaTE;
        $tour -> GiaEB= $request -> GiaEB;
        $tour -> SoNgay= $request -> SoNgay;
         
            if($tour -> save()){
                $MaTour = $tour -> MaTour;
                $chitietnhomtour= chitietnhomtour::where('MaTour', $tour-> MaTour);
                $chitietnhomtour -> delete();     
                $diadiemtour= diadiemtour::where('MaTour', $tour-> MaTour);
                $diadiemtour -> delete();        
            foreach ($request -> CTNhomTour as $key => $v) {
               $data = array('MaTour' =>  $MaTour,
                    'MaNhomTour' =>  $v,
                ); 
               chitietnhomtour::insert($data);

            }
            foreach ($request -> DiaDiemTour as $key => $v) {
               $data = array('MaTour' =>  $MaTour,
                    'MaDD' =>  $v,
                ); 
               diadiemtour::insert($data);
            }
        }
        }
        else{
        $tour -> TenTour= $request -> Ten;
        $tour -> DiemKhoiHanh= $request -> DiemKhoiHanh;
        $tour -> MaNV= $request -> NhanVienPT;
        $tour -> MaHT= $request -> HinhThuc;
        $tour -> MoTa= $request -> MoTa;
        $tour -> Gia= $request -> Gia;
        $tour -> GiaTE= $request -> GiaTE;
        $tour -> GiaEB= $request -> GiaEB;
        $tour -> SoNgay= $request -> SoNgay;

        if($request -> hasFile('HinhAnh'))
        {
            $file = $request->file('HinhAnh');

            $name = $file -> getClientOriginalName();

            $Hinh = str_random(4)."_".$name;
            while(file_exists('upload/tour'.$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tour", $Hinh);
            $tour -> HinhAnh= $Hinh;
        }
        else
        {
            $tour -> HinhAnh="";
        }

         if($tour -> save()){
                $MaTour = $tour -> MaTour;
                $chitietnhomtour= chitietnhomtour::where('MaTour', $tour-> MaTour);
                $chitietnhomtour -> delete();  
                $diadiemtour= diadiemtour::where('MaTour', $tour-> MaTour);
                $diadiemtour -> delete();              
            foreach ($request -> CTNhomTour as $key => $v) {
               $data = array('MaTour' =>  $MaTour,
                    'MaNhomTour' =>  $v,
                ); 
               chitietnhomtour::insert($data);
            }
            foreach ($request -> DiaDiemTour as $key => $v) {
               $data = array('MaTour' =>  $MaTour,
                    'MaDD' =>  $v,
                ); 
               diadiemtour::insert($data);
            }
        }
    }
        return redirect('admin/qlTour/danhsachTour') -> with('thongbao', 'Sửa Thành Công');
    }
    public function postThemDDDL(Request $request, $MaTour ){
        
        $diadiemtour = new diadiemtour;
        $diadiemtour -> MaTour= $MaTour;
        $diadiemtour -> MaDD= $request -> MaDD;
        $MT= is_numeric($MaTour);
        $diadiemtour -> save();
        return redirect()->back() -> with('thongbao1', 'Thêm Thành Công');
    }
    public function postThemCB(Request $request, $MaCTTour ){
        
        $dichvutour = new dichvutour;
        $dichvutour -> MaCTTour= $MaCTTour;
        foreach (banggiadichvu::where('MaGiaDV',$request-> MaGiaDV)->get() as $bg) {
           $dichvutour -> MaDoiTac= $bg -> MaDoiTac;
           $dichvutour -> NgayCI= $bg -> NgayBay;
           $dichvutour -> LoaiDV= $bg -> MaGiaDV;
           $dichvutour -> Gia= $bg -> Gia;
           $dichvutour -> SLNL= $request -> SLKCB;
           $dichvutour -> TongTien= ($request -> SLKCB)*($bg -> Gia);

        }
        $dichvutour -> MaLoaiDT= 3;
     
        $dichvutour -> save();
        return redirect()->back() -> with('thongbao1', 'Thêm Thành Công');
    }

    public function getSuaTour($MaTour){
        $tour = tour::find($MaTour);
        return view('admin.qlTour.sua',['tour'=>$tour]);
    }

    public function getThemDVTour($MaCTTour){
    	   	
    	$chitiettour = chitiettour::find($MaCTTour);
    	    	
    	return view('admin.qlTour.themDVTour',['chitiettour'=>$chitiettour]  );

    }
    public function postThemDVTour(Request $request, $MaCTTour ){

        $this -> validate($request,
        [
            'doitac' => 'required',
            'tendichvu' => 'required',
            'NgayCI' => 'required',
            


        ],[
            'doitac.required' => 'Bạn chưa chọn đối tác',
            'tendichvu.required' => 'Bạn chưa chọn dịch vụ',
            'NgayCI.required' => 'Bạn chưa nhập Ngày Check In',
            
            
        ]);

        $dichvutour = new dichvutour;
        $dichvutour -> MaCTTour= $MaCTTour;
        $dichvutour -> MaDoiTac= $request -> doitac;
        $dichvutour -> NgayCI= $request -> NgayCI;
        $dichvutour -> LoaiDV= $request -> tendichvu;
        $dichvutour -> NgayCO= $request -> NgayCO;
        $dichvutour -> MaLoaiDT= $request -> LoaiDV;
        $dichvutour -> NgayCO= $request -> NgayCO;
        $dichvutour -> SLNL= $request -> SLNL;
        $dichvutour -> SLTE= $request -> SLTE;
        $dichvutour -> TongTien= $request -> ThanhTien;
        $dichvutour -> GiaTE= $request -> GiaTE;
        $dichvutour -> Gia= $request -> Gia;
        
        $MT=$MaCTTour ;
        $dichvutour -> save();
        return redirect('admin/qlTour/chitiettour/'.$MT) -> with('thongbao', 'Thêm Thành Công');
    }
    public function suaDVTour(Request $request, $MaDVTour ){
        $dichvutour= dichvutour::find($MaDVTour);
        $this -> validate($request,
        [
            'doitac' => 'required',
            'tendichvu' => 'required',
            'NgayCI' => 'required',
            
        ],[
            'doitac.required' => 'Bạn chưa chọn đối tác',
            'tendichvu.required' => 'Bạn chưa chọn dịch vụ',
            'NgayCI.required' => 'Bạn chưa nhập Ngày Check In',
            
            
        ]);

        
        $dichvutour -> MaDoiTac= $request -> doitac;
        $dichvutour -> NgayCI= $request -> NgayCI;
        $dichvutour -> LoaiDV= $request -> tendichvu;
        $dichvutour -> NgayCO= $request -> NgayCO;
        $dichvutour -> Gia= $request -> Gia;
        $dichvutour -> GiaTE= $request -> GiaTE;

        $dichvutour -> save();
        return redirect()->back() -> with('thongbao', 'Cập Nhật Thành Công');
    }
    public function XoaDDDL($id){
            
        $diadiemtour = diadiemtour::where('id', $id);
        $diadiemtour->delete();

        return redirect()->back()->with('thongbao1', 'Bạn đã xóa Thành Công');

    }
    public function showNoiBat(Request $request, $id){
            
        $tour = tour::find($id);
        $tour-> NoiBat = 1;
        $tour-> TinhTrang = 1;
        $tour -> save();

        return redirect()->back()->with('thongbao', 'Đã Hiển Thị ');

    }
    public function hideNoiBat(Request $request, $id){
            
        $tour = tour::find($id);
        $tour-> NoiBat = 0;
        $tour -> save();

        return redirect()->back()->with('thongbao', 'Đã Ẩn ');

    }
    public function showTinhTrang(Request $request, $id){
            
        $tour = tour::find($id);
        $tour-> TinhTrang = 1;
        $tour -> save();

        return redirect()->back()->with('thongbao', 'Đã Mở Tour ');

    }
    public function hideTinhTrang(Request $request, $id){
            
        $tour = tour::find($id);
        $tour-> NoiBat = 0;
        $tour-> TinhTrang = 0;
        $tour -> save();

        return redirect()->back()->with('thongbao', 'Đã Đóng Tour ');

    }
    public function showTinhTrangCT(Request $request, $id){
            
        $chitiettour = chitiettour::find($id);
        $chitiettour-> TinhTrang = 1;
        $chitiettour -> save();

        return redirect()->back()->with('thongbao', 'Đã Mở Tour ');

    }
    public function hideTinhTrangCT(Request $request, $id){
            
        $chitiettour = chitiettour::find($id);
        $chitiettour-> TinhTrang = 0;
        $chitiettour -> save();

        return redirect()->back()->with('thongbao', 'Đã Đóng Tour ');

    }
    public function XoaDVTour($id){
            
        $dichvutour = dichvutour::where('MaDVTour', $id);
        $dichvutour->delete();

        return redirect()->back()->with('thongbao', 'Bạn đã xóa Thành Công');

    }
    public function XoaCTTour($id){
        
        
        $chitiettour = chitiettour::where('MaCTTour', $id);
        $chitiettour->delete();
      

        return redirect()->back()->with('thongbao', 'Bạn đã xóa Thành Công');

    }

    public function getXoaTour($MaTour){
        $tour = tour::find($MaTour);
        $chitiettour = chitiettour::where('MaTour',$MaTour);
        $chitietnhomtour = chitietnhomtour::where('MaTour',$MaTour);
        $diadiemtour = diadiemtour::where('MaTour',$MaTour);
        $diadiemtour->delete();
        $chitietnhomtour->delete();
        $chitiettour->delete();

        $tour->delete();


        return redirect('admin/qlTour/danhsachTour')->with('thongbao', 'Bạn đã xóa Thành Công');
    }
    public function postThanhToanDV(Request $request){
            $thuchi= new thuchi;
            $thuchi -> MaDVTour = $request -> madvtour;
            $thuchi -> MaCTTour = $request -> MaCTTour1;
            $thuchi -> DichVu = $request -> DichVu;
            $thuchi -> LoaiThuChi = 2;
            $thuchi -> NgayTT = date(now());
            $thuchi -> NoiDung= $request -> GhiChu;
            $thuchi -> SoTien = $request -> SoTienTT;
            $thuchi -> MaNV = $request -> MaNV;
            if($thuchi->save()){
            $dichvutour = dichvutour::find($request -> madvtour);
            $dichvutour -> ThanhToan= $request -> SoTien;
            $dichvutour -> save();
            }
            return  redirect()->back()->with('thongbao', 'Thanh Toán Thành Công');
    }

}
