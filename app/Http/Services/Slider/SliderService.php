<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderService
{
    use UploadImageTrait;

    protected $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function get()
    {
        return Slider::orderByDesc('id')->paginate(10);
    }
    public function show()
    {
        return Slider::orderByDesc('id')->limit(1)->get();
    }
    public function insert($request)
    {
        try {
            $slider = new Slider();
            $slider->name = $request->name;
            $slider->url = $request->url;
            if($request->hasFile('image')){
                $img = $this->StorageTraitUpload($request, 'image', 'slider');
            }
            $slider->image = $img;
            $slider->sort_by = $request->sort_by;
    
            $slider->save();

            Session::flash('success', 'Thêm slider thành công.');
        } catch (\Exception  $err) {
            Session::flash('success', 'Thêm slider không thành công.');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }
    
    public function update($request, $slider)
    {
        try {
            $fileImage = Slider::where('id', $request->input('id'))->first();
        if($fileImage){
            Storage::disk('public')->delete('/storage/slider'.$fileImage['image']);
            Slider::where('id', $slider)->delete();

        }
            $slider->fill($request->input());
            $slider->save();  
            // $slider = new Slider();
            $slider->name = $request->name;
            $slider->url = $request->url;
            if($request->hasFile('image')){
                $img = $this->StorageTraitUpload($request, 'image', 'slider');
            }
            $slider->image = $img;
            $slider->sort_by = $request->sort_by;
    
            $slider->save();

            Session::flash('success', 'Thêm slider thành công.');
        } catch (\Exception  $err) {
            Session::flash('success', 'Thêm slider không thành công.');
            Log::info($err->getMessage());
            return false;
        }
        return true;
        
    }

    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if($slider){
            $path = str_replace('storage', 'slider', $slider->image);
            Storage::delete($path);
            $slider->delete();
            return true;
        }
        return false;
    }
}