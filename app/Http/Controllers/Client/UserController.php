<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Client\Str;

class UserController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $user = User::where('id',$id)->orderByDesc('id')->get();
        return view('client.profile.index',[
            'title' => 'Thông tin cá nhân',
            'user' => $user
        ]);
    }

    public function forgotPass()
    {
        return view('client.auth.forgot-pw');
    }

    public function postForgotPass(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users'
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ email hợp lệ.',
            'email.exists' => 'Email này không tồn tại trong hệ thống!.',
        ]);

        $token = strtoupper(Str::random(10));
        $user = User::where('email',$request->email)->first();
        Mail::send('mail.check_forget', compact('user'), function ($email) use($user){
            $email->subject('Lấy lại mật khẩu.');
            $email->sender($user->email, $user->name);
        });
    }
}
