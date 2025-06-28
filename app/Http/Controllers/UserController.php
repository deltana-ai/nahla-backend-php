<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showForm()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users',
            'phone' => 'required|string|unique:users',
            'company_name' => 'required|string',
            'store_address' => 'required|string',
            'store_domain' => 'required|string',
            'alt_email' => 'nullable|email',
            'store_language' => 'required|string',
            'store_description' => 'nullable|string',
            'password' => 'required|string|min:6',
        ]);

        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->back()->with('success', 'تم إنشاء الحساب بنجاح');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('phone', $credentials['login'])
            ->orWhere('email', $credentials['login'])
            ->first();


        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['phone' => 'بيانات الدخول غير صحيحة'])->withInput();
        }

        Auth::login($user);

        return redirect()->route('home')->with('success', 'تم تسجيل الدخول بنجاح');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }



    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'alt_email' => 'nullable|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'store_language' => 'nullable|string|max:50',
            'store_address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6|confirmed', // تأكيد كلمة المرور
        ]);

        $data = $request->only([
            'name',
            'email',
            'alt_email',
            'company_name',
            'phone',
            'store_language',
            'store_address',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'تم تحديث المعلومات بنجاح.');
    }
}
