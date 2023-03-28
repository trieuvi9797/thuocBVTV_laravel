<?php
namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

trait UploadImageTrait
{ 
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
