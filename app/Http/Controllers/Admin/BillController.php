<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
    public  function index()
    {
        if(Auth::user()->user_type == 'AD'){
            $bills = Bill::orderByDesc('id')->paginate(10);
            return view('admin.bills.customer', [
                'title' => 'Danh sách đơn hàng',
                'bills' => $bills
            ]);
        }
        return redirect()->back();
    }
    public function show($id)
    {
        if(Auth::user()->user_type == 'AD'){
            $billDetail = BillDetail::where('bill_id',$id)->get();
            $bill = Bill::find($id);
            $customer = Customer::find($bill->customer_id);
            return view('admin.bills.detail',[
                'title' => 'Chi tiết đơn hàng',
                'customers' => $customer,
                'bills' => $bill,
                'billDetails' => $billDetail
            ]);
        }
        return redirect()->back();
    }
    public function activeBill($id)
    {
        if(Auth::user()->user_type == 'AD'){
            $bill = Bill::where('id',$id)->first();
            if($bill->active == 0){
                DB::table('bills')->where('id',$id)->update(['active' => 1]);
            }
    
            $billDetail = BillDetail::where('bill_id',$id)->get();
            $bill = Bill::find($id);
            $customer = Customer::find($bill->customer_id);
            return view('admin.bills.detail',[
                'title' => 'Chi tiết đơn hàng',
                'customers' => $customer,
                'bills' => $bill,
                'billDetails' => $billDetail
            ]);
        }
        return redirect()->back();
    }
    public function billNew()
    {
        if(Auth::user()->user_type == 'AD'){
            $bills = Bill::where('active', 0)->orderByDesc('id')->paginate(10);
            return view('admin.bills.new', [
                'title' => 'Danh sách đơn hàng mới',
                'bills' => $bills
            ]);
        }
        return redirect()->back();
    }
    public function billShip()
    {
        if(Auth::user()->user_type == 'AD'){
            $bills = Bill::where('active', 1)->orderByDesc('id')->paginate(10);
            return view('admin.bills.ship', [
                'title' => 'Danh sách đơn hàng mới',
                'bills' => $bills
            ]);
        }
        return redirect()->back();
    }
    public function billDone()
    {
        if(Auth::user()->user_type == 'AD'){
            $bills = Bill::where('active', 2)->orderByDesc('id')->paginate(10);
            return view('admin.bills.done', [
                'title' => 'Danh sách đơn hàng mới',
                'bills' => $bills
            ]);
        }
        return redirect()->back();
    }
    public function billAlert()
    {
        if(Auth::user()->user_type == 'AD'){
            $bills = Bill::where('active', 2)->orderByDesc('id')->paginate(10);
            return view('admin.bills.done', [
                'title' => 'Danh sách đơn hàng mới',
                'bills' => $bills
            ]);
        }
        return redirect()->back();
    }
}
