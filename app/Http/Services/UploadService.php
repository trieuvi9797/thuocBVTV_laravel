<?php
namespace App\Http\Services;

use App\Models\Image;
use Exception;
use PhpParser\Node\Stmt\Catch_;

class UploadService{

    protected $path = 'uploads/';

    public function store($request)
    {
        if ($request->hasFile('image')) {
            try {
                $name = $request->file('image')->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d");
                $request->file('image')->storeAs('public/' . $pathFull , $name);
                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
    }
}