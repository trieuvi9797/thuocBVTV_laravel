<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::orderByDesc('id')->paginate(10);
        return view('admin.contacts.index',[
            'title' => 'Liên hệ của khách hàng',
            'contacts' => $contact
        ]);
    }
}
