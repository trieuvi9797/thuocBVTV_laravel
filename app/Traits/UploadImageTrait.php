<?php
namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

trait UploadImageTrait
{
    public function UploadImageTrait($request, $fileName)   
    {
        if($request->hasFile($fileName)){
            try {
                $img = $request->$fileName;
                $name = $request->$img->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d");
                $request->file($fileName)->storeAs('public/' . $pathFull , $name);
                Image::make($request->file($fileName))->storeAs('public/' . $pathFull , $name);
                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
        return null;
    } 
    public function StorageTraitUpload($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $fileName = $file->getClientOriginalName();
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileName);
            return Storage::url($filePath);
        }
        return null;
    }
}
