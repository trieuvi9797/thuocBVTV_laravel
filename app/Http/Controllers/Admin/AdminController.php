<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::orderByDesc('id')->paginate(10);
        return view('admin.users.index',[
            'title' => 'Tài khoản khách hàng',
            'users' => $user
        ]);
    }
}
