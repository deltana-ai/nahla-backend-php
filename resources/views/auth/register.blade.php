<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>إنشاء حساب</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/login/register.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="signup-container">
        <!-- Indicators -->
        <div class="step-indicator">
            <button class="step active" onclick="showStep(1)" type="button">
                <span class="circle">1</span>
                <span class="label">بيانات الشخصية</span>
            </button>
            <button class="step" onclick="showStep(2)" type="button">
                <span class="circle">2</span>
                <span class="label">بيانات المتجر</span>
            </button>
            <button class="step" onclick="showStep(3)" type="button">
                <span class="circle">3</span>
                <span class="label">وصف المتجر</span>
            </button>
        </div>

        <!-- Form (واحد فقط) -->
        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="form-wrapper">
                <!-- Step 1 -->
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
                <div id="step1" class="form-content">
                    <h2>إنشاء حساب</h2>

                    <p>مرحباً بعودتك! الرجاء إدخال التفاصيل الخاصة بك</p>
                    <input type="text" name="name" placeholder="ادخل الاسم هنا" required />
                    <input type="email" name="email" placeholder="ادخل البريد الالكتروني هنا" required />
                    <input type="text" name="phone" placeholder="ادخل رقم الهاتف هنا" required />
                    <input type="password" name="password" placeholder="ادخل كلمة المرور" required />

                    <button type="button" onclick="showStep(2)" class="next-btn">التالي</button>
                </div>

                <!-- Step 2 -->
                <div id="step2" class="form-content hidden">
                    <h2>بيانات المتجر</h2>
                    <p>الرجاء إدخال بيانات متجرك لإكمال إنشاء حسابك</p>

                    <input type="text" name="company_name" placeholder="اختر اسم المنشأة هنا" required />
                    <input type="text" name="store_address" placeholder="ادخل عنوانك هنا" required />
                    <input type="text" name="store_domain" placeholder="ادخل دومين المتجر هنا" required />
                    <button type="button" onclick="showStep(3)" class="next-btn">التالي</button>
                </div>

                <!-- Step 3 -->
                <div id="step3" class="form-content hidden">

                    <h2>وصف المتجر</h2>
                    <p>اكتب وصفًا واضحًا لمتجرك</p>
                    <input type="text" name="alt_email" placeholder="ادخل بريد إضافي" />
                    <select name="store_language" required>
                        <option disabled selected>اختر اللغة</option>
                        <option value="العربية">العربية</option>
                        <option value="الإنجليزية">الإنجليزية</option>
                    </select>
                    <textarea name="store_description" rows="5" placeholder="اكتب وصف المتجر هنا..."></textarea>
                    <button type="submit" class="next-btn">إنهاء</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function prepareForm() {
            // فك إخفاء جميع الخطوات
            document.querySelectorAll(".form-content").forEach(f => {
                f.classList.remove("hidden");
            });

            // تأكد أن كل الحقول المطلوبة مفعّلة
            document.querySelectorAll("input, select, textarea").forEach(el => {
                el.removeAttribute("disabled");
            });
        }

        function showStep(step) {
            document.querySelectorAll(".form-content").forEach(f => {
                f.classList.add("hidden");

                f.querySelectorAll("[required]").forEach(input => {
                    input.setAttribute("data-required", "true");
                    input.removeAttribute("required");
                });
            });

            const current = document.getElementById("step" + step);
            current.classList.remove("hidden");

            current.querySelectorAll("[data-required]").forEach(input => {
                input.setAttribute("required", "required");
                input.removeAttribute("data-required");
            });

            document.querySelectorAll(".step").forEach(btn => btn.classList.remove("active"));
            document.querySelectorAll(".step")[step - 1].classList.add("active");
        }
    </script>

</body>

</html>
