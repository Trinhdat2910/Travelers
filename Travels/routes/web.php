<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register' => false]);
Route::get('admin/login','LoginController@getLogin')->name('login');
Route::post('admin/login','LoginController@postLogin');
Route::get('logoutAdmin','LoginController@getLogoutAdmin');


// Route::get('admin/login','NhanVienController@getLogin')->name('login');
// Route::post('admin/login','NhanVienController@postLogin');
// Route::get('logoutAdmin','NhanVienController@getLogoutAdmin');

Route::get('loginMember','KhachHangController@getLogin');
Route::post('loginMember','KhachHangController@postLogin');
Route::get('logoutMember','KhachHangController@getLogout');

Route::get('registerMember','KhachHangController@getRegister');
Route::post('Member','KhachHangController@postRegisterMember');


Route::get('admin','HomeController@getIndexAdmin')->middleware('adminLogin');
Route::get('','IndexController@getIndex');
Route::get('indexAdmin','IndexController@getIndexAdmin')->middleware('adminLogin');
Route::get('indexEmployee','IndexController@getIndexEmployee')->middleware('employeeLogin');;
Route::get('error_truycap','IndexController@getErrorTruyCap');
Route::get('error_truycapNV','IndexController@getErrorTruyCapNV');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'qlNV'],function(){
		Route::get('danhsachNV','NhanVienController@getDanhSachNV');
		Route::get('danhsachDH','NhanVienController@getDanhSachDH');

		Route::get('themNV','NhanVienController@getThemNV');
		Route::post('themNV','NhanVienController@postThemNV');
		Route::post('themDH','NhanVienController@postThemDH');

		Route::get('editNV/{MaNV}','NhanVienController@getEditNV');
		Route::put('suaNV/{MaNV}','NhanVienController@SuaNV');

		Route::post('xoaNV/{MaNV}','NhanVienController@XoaNV');
	});

	Route::group(['prefix'=>'qlKH'],function(){
		Route::get('danhsachKH','KhachHangNVController@getDanhSachKH');


		Route::get('editKH/{MaKH}','KhachHangNVController@getEditKH');
		Route::put('suaKH/{MaKH}','KhachHangNVController@SuaKH');

		Route::post('xoaKH/{MaKH}','KhachHangNVController@XoaKH');
	});

	Route::group(['prefix'=>'qlDD'],function(){
		Route::get('danhsachDD','DiaDiemController@getDanhSachDD');

		Route::get('themDD','DiaDiemController@getThemDD');
		Route::post('themDD','DiaDiemController@postThemDD');

		Route::get('editDD/{MaDD}','DiaDiemController@getEditDD');
		Route::put('suaDD/{MaDD}','DiaDiemController@SuaDD');


		Route::post('xoaDD/{MaDD}','DiaDiemController@XoaDD');
	});
	Route::group(['prefix'=>'qlDoiTac'],function(){
		Route::get('danhsachDT','DoiTacController@getDanhSachDT');

		Route::get('themDT','DoiTacController@getThemDT');
		Route::post('themDT','DoiTacController@postThemDT');

		Route::get('suaDT/{MaDT}','DoiTacController@getSuaDT');
		Route::post('suaDT/{MaDT}','DoiTacController@postSuaDT');
		Route::get('xoaDV/{MaDV}','DoiTacController@XoaDV');
		Route::get('xoaDT/{MaDT}','DoiTacController@getXoaDT');
	});

	Route::group(['prefix'=>'qlHD'],function(){
		Route::get('danhsachHD','HopDongController@getDanhSachHD');

		Route::get('suaHD/{MaHD}','HopDongController@getSuaHD');
		Route::post('suaHD/{MaHD}','HopDongController@postSuaHD');

		Route::get('ListHDTour/{MaCTTour}','HopDongController@getListHDTour');

		Route::get('XuLyHD/{MaHD}','HopDongController@getXuLyHD');
		Route::post('XuLyHD/{MaHD}','HopDongController@postXuLyHD');

		Route::get('UpdateDVHD/{MaHD}','HopDongController@getUpdateDVHD');
		Route::post('UpdateDVHD/{MaHD}','HopDongController@postUpdateDVHD');
		Route::post('ThanhToanHD','HopDongController@postThanhToanHD');

		Route::post('XacNhanHD','HopDongController@postXacNhanHD');

		Route::get('xoaHD/{MaHD}','HopDongController@getXoaHD');
	});
	Route::group(['prefix'=>'qlBieuMau'],function(){
		Route::post('YCThanhToanHD','SendMailController@postYCThanhToanHD');

	});

	Route::group(['prefix'=>'qlThuChi'],function(){
		Route::get('ThuChiTour','ThuChiController@ThuChiTour');
		Route::get('ThuChiNgay','ThuChiController@ThuChiNgay');
		Route::get('ThuChiThang','ThuChiController@ThuChiThang');

	});


	Route::group(['prefix'=>'qlTour'],function(){
		Route::get('danhsachTour','TourController@getDanhSachTour');
		Route::get('dsTourMB','TourController@getdsTourMB');
		Route::get('dsTourMT','TourController@getdsTourMT');
		Route::get('dsTourMN','TourController@getdsTourMN');

		Route::get('themTour','TourController@getThemTour');
		Route::post('themTour','TourController@postThemTour');

		Route::get('suaTour/{MaTour}','TourController@getSuaTour');
		Route::post('suaTour/{MaTour}','TourController@postSuaTour');

		Route::get('xoaTour/{MaTour}','TourController@getXoaTour');

		Route::get('XuLyTour','TourController@getXuLyTour');
		Route::get('XuLyTourMB','TourController@getXuLyTourMB');
		Route::get('XuLyTourMT','TourController@getXuLyTourMT');
		Route::get('XuLyTourMN','TourController@getXuLyTourMN');
		
		Route::get('danhsachcttour/{MaTour}','TourController@getdanhsachCTTour');

		Route::get('chitiettour/{MaCTTour}','TourController@getChiTietTour');

		Route::post('themDDDL/{MaTour}','TourController@postThemDDDL');
		Route::post('xoaDDDL/{id}','TourController@XoaDDDL');

		Route::get('themDV/{MaCTTour}','TourController@getThemDVTour');
		Route::post('themDVTour/{MaCTTour}','TourController@postThemDVTour');
		Route::post('ThemCB/{MaCTTour}','TourController@postThemCB');


		Route::post('ThanhToanDV','TourController@postThanhToanDV');


		Route::post('xoaDVTour/{id}','TourController@xoaDVTour');
		Route::put('suaDVTour/{id}','TourController@suaDVTour');

		
		Route::post('themCTTour/{MaTour}','TourController@postThemCTTour');
		Route::put('suaCTTour/{MaCTTour}','TourController@suaCTTour');
		Route::post('xoaCTTour/{id}','TourController@xoaCTTour');

		Route::post('shownoibat/{id}','TourController@showNoiBat');
		Route::post('hidenoibat/{id}','TourController@hideNoiBat');
		Route::post('showtt/{id}','TourController@showTinhTrang');
		Route::post('hidett/{id}','TourController@hideTinhTrang');

		Route::post('showttCT/{id}','TourController@showTinhTrangCT');
		Route::post('hidettCT/{id}','TourController@hideTinhTrangCT');
	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('doitac/{tinh}{dv}','AjaxController@getDoiTac');
		Route::get('tendichvu/{dt}','AjaxController@getDV');
		Route::get('giadichvu/{iddv}','AjaxController@getGiaDV');
		Route::get('giadichvuTE/{iddv}','AjaxController@getGiaDVTE');
		Route::get('diadiemdl/{tinh}','AjaxController@getDiaDiemDL');
		Route::get('tinh/{qg}','AjaxController@getTinh');
		Route::get('khuvuc/{lt}','AjaxController@getKhuVuc');
		Route::get('nhomtour/{kv}','AjaxController@getNhomTour');
		Route::get('timcb/{kh}','AjaxController@getTimCB');
		Route::get('TimTour/{Tour}','AjaxController@getTimTour');
		Route::get('TimTCTour/{macttour}','AjaxController@getTimTCTour');
		Route::get('TimTCNgay/{ngay}','AjaxController@getTimTCNgay');
		Route::get('TimTCThang/{ngay1}/{ngay2}','AjaxController@getTimTCThang');

		});
});


