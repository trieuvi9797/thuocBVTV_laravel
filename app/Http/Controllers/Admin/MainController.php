<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Category;
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
            ]);
        }
        return redirect('/');
    }
}
