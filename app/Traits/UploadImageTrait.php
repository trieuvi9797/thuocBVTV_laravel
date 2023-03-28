<?php
namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Str;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

trait UploadImageTrait
{ 
    public function StorageTraitUpload($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {  
            $ext = $request->file($fieldName)->extension();
            $fileName =time(). '.' . $ext;
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName  . '/' .  $fileName);
           return Storage::url($filePath);
        }
        return null;
    }
}
