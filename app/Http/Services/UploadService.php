<?php
namespace App\Http\Services;

use Exception;

class UploadService{
    public function store($request)
    {
        if($request->hasFile('file')){
            try {
                $name = $request->file('file')->getClientOrginalName();
                $pathFull = 'uploads/' . date("Y/m/d");
                $request->file('file')->storeAs(
                    'public/'. $pathFull, $name
                );
                return '/storage/' . $pathFull . '/' . $name;
            } catch (Exception $error) {
                return false;
            }
        }
    }
}