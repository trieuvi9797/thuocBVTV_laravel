<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create(){
        return view('admin.menu.add', [
            'title' => 'Thêm danh mục Mới',
            // 'menus' => $this->menuService->getParent()  
        ]);
    }
    public function index(){
        return view('admin.menu.list', [
            'title' => 'Danh mục sản phẩm',
        ]);
    }
}
