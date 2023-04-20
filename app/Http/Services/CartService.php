<?php 
namespace App\Http\Services;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class CartService
{
    public function getCustomerBill($customer)
    {
        return $customer->bill()->select('id', 'active', 'total_price')->orderByDesc('id')->paginate(10);
    }
    public function getBillDetail($id)
    {
        return BillDetail::where('bill_id', $id)->orderByDesc('id')->paginate(10);
    }
}