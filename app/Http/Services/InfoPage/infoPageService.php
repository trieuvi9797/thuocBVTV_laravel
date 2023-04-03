<?php

namespace App\Http\Services\InfoPage;

use App\Models\InfoPage;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InfoPageService
{
    use UploadImageTrait;

    protected $infoPage;

    public function __construct(InfoPage $infoPage)
    {
        $this->infoPage = $infoPage;
    }

    public function get()
    {
        return InfoPage::orderByDesc('id')->paginate(10);
    }
    public function show()
    {
        return InfoPage::orderByDesc('id')->limit(1)->get();
    }
    
    public function update($request, $infoPage)
    {
        try {
            $fileImage = InfoPage::where('id', $request->input('id'))->first();
        if($fileImage){
            Storage::disk('public')->delete('/storage/slider'.$fileImage['logo']);
            InfoPage::where('id', $infoPage)->delete();

        }
            $infoPage->fill($request->input());
            $infoPage->save();  

            $infoPage->phone = $request->phone;
            $infoPage->address = $request->address;

            if($request->hasFile('logo')){
                $img = $this->StorageTraitUpload($request, 'logo', 'infoPage');
            }
            $infoPage->logo = $img;
            $infoPage->email = $request->email;
            $infoPage->contentFirst = $request->contentFirst;
            $infoPage->facebook = $request->facebook;
            $infoPage->instagram = $request->instagram;
            $infoPage->twitter = $request->twitter;
            $infoPage->telegram = $request->telegram;
    
            $infoPage->save();

            Session::flash('success', 'Thêm thông tin trang thành công.');
        } catch (\Exception  $err) {
            Session::flash('success', 'Thêm thông tin trang không thành công.');
            Log::info($err->getMessage());
            return false;
        }
        return true;
        
    }

    public function destroy($request)
    {
        $infoPage = InfoPage::where('id', $request->input('id'))->first();
        if($infoPage){
            $path = str_replace('storage', 'infoPage', $infoPage->logo);
            Storage::delete($path);
            $infoPage->delete();
            return true;
        }
        return false;
    }
}