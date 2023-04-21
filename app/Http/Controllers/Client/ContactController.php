<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\InfoPage\InfoPageService;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    protected $infoPage;
    public function __construct(InfoPageService $infoPage)
    {
        $this->infoPage = $infoPage;
    }
    public function index()
    {
        $infoPage = $this->infoPage->show();
        return view('client.contact.index', [
            'title' => 'Liên hệ',
            'infoPages' => $infoPage
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = $data['updated_at'] = Carbon::now();
        Contact::insert($data);
        return redirect()->back()->with('success', 'Đã gửi thông tin tư vấn thành công!');
    }
}
