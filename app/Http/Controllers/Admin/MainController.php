<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_type == 'AD'){
            $totalProduct = Product::count();
            $totalCategory = Category::count();
            $totalAllUser = User::count();
            $totalPost = Post::count();
            $totalAdmin = User::where('user_type', 'AD')->count();
            $totalUser = User::where('user_type', 'US')->count();
            $totalPriceBill = Bill::where('active', 2)->sum('total_price');
            
            $todayDate = Carbon::now()->format('Y-m-d');
            $month = Carbon::now()->format('m');
            $year = Carbon::now()->format('Y');
            $totalBill = Bill::count();
            $todayBill = Bill::whereDate('created_at', $todayDate)->count();
            $monthBill = Bill::whereMonth('created_at', $month)->count();
            $yearBill = Bill::whereYear('created_at', $year)->count();
            $priceDay = Bill::where('active', 2)->whereDate('created_at', $todayDate)->sum('total_price');
            $priceMonth = Bill::where('active', 2)->whereMonth('created_at', $month)->sum('total_price');
            $priceYear = Bill::where('active', 2)->whereYear('created_at', $year)->sum('total_price');

            return view('admin.dashboard.index', [
                'title' => 'Trang quản trị',
                'totalProduct' => $totalProduct,
                'totalCategory' => $totalCategory,
                'totalAllUser' => $totalAllUser,
                'totalAdmin' => $totalAdmin,
                'totalUser' => $totalUser,
                'totalPriceBill' => $totalPriceBill,
                'totalBill' => $totalBill,
                'todayBill' => $todayBill,
                'monthBill' => $monthBill,
                'yearBill' => $yearBill,
                'priceDay' => $priceDay,
                'priceMonth' => $priceMonth,
                'priceYear' => $priceYear,
                'totalPost' => $totalPost,
            ]);
        }
        return redirect('/');
    }
}
