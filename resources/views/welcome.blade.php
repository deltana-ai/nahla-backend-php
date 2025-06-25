<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>الرئيسية</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/features.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/prodects.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/products-container.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/section-promo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pricing-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/join-section.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

</head>

<body>
    <div id="header"></div>

    <!-- محتوى الصفحة -->
    <main>


        <!-- قسم البطل -->
        <section class="hero">
            <img class="hero-bg" src="{{ asset('assets/images/Vector.png') }}" alt="خلفية" />

            <div class="hero-content">
                <h1>ابدأ رحلتك في التجارة الإلكترونية بخطوات بسيطة مع سوق دلتانا</h1>
                <p>

                    من اختيار التصميم المناسب إلى إطلاق متجرك، نقدم لك دليلًا خطوة بخطوة لتبدأ رحلتك في عالم التجارة
                    الإلكترونية بسهولة وسرعة</p> <a href="/massage" class="btn">أنشئ متجرك الآن</a>
            </div>

            <div class="hero-image">
                <img src="{{ asset('assets/images/desk.png') }}" alt="صورة رئيسية" />
            </div>
        </section>


        <!-- قسم البطل -->

        <!-- قسم لماذا نحله -->

        <section class="why-nahla">
            <div class="container">
                <span class="section-badge">لماذا نحله</span>
                <p class="section-intro">مميزات إنشاء متجرك الإلكتروني مع نحله</p>

                <div class="features-cards">
                    <!-- الكارت الأول -->
                    <div class="feature-card">
                        <img src="{{ asset('assets/images/tows.png') }}" alt="طرق دفع متعددة" class="feature-img">
                        <h1 class="feature-title">طرق دفع متعددة وآمنة</h1>
                        <p class="feature-desc">
                            تقديم خيارات دفع متنوعة وآمنة يزيد من راحة العملاء وثقتهم في الموقع،
                            مما يعزز من احتمالية إتمام عمليات الشراء
                        </p>
                    </div>

                    <!-- الكارت الثاني -->
                    <div class="feature-card">
                        <img src="{{ asset('assets/images/7475603-removebg-preview.png') }}" alt="واجهة سهلة"
                            class="feature-img">
                        <h1 class="feature-title">واجهة سهلة الاستخدام</h1>
                        <p class="feature-desc">
                            تصميم بسيط وسهل التصفح يجعل الزوار يتكثفون لفترة أطول ويتفاعلون بشكل أكبر مع الموقع،
                            مما يزيد من معدلات التحويل والمبيعات
                        </p>
                    </div>

                    <!-- الكارت الثالث -->
                    <div class="feature-card">
                        <img src="{{ asset('assets/images/travel-booking-app-concept.png') }}" alt="تصميم متجاوب"
                            class="feature-img">
                        <h1 class="feature-title">تصميم متجاوب</h1>
                        <p class="feature-desc">
                            يضمن أن الموقع يعمل بشكل ممتاز على جميع الأجهزة (الهواتف الذكية، الأجهزة اللوحية،
                            الكمبيوترات)،
                            مما يزيد من عدد الزوار ويعزز تجربة المستخدم
                        </p>
                    </div>
                    <!-- الكارت الرابع -->
                    <div class="feature-card">
                        <img src="{{ asset('assets/images/icon.png') }}" alt="تصميم متجاوب" class="feature-img">
                        <h1 class="feature-title"> نظام إدارة محتوى</h1>
                        <p class="feature-desc">
                            يسهل إضافة وتعديل المنتجات وإدارة الصفحات والمحتوى، مما يوفر وقت وجهد أصحاب المتاجر ويسمح
                            لهم بالتركيز على تحسين الأعمال وتنميتها
                        </p>
                    </div>
                    <!-- الكارت الخامس -->
                    <div class="feature-card">
                        <img src="{{ asset('assets/images/icon1.png') }}" alt="تصميم متجاوب" class="feature-img">
                        <h1 class="feature-title"> نظام أمان قوي</h1>
                        <p class="feature-desc">
                            توفير نظام أمان متقدم يحمي بيانات العملاء والمعاملات من التهديدات السيبرانية والاختراقات
                        </p>
                    </div>
                    <!-- الكارت السادس -->
                    <div class="feature-card">
                        <img src="{{ asset('assets/images/icon3.jpg') }}" alt="تصميم متجاوب" class="feature-img">
                        <h1 class="feature-title"> تحليلات وتقارير متقدمة</h1>
                        <p class="feature-desc">
                            توفر التحليلات المدمجة تقارير دورية تساعد أصحاب المتاجر في اتخاذ قرارات مدروسة لتحسين الأداء
                            وزيادة المبيعات.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- قسم لماذا نحله -->

        <!-- قسم المنتجات -->
        <section class="prodects">
            <div class="template-section">
                <h2>متجرك الإلكتروني جاهز للعمل في دقائق</h2>
                <p>نقدم لك مجموعة من القوالب المصممة خصيصًا لتلبية احتياجاتك في إنشاء متجرك الإلكتروني</p>

                <div class="filter-buttons">
                    <button class="filter-btn " data-category="all">الكل</button>
                    <button class="filter-btn active" data-category="مطاعم">مطاعم</button>
                    <button class="filter-btn" data-category="ملابس">ملابس</button>
                    <button class="filter-btn" data-category="مطاعم">مطاعم</button>
                    <button class="filter-btn" data-category="ملابس">ملابس</button>
                    <button class="filter-btn" data-category="مطاعم">مطاعم</button>
                    <button class="filter-btn" data-category="ملابس">ملابس</button>
                    <button class="filter-btn" data-category="مطاعم">مطاعم</button>
                    <button class="filter-btn" data-category="ملابس">ملابس</button>
                    <button class="filter-btn" data-category="مطاعم">مطاعم</button>
                    <button class="filter-btn" data-category="ملابس">ملابس</button>
                </div>

                <div id="template-container" class="template-container"></div>
            </div>
        </section>
        <!-- قسم المنتجات -->




        <!-- قسم كيفية إنشاء متجرك الإلكتروني -->
        <div class="split-layout">
            <!-- نص في اليسار الآن -->
            <div class="text-block">
                <h2 class="text-title">كيفية إنشاء متجرك الإلكتروني</h2>
                <p class="text-description">
                    متجرك الإلكتروني، من البداية وحتى الوصول إلى النجاح في عالم التجارة الإلكترونية خطوة بخطوة.
                    سنرشدك خلال العملية بالكامل من اختيار المنصة المناسبة وتصميم المتجر إلى إضافة المنتجات وإدارة
                    المبيعات بكفاءة.
                </p>
                <a href="/massage" class="text-button">أنشئ متجرك الآن</a>
            </div>

            <!-- الصورة في الوسط -->
            <div class="image-block">
                <img src="{{ asset('assets/images/image.png') }}" alt="متجر إلكتروني" class="overlap-image">
                <a href="#" class="play-button" aria-label="تشغيل الفيديو">
                    <svg viewBox="0 0 100 100" class="play-icon">
                        <circle cx="50" cy="50" r="48" fill="rgba(0, 0, 0, 0.6)">
                            <polygon points="40,30 70,50 40,70" fill="#fff">
                    </svg>
                </a>
            </div>


            <!-- لون فقط -->
            <div class="color-block"></div>
        </div>
        <!-- قسم كيفية إنشاء متجرك الإلكتروني -->
        @php
            use App\Models\Plan;

            $plans = Plan::orderByRaw("FIELD(label, 'مميز', 'الأفضل', 'عادي')")->get();
        @endphp



        <!-- قسم العروض الترويجية -->
        <section class="pricing-section">
            <h2 class="section-title">أسعار الباقات التي تناسبك</h2>
            <p class="section-subtitle">تتضمن كل باقة مجموعة من المميزات الفريدة لتلبية احتياجات متنوعة للعملاء</p>

            <div class="plans" id="plans-container">
                @foreach ($plans as $plan)
                    @php
                        // إضافة كلاس حسب نوع الباقة
                        $planClass =
                            $plan->label === 'الأفضل'
                                ? 'plan best'
                                : ($plan->label === 'مميز'
                                    ? 'plan' // لو عندك class خاص بخليها مثلاً 'plan featured'
                                    : 'plan');
                    @endphp

                    <div class="{{ $planClass }}">
                        <div class="label">{{ $plan->label }}</div>
                        <h3>{{ $plan->title }}</h3>
                        <div class="price">{{ $plan->monthly_price }} ر.س <span>/ شهرياً</span></div>
                        <div class="yearly">{{ $plan->yearly_price }} ر.س / سنوياً</div>

                        <ul class="features">
                            @foreach ($plan->features as $feature)
                                @php
                                    // لو القيمة Boolean أو array فيها enabled = false
                                    $isDisabled = is_array($feature)
                                        ? isset($feature['enabled']) && !$feature['enabled']
                                        : str_starts_with($feature, 'x:'); // لو بتستخدم "x:تطبيق مخصص" معناها disabled
                                    $text = is_array($feature)
                                        ? $feature['text'] ?? ''
                                        : (str_starts_with($feature, 'x:')
                                            ? Str::after($feature, 'x:')
                                            : $feature);
                                @endphp

                                <li class="{{ $isDisabled ? 'disabled' : '' }}">{{ $text }}</li>
                            @endforeach
                        </ul>

                        <a href="/massage" class="btn">ابدأ الآن</a>
                    </div>
                @endforeach
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
    <script src="{{ asset('assets/js/product.js') }}"></script>
    <script src="{{ asset('assets/js/join-section.js') }}"></script>
    <script src="{{ asset('assets/js/pricing-section.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" defer></script>
    <script>
        window.isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
    </script>

</body>

</html>
