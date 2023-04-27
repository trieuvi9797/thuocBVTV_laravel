<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // public function postForgotPass(User $user, $token)
    // {
    //     if($user->token)
    // }
}
