<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\InfoPage\InfoPageService;
use App\Http\Services\Post\PostService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $slider;
    protected $category;
    protected $product;
    protected $post;


    public function __construct(SliderService $slider, CategoryService $category, ProductService $product, PostService $post)
    {
        $this->slider = $slider;
        $this->product = $product;
        $this->post = $post;
        $this->category = $category;
    }
    public function index()
    {
        return view('client.home', [
            'title' => 'VTNN Hai Lúa',
            'categories' => $this->category->show(),
            'slider' => $this->slider->show(),
            'products' => $this->product->show(),
            'productsNew' => $this->product->getProductNew(),
            'productSold' => $this->product->getProductSold(),
            'productSale' => $this->product->getProductSale(),
            'postNew' => $this->post->postNew()
        ]);
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
