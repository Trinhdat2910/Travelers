<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThuChiController extends Controller
{
    public function ThuChiTour(){

    	return view('admin.qlThuChi.ThuChiTour');
    }
    public function ThuChiNgay(){

    	return view('admin.qlThuChi.ThuChiNgay');
    }
    public function ThuChiThang(){

    	return view('admin.qlThuChi.ThuChiThang');
    }
}
