<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
    public  function index()
    {
        $bills = Bill::orderByDesc('id')->paginate(10);
        return view('admin.bills.customer', [
            'title' => 'Danh sách đơn hàng',
            'bills' => $bills
        ]);
    }
    public function show($id)
    {
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
}
