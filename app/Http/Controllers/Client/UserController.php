<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required|email|exists:users,email'
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ email hợp lệ.',
            'email.exists' => 'Email này không tồn tại trong hệ thống!.',
        ]);

        $token = \Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('user.resetPass', ['token'=> $token, 'email'=>$request->email]);
        $body = "Chúng tôi nhận được yêu cầu đặt lại mật khẩu cho ". $request->email .". Bạn có thể đặt lại mật khẩu của mình bằng cách click vào link dưới đây.";

        Mail::send('client.mail.check_forget',['action_link'=>$action_link, 'body'=>$body], function($message) use ($request){
            $message->to($request->email, 'Your name')
                    ->subject('Đặt lại mật khẩu');
        });
        return back()->with('success', 'Chúng tôi đã gửi liên kết đặt lại mật khẩu qua email!');
    }

    public function showResetForm(Request $request, $token = null){
        return view('client.auth.reset_pw')->with(['token'=>$token, 'email'=>$request->email]);
    }

    public function postResetPass(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = DB::table('password_reset_tokens')->where([
            'email'=>$request->email,
            'token'=>$request->token
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('error', 'Mật khẩu không khớp hoặc mã không hợp lệ!');
        }else{
            User::where('email', $request->email)->update([
                'password'=> Hash::make($request->password)
            ]);

            DB::table('password_reset_tokens')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('login')->with('success', 'Mật khẩu của bạn đã được thay đổi! Bạn có thể đăng nhập lại bằng mật khẩu mới.');
        }

    }
}
