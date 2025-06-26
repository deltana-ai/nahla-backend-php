<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Order;
use App\Models\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show($webId)
    {
        $web = Web::findOrFail($webId);

        // جيب التطبيقات اللي من نفس التصنيف
        $apps = App::where('category_id', $web->category_id)->get();

        return view('pages.cart', compact('web', 'apps'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'nullable',
            'app_id' => 'nullable',
            'web_id' => 'nullable|exists:webs,id', // ✅ لو عندك جدول اسمه webs
            'subscription_years' => 'nullable|integer',
            'subscription_price' => 'nullable',
            'total_price' => 'nullable',
            'transfer_number' => 'nullable|string',
            'receipt' => 'nullable|image|max:2048',
        ]);


        $receiptPath = null;
        if ($request->hasFile('receipt')) {
            $receiptPath = $request->file('receipt')->store('receipts', 'public');
        }
        Order::create([
            'user_id' => Auth::id(),
            'web_id' => $request->web_id, // ✅ أضف السطر ده
            'plan_id' => $request->plan_id,
            'app_id' => is_numeric($request->app_id) ? (int) $request->app_id : null,
            'subscription_years' => $request->subscription_years,
            'subscription_price' => $request->subscription_price,
            'total_price' => $request->total_price,
            'transfer_number' => $request->transfer_number,
            'receipt' => $receiptPath,
        ]);


        return response()->json(['success' => true]);
    }
}
