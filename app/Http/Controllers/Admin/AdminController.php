<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_type == 'AD'){
            $user = User::orderByDesc('id')->search()->paginate(10);
            return view('admin.users.index',[
                'title' => 'Tài khoản khách hàng',
                'users' => $user
            ]);            
        }
        return redirect()->back();
    }

    public function resetPWadmin(){
        if(Auth::user()->user_type == 'AD'){
            return view('admin.users.resetPassword',[
            'title' => 'Đổi mật khẩu'
        ]);
        }
        return redirect()->back();
    }

    public function postResetPWadmin(Request $request){
        // if(Auth::user()->user_type == 'AD'){
        //     $user = User::findOne(Auth::user()->id);
        // }
        // $user->set('password',$request->param('password'));
        // $user->save();
        $request->validate([
            'password_old' => 'required|min:5|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Auth::user();
        dd($user);
        if($user){
            return back()->withInput()->with('error', 'Mật khẩu không khớp hoặc mã không hợp lệ!');
        }else{
            User::where('email', $request->email)->update([
                'password'=> Hash::make($request->password)
            ]);
            return redirect()->route('login')->with('success', 'Mật khẩu của bạn đã được thay đổi! Bạn có thể đăng nhập lại bằng mật khẩu mới.');
        }
    }
}
