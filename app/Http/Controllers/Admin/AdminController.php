<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
