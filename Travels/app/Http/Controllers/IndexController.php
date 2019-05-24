<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getIndex()
    {
        return view('home.layout.main');
    }
    public function getIndexAdmin()
    {
        return view('admin.layout.main');
    }
    public function getIndexEmployee()
    {
        return view('employee.layout.main');
    }
    public function getErrorTruyCap()
    {
        return view('error_truycap');
    }
    public function getErrorTruyCapNV()
    {
        return view('error_truycapNV');
    }
}