Route::group(['prefix'=>'employee','middleware'=>'employeeLogin'],function(){
	Route::group(['prefix'=>'qlNV'],function(){
		Route::get('danhsachNV','NhanVienNVController@getDanhSachNV');
		Route::get('danhsachDH','NhanVienNVController@getDanhSachDH');

		Route::get('themNV','NhanVienNVController@getThemNV');
		Route::post('themNV','NhanVienNVController@postThemNV');
		Route::post('themDH','NhanVienNVController@postThemDH');

		Route::get('editNV/{MaNV}','NhanVienNVController@getEditNV');
		Route::put('suaNV/{MaNV}','NhanVienNVController@SuaNV');

		Route::post('xoaNV/{MaNV}','NhanVienNVController@XoaNV');
	});

	Route::group(['prefix'=>'qlKH'],function(){
		Route::get('danhsachKH','KhachHangNVController@getDanhSachKH');


		Route::get('editKH/{MaKH}','KhachHangNVController@getEditKH');
		Route::put('suaKH/{MaKH}','KhachHangNVController@SuaKH');

		Route::post('xoaKH/{MaKH}','KhachHangNVController@XoaKH');
	});

	Route::group(['prefix'=>'qlDD'],function(){
		Route::get('danhsachDD','DiaDiemNVController@getDanhSachDD');

		Route::get('themDD','DiaDiemNVController@getThemDD');
		Route::post('themDD','DiaDiemNVController@postThemDD');

		Route::get('editDD/{MaDD}','DiaDiemNVController@getEditDD');
		Route::put('suaDD/{MaDD}','DiaDiemNVController@SuaDD');


		Route::post('xoaDD/{MaDD}','DiaDiemNVController@XoaDD');
	});
	Route::group(['prefix'=>'qlDoiTac'],function(){
		Route::get('danhsachDT','DoiTacNVController@getDanhSachDT');

		Route::get('themDT','DoiTacNVController@getThemDT');
		Route::post('themDT','DoiTacNVController@postThemDT');

		Route::get('suaDT/{MaDT}','DoiTacNVController@getSuaDT');
		Route::post('suaDT/{MaDT}','DoiTacNVController@postSuaDT');
		Route::get('xoaDV/{MaDV}','DoiTacNVController@XoaDV');
		Route::get('xoaDT/{MaDT}','DoiTacNVController@getXoaDT');
	});

	Route::group(['prefix'=>'qlHD'],function(){
		Route::get('danhsachHD','HopDongNVController@getDanhSachHD');

		Route::get('suaHD/{MaHD}','HopDongNVController@getSuaHD');
		Route::post('suaHD/{MaHD}','HopDongNVController@postSuaHD');



		Route::get('XuLyHD/{MaHD}','HopDongNVController@getXuLyHD');
		Route::post('XuLyHD/{MaHD}','HopDongNVController@postXuLyHD');

		Route::get('UpdateDVHD/{MaHD}','HopDongNVController@getUpdateDVHD');
		Route::post('UpdateDVHD/{MaHD}','HopDongNVController@postUpdateDVHD');

		Route::get('xoaHD/{MaHD}','HopDongNVController@getXoaHD');
	});
	Route::group(['prefix'=>'qlBieuMau'],function(){
		Route::post('YCThanhToanHD','SendMailNVController@postYCThanhToanHD');

	});


	Route::group(['prefix'=>'qlTour'],function(){
		Route::get('danhsachTour','TourNVController@getDanhSachTour');
		Route::get('dsTourMB','TourNVController@getdsTourMB');
		Route::get('dsTourMT','TourNVController@getdsTourMT');
		Route::get('dsTourMN','TourNVController@getdsTourMN');

		Route::get('themTour','TourNVController@getThemTour');
		Route::post('themTour','TourNVController@postThemTour');

		Route::get('suaTour/{MaTour}','TourNVController@getSuaTour');
		Route::post('suaTour/{MaTour}','TourNVController@postSuaTour');

		Route::get('xoaTour/{MaTour}','TourNVController@getXoaTour');

		Route::get('XuLyTour','TourNVController@getXuLyTour');
		Route::get('XuLyTourMB','TourNVController@getXuLyTourMB');
		Route::get('XuLyTourMT','TourNVController@getXuLyTourMT');
		Route::get('XuLyTourMN','TourNVController@getXuLyTourMN');
		
		Route::get('danhsachcttour/{MaTour}','TourNVController@getdanhsachCTTour');

		Route::get('chitiettour/{MaCTTour}','TourNVController@getChiTietTour');

		Route::post('themDDDL/{MaTour}','TourNVController@postThemDDDL');
		Route::post('xoaDDDL/{id}','TourNVController@XoaDDDL');

		Route::get('themDV/{MaCTTour}','TourNVController@getThemDVTour');
		Route::post('themDVTour/{MaCTTour}','TourNVController@postThemDVTour');
		Route::post('ThemCB/{MaCTTour}','TourNVController@postThemCB');

		Route::post('xoaDVTour/{id}','TourNVController@xoaDVTour');
		Route::put('suaDVTour/{id}','TourNVController@suaDVTour');

		
		Route::post('themCTTour/{MaTour}','TourNVController@postThemCTTour');
		Route::put('suaCTTour/{MaCTTour}','TourNVController@suaCTTour');
		Route::post('xoaCTTour/{id}','TourNVController@xoaCTTour');

		Route::post('shownoibat/{id}','TourNVController@showNoiBat');
		Route::post('hidenoibat/{id}','TourNVController@hideNoiBat');
		Route::post('showtt/{id}','TourNVController@showTinhTrang');
		Route::post('hidett/{id}','TourNVController@hideTinhTrang');

		Route::post('showttCT/{id}','TourNVController@showTinhTrangCT');
		Route::post('hidettCT/{id}','TourNVController@hideTinhTrangCT');
	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('doitac/{tinh}{dv}','AjaxNVController@getDoiTac');
		Route::get('tendichvu/{dt}','AjaxNVController@getDV');
		Route::get('giadichvu/{iddv}','AjaxNVController@getGiaDV');
		Route::get('giadichvuTE/{iddv}','AjaxNVController@getGiaDVTE');
		Route::get('diadiemdl/{tinh}','AjaxNVController@getDiaDiemDL');
		Route::get('tinh/{qg}','AjaxNVController@getTinh');
		Route::get('khuvuc/{lt}','AjaxNVController@getKhuVuc');
		Route::get('nhomtour/{kv}','AjaxNVController@getNhomTour');
		Route::get('timcb/{kh}','AjaxNVController@getTimCB');

		});
});

Auth::routes();

Route::group(['prefix'=>'home'],function(){
	Route::group(['prefix'=>'BookTour','middleware'=>'memberLogin'],function(){
		Route::get('Booking/{id}','BookTourController@getBookTour');
		Route::post('DatTour/{id}','BookTourController@postDatTour');
		Route::get('TourDaDat','ListTourController@getTourDaDat');

		
	});
	Route::group(['prefix'=>'ListTour'],function(){
		Route::get('TourMienBac','ListTourController@getTourMB');
		Route::get('TourMienTrung','ListTourController@getTourMT');
		Route::get('TourMienNam','ListTourController@getTourMN');
		
		Route::get('DetailTour/{id}','ListTourController@getDetailTour');
		Route::get('NhomTour/{id}','ListTourController@getNhomTour');

		
	});
	});

