<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectionToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $findUser = User::where('social_id', $user->id)->first();
        if ($findUser) {
            auth()->login($findUser);
            return redirect()->route('home')->with('success', 'تم تسجيل الدخول بنجاح');
        } else {
            // تحقق إذا كان هناك مستخدم بنفس البريد الإلكتروني
            $existingUser = User::where('email', $user->email)->first();
            if ($existingUser) {
                // إذا كان موجود، حدث بيانات السوشيال فقط وسجل دخوله
                $existingUser->update([
                    'social_id' => $user->id,
                    'social_type' => 'google',
                ]);
                $newUser = $existingUser;
            } else {
                // إذا لم يكن موجود، أنشئ مستخدم جديد
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',
                    'password' => Hash::make('google'),
                ]);
            }
            auth()->login($newUser);
            return redirect()->route('home')->with('success', 'تم إنشاء الحساب وتسجيل الدخول
            بنجاح');
        }
    }
}
