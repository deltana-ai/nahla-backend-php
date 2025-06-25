<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pricing-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/join-section.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>

    <div id="header"></div>

    <main>
        <!-- قسم العروض الترويجية -->
        <section class="pricing-section">
            <h2 class="section-title">أسعار الباقات التي تناسبك</h2>
            <p class="section-subtitle">تتضمن كل باقة مجموعة من المميزات الفريدة لتلبية احتياجات متنوعة للعملاء</p>
            <div class="plans" id="plans-container">
                <!-- الباقة الأولى -->
                <div class="plan">
                    <div class="label">عادي</div>
                    <h3>الباقة الأساسية</h3>
                    <div class="price">99 ر.س <span>/ شهرياً</span></div>
                    <div class="yearly">900 ر.س / سنوياً</div>
                    <ul class="features">
                        <li>منتجات غير محدودة</li>
                        <li>دعم فني على مدار الساعة</li>
                        <li class="disabled">تطبيق مخصص</li>
                        <li class="disabled">لوحة تحكم متقدمة</li>
                    </ul>
                    <a href="#" class="btn">ابدأ الآن</a>
                </div>

                <!-- الباقة الثانية (أفضل خيار) -->
                <div class="plan best">
                    <div class="label">الأفضل</div>
                    <h3>الباقة الاحترافية</h3>
                    <div class="price">199 ر.س <span>/ شهرياً</span></div>
                    <div class="yearly">1,800 ر.س / سنوياً</div>
                    <ul class="features">
                        <li>منتجات غير محدودة</li>
                        <li>دعم فني على مدار الساعة</li>
                        <li>تطبيق مخصص</li>
                        <li>لوحة تحكم متقدمة</li>
                    </ul>
                    <a href="#" class="btn">ابدأ الآن</a>
                </div>

                <!-- الباقة الثالثة -->
                <div class="plan">
                    <div class="label">مميز</div>
                    <h3>الباقة المتقدمة</h3>
                    <div class="price">149 ر.س <span>/ شهرياً</span></div>
                    <div class="yearly">1,400 ر.س / سنوياً</div>
                    <ul class="features">
                        <li>منتجات غير محدودة</li>
                        <li>دعم فني على مدار الساعة</li>
                        <li>تطبيق مخصص</li>
                        <li class="disabled">لوحة تحكم متقدمة</li>
                    </ul>
                    <a href="#" class="btn">ابدأ الآن</a>
                </div>
            </div>

        </section>
        <!-- قسم العروض الترويجية -->


        <!-- قسم الانضمام إلى المتجر -->
        <section class="join-section">
            <div class="container" id="joinSection"></div>
        </section>

        <!-- قسم الانضمام إلى المتجر -->

    </main>


    <div id="footer"></div>
    <!-- تحميل الهيدر من ملف JS -->
    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/footer.js') }}"></script>
    <script src="{{ asset('assets/js/pricing-section.js') }}"></script>
    <script src="{{ asset('assets/js/join-section.js') }}"></script>
    <script>
        window.isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
    </script>

</body>

</html>
