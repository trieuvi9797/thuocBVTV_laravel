<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:App\Models\User,email',
            'password' => 'required|confirmed'
        ]);
        $password = Hash::make($request['password']);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'passwword' => $password
        ]);
        return redirect('/');
    }
    public function login(Request $request)
    {
        $login_info =$request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($login_info, $request['remember'])){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng. Vui lòng nhập lại!',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}
