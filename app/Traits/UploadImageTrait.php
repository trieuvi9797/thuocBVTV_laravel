<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadImageTrait
{
    public function UploadImageTrait($request, $fileName)   
    {
        if($request->hasFile($fileName)){
            try {
                $name = $request->file($fileName)->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d");
                $request->file($fileName)->storeAs('public/' . $pathFull , $name);
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
            $file = $request->$fieldName;
            $fileName = $file->getClientOriginalName();
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileName);
            return Storage::url($filePath);
        }
        return null;
    }
}
