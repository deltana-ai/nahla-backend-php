<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل دخول</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/login/login.css') }}" />
</head>

<body>
    <div class="container">
        <div class="image-section">
            <img src="{{ asset('assets/images/login.png') }}" alt="biometric login" />
        </div>
        <div class="login-section">
            <h2>تسجيل دخول</h2>
            <p>مرحباً بعودتك! الرجاء إدخال التفاصيل الخاصة بك</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <input type="text" name="login" placeholder="رقم الهاتف أو البريد الإلكتروني" required />
                <input type="password" name="password" placeholder="أدخل كلمة المرور هنا" required />
                <button type="submit">تسجيل دخول</button>
                <div class="divider">
                    <span>أو</span>
                </div>
                <a href="{{ route('google.login') }}" class="google-login">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" />
                    تسجيل الدخول باستخدام Google
                </a>

                <p class="signup-link">ليس لديك حساب؟ <a href="{{ route('register.form') }}">إنشاء حساب</a></p>
            </form>
        </div>
    </div>
</body>

</html>
