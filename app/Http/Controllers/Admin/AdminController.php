<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_type == 'AD'){
            $user = User::orderByDesc('id')->search()->paginate(10);
            return view('admin.users.index',[
                'title' => 'Quản lý tài khoản',
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
        $request->validate([
            'password_new' => 'required|min:6',
            'password_confirmation' => 'required',
        ],[
            'password_new.required' => 'Vui lòng nhập vào mật khẩu.',
            'password_new.min' => 'Vui lòng nhập mật khẩu lớn hơn 6 kí tự.',
            'password_confirmation.required' => 'Vui lòng xác nhận lại mật khẩu.',
        ]);

        $user = User::where('email', Auth::user()->email)->first();
        if(Hash::check($request->password_old, $user->password) == true)
        {
            if($request->password_new == $request->password_confirmation){
                User::whereId($user->id)->update([
                    'password' => Hash::make($request->password_new)
                ]);
                return redirect()->back();
            }
            return redirect()->back()->with('error', 'Vui lòng xác nhận lại mật khẩu, không khớp với mật khẩu mới bạn vừa nhập!');
        }
        return redirect()->back()->with('error', 'Mật khẩu cũ của bạn không đúng!');
    }

    public function create(){
        if(Auth::user()->user_type == 'AD'){
            return view('admin.users.create',[
                'title' => 'Tạo tài khoản'
            ]);
        }
        return redirect()->back();
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên người dùng.',
            'email.required' => 'Vui lòng nhập vào email.',
            'email.email' => 'Vui lòng nhập đúng định dạng email.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Vui lòng nhập vào mật khẩu.',
            'password.min' => 'Vui lòng nhập mật khẩu lớn hơn 6 kí tự.',
            'password_confirmation.required' => 'Vui lòng xác nhận lại mật khẩu.',
        ]);

        if($request->password == $request->password_confirmation){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_type = 'AD';
            $user->save();
            return redirect('/admin/users/index')->with('success', 'Tạo tài khoản thành công!');

        }
        return redirect()->back()->with('error', 'Mật khẩu không khớp. Vui lòng thử lại!');

    }

    public function profileADmin(){
        if(Auth::user()->user_type == 'AD'){
            return view('admin.users.profile',[
                'title' => 'Tài khoản của tôi.',
                'user' => Auth::user()
            ]); 
        }
        return redirect()->back();
    }
}
