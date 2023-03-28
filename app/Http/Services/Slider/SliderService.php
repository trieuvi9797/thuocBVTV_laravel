<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
    public function insert($request)
    {
        try {
            // Slider::create($request->input());

            DB::beginTransaction();
            if ($request->hasFile('image')) 
                $img = $this->StorageTraitUpload($request, 'image', 'slider');
            $slider = $this->slider->create([
                'name' => trim($request->name),
                'url' => $request->url,
                'image' => $img,
                'sort_by' => $request->sort_by,
            ]);
            dd($slider);
            DB::commit();



            Session::flash('success', 'Thêm slider thành công.');
        } catch (\Exception  $err) {
            Session::flash('success', 'Thêm slider không thành công.');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

}