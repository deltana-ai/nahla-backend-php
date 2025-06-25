<?php

namespace App\Http\Controllers;

use App\Models\VipRequest;
use Illuminate\Http\Request;

class VipRequestController extends Controller
{
    public function index()
    {
        return view('pages.vip'); // تأكد إن اسم الملف resources/views/vip.blade.php
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ideas' => 'required|string',
            'phone' => 'required|string',
        ]);

        VipRequest::create($data);

        return redirect()->back()->with('success', 'تم إرسال البيانات بنجاح');
    }
}
