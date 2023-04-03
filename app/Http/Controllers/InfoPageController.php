<?php

namespace App\Http\Controllers;

use App\Http\Services\InfoPage\InfoPageService;
use App\Models\InfoPage;
use Illuminate\Http\Request;

class InfoPageController extends Controller
{
    protected $infoPage;

    public function __construct(InfoPageService $infoPage)
    {
        $this->infoPage = $infoPage;
    }

    public function index()
    {
        return view('admin.infoPages.index', [
            'title' => 'Thông tin trang',
            'infoPage' => $this->infoPage->get()
        ]);
    }
    public function edit(InfoPage $infoPage)
    {
        return view('admin.infoPages.edit', [
            'title' => 'Cập nhật slider',
            'infoPage' => $infoPage
        ]);
    }
    public function update(Request $request, InfoPage $infoPage)
    {
        $this->validate($request, [
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'phone' => 'nullable',
            'address' => 'nullable',
            'email' => 'nullable',
            'contentFirst' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'telegram' => 'nullable',
        ]);

        $result = $this->infoPage->update($request, $infoPage);
        if($result){
            return redirect('/admin/infoPages/index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(InfoPage $infoPage)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InfoPage $infoPage)
    {
        //
    }
}
