<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\VipRequest;
use App\Models\Web;
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

    public function show($web_id)
    {
        $web = Web::findOrFail($web_id); // الموقع اللي هيشتريه
        $plans = Plan::all(); // كل الباقات المتاحة

        return view('cart.show', compact('web', 'plans'));
    }
}
