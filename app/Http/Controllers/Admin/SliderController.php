<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        if(Auth::user()->user_type == 'AD'){
            $slider = Slider::orderByDesc('id')->paginate(10);
            return view('admin.sliders.index', [
                'title' => 'Danh sách slider',
                'sliders' => $slider
            ]);
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->user_type == 'AD'){
            return view('admin.sliders.create', [
                'title' => 'Thêm slider mới'
            ]);
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'image' => 'nullable|required|image|mimes:png,jpg,jpeg|max:2048',
            'sort_by' => 'required'
        ]);
        $result = $this->slider->insert($request);
        
        if($result){
            return redirect('/admin/sliders/index');
        }
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
        if(Auth::user()->user_type == 'AD'){
            return view('admin.sliders.edit', [
                'title' => 'Cập nhật slider',
                'slider' => $slider
            ]);
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'image' => 'nullable|required|image|mimes:png,jpg,jpeg|max:2048',
            'sort_by' => 'required'
        ]);
        $result = $this->slider->update($request, $slider);
        if($result){
            return redirect('/admin/sliders/index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if(Auth::user()->user_type == 'AD'){
            $result = $this->slider->destroy($request);
            if($result){
                return redirect('/admin/sliders/index');
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
}
