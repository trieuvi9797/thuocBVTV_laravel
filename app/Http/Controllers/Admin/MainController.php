<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_type == 'AD'){
            return view('admin.dashboard.index', [
                'title' => 'Trang quản trị',
            ]);
        }
        return redirect('/');
    }
}
