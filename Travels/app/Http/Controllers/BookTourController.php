<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Requests;
use App\chitiettour;
use App\hopdong;
use App\thongtinkhach;


class BookTourController extends Controller
{
    public function getBookTour($id){
    	$chitiettour = chitiettour::where('MaCTTour', $id) ->first();
    	return view('home.BookTour.Booking',['chitiettour'=> $chitiettour]);
    }
    public function postDatTour( Request $request, $id){
    	$sl=($request -> SLNL)+($request -> SLTE)+($request -> SLEB);
    	$arr = [
            'MaKH'=> $request -> MaKH,
	        'MaCTTour'=> $id,
	        'NgayDat'=> date(now()),
	        'SoCho'=> $sl,
	        'SLNL'=> $request -> SLNL,
	        'SLTE'=> $request -> SLTE,
	        'SLEB'=>$request -> SLEB,
	        'HinhThucTT'=>$request -> paymentType,
	        'MaLoaiTT'=>$request -> LoaiTT,
	        'ThanhTien'=>$request -> thanhtien,

	        
        ];
        
        $MaHD = hopdong::create($arr)->MaHD;
        for ($i = 1; $i <= $sl; $i++) {
        	$data[$i] = array(
	            'HoTen'=> $request -> HoTen[$i],
		        'MaHD'=> $MaHD,
		        'NgaySinh'=> $request-> NgaySinh[$i],
		        'GioiTinh'=> $request -> GioiTinh[$i],
		        'Tel'=> $request -> Tel[$i],
		        'DiaChi'=> $request -> Address[$i],
		        'Passport'=> $request -> Passport[$i],        
		       
        );
        	

        }
        // $infokhach= thongtinkhach::create($data)->id;
         thongtinkhach::insert($data);
        
        

    	return redirect('home/BookTour/TourDaDat');
    }
}
