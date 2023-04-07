<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if($result === false){
            return redirect()->back();
        }
        return redirect('/carts');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();
        return view('client.carts.list',[
            'title' => 'Giở hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }
    public function update(Request $request)
    {
        $result = $this->cartService->update($request);
        if($result === false){
            return redirect()->back();
        }
        return redirect('/carts');
    }

    public function destroy($id = 0)
    {
        $result = $this->cartService->delete($id);
        if($result === false){
            return redirect()->back();
        }
        return redirect('/carts');
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
    
}
