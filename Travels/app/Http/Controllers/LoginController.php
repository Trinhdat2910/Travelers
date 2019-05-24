<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Validator;


class LoginController extends Controller
{
    public function getLogin(){
    	return view('admin.login');
    }
    public function postLogin(Request $request)
    {
    	$rules = [
    		'email'=>'required',
    		'password'=>'required|min:8'
    	];
    	$validator = Validator::make($request ->all(), $rules);

    	if($validator->fails()){
    		return redirect()->back()->withErrors($validator);
    	}
    	else{
    		$email = $request -> input('email');
    		$password = $request -> input('password');
            
    		if(Auth::attempt(['email'=> $email, 'password'=> $password]))
    		{
    			
                if(Auth::user()-> level == 3){
                    return redirect()->intended('/indexAdmin');
                }
                elseif(Auth::user()-> level == 2){
                    return redirect()->intended('/indexEmployee');
                }

    		}else{
    			return redirect()-> back();
    		}
    	}
    }
    public function getLoginUser(){
        return view('loginUser');
    }
   

    public function getLogoutAdmin(){
    	Auth::logout();
    	return redirect('admin/login');
    }
}
