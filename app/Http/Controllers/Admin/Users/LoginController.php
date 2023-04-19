<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'signin-email' => 'required|email:filter',
            'signin-password' => 'required'
        ]);
        
        if(Auth::attempt([
            'email' => $request -> input('signin-email'),
            'password' => $request -> input('signin-password')],
            $request->input('remember'))){
                return redirect()-> route('admin');                
        }

        Session::flash('error', 'Email hoặc Password không đúng!');
        return redirect()->back();
    }
}
