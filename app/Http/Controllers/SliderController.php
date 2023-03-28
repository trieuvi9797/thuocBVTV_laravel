<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        return view('admin.sliders.index', [
            'title' => 'Danh sách slider',
            'sliders' => $this->slider->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create', [
            'title' => 'Thêm slider mới'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'image' => 'required',
        ]);
        $this->slider->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
