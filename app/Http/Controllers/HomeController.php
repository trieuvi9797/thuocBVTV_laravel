<?php

namespace App\Http\Controllers;

use App\Http\Services\Category\CategoryService;
use App\Http\Services\InfoPage\InfoPageService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $slider;
    protected $category;
    protected $product;
    protected $infoPage;

    public function __construct(SliderService $slider, CategoryService $category, ProductService $product, InfoPageService $infoPage)
    {
        $this->slider = $slider;
        $this->product = $product;
        $this->category = $category;
        $this->infoPage = $infoPage;
    }
    public function index()
    {
        return view('client/home', [
            'title' => 'VTNN Khai Mai',
            'categories' => $this->category->show(),
            'slider' => $this->slider->show(),
            'parentCategories' => $this->category->getParent(),
            'products' => $this->product->show(),
            'infoPage' => $this->infoPage->get()
        ]);
    }

    
    /**
     * Show the form for creating a new resource.
     */
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
