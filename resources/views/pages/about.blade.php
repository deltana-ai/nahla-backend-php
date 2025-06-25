<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عن نحلة</title>

    {{-- الروابط --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/join-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/about/about.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/about/abouttow.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/about/aboutthree.css') }}">

    {{-- أيقونات --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>

    {{-- الهيدر --}}
    <header id="header"></header>

    <main>
        {{-- القسم الأول --}}
        <section class="store-section">
            <div class="container">
                <div class="content-wrapper">
                    <div class="image-box">
                        <img src="{{ asset('assets/images/aboutone.jpg') }}" alt="صورة 1" class="top-image">
                        <img src="{{ asset('assets/images/abouttow.jpg') }}" alt="صورة 2" class="bottom-image">
                    </div>
                    <div class="text-content">
                        <h1><span>نحلة</span> لإنشاء المتاجر الإلكترونية</h1>
                        <p>
                            شركة تعمل بكوادر كفوءة وبأحدث التقنيات الحديثة في العالم، تأسست في عام 2012 وتختص بتجهيز
                            وتركيب كاميرات المراقبة وأجهزة تعقب السيارات GPS وأنظمة الاتصالات الداخلية (بدالات) وبرمجة
                            تطبيقات الجوال وتصميم المواقع وأنظمة تسجيل الحضور اليومي. <span
                                class="more-dots">......</span>
                        </p>
                        <button class="cta-btn" onclick="window.location.href='/massage'">أنشئ متجرك الآن</button>
                    </div>
                </div>
            </div>
        </section>

        {{-- قسم الجودة --}}
        <header class="main-header">
            <div class="container">
                <div class="header-content">
                    <div class="header-text">
                        <h1>جودة عالية</h1>
                        <p class="subtitle">لدينا الحل الأفضل لعملك</p>
                    </div>
                </div>
            </div>
        </header>

        <section class="features-section">
            <div class="container">
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>إجراءات أمنية مشددة للحماية من القرصنة</h3>
                        <p>لحماية موقعك من التهديدات الإلكترونية، نوفر أفضل الحلول الأمنية الحديثة.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3>أداء عالي الجودة</h3>
                        <p>نحن نضمن سرعة تحميل واستقرار ممتاز لجميع مواقع عملائنا.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>دعم العملاء بدوام كامل - 24/7</h3>
                        <p>فريق الدعم متواجد دائمًا لمساعدتك والرد على استفساراتك في أي وقت.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- قسم الهدف --}}
        <div class="business-growth">
            <div class="content-block">
                <div class="text-side">
                    <span class="our-goal">هدفنا</span>
                    <h1>الارتقاء بأعمالك إلى المستوى التالي</h1>
                    <p class="description-text">
                        إنشاء متجر إلكتروني يساعدك على الوصول لعملاء من جميع أنحاء العالم، ويزيد فرص مبيعاتك.
                    </p>
                </div>
                <div class="visual-side">
                    <img src="{{ asset('assets/images/aboutthree.jpg') }}" alt="نمو الأعمال">
                </div>
            </div>
        </div>

        {{-- قسم الرؤية --}}
        <div class="section-growth">
            <div class="block-layout">
                <div class="image-side">
                    <img src="{{ asset('assets/images/aboutthree.jpg') }}" alt="نمو الأعمال">
                </div>
                <div class="info-side">
                    <span class="section-label">رؤيتنا</span>
                    <h2>تقديم الحلول للشركات المتنامية</h2>
                    <p class="section-description">
                        نمنح الشركات أدوات رقمية حديثة لزيادة انتشارها وتحقيق أهدافها التجارية.
                    </p>
                </div>
            </div>
        </div>

        {{-- قسم الانضمام --}}
        <section class="join-section">
            <div class="container" id="joinSection"></div>
        </section>
    </main>

    {{-- الفوتر --}}
    <footer id="footer"></footer>

    {{-- سكريبتات --}}
    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/footer.js') }}"></script>
    <script src="{{ asset('assets/js/join-section.js') }}"></script>
    <script>
        window.isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
    </script>
</body>

</html>
