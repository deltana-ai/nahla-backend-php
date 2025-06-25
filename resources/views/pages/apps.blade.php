<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apps</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/apps/apps.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/apps/features.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/products-container.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/prodects.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/apps/app-custom-section.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>

    <div id="header"></div>

    <main>
        <!-- app Section -->
        <section class="app-section">
            <div class="app-container">
                <div class="app-content">
                    <h1 class="app-title">زيادة مبيعاتك بفضل التطبيقات المبتكرة</h1>
                    <div class="app-text">
                        <p>
                            في عالم التجارة الإلكترونية المتسارع، أصبحت التطبيقات أداة أساسية لتميز متجرك الإلكتروني
                            وزيادة نجاحه...
                        </p>
                    </div>
                    <button class="app-btn">
                        انشئ تطبيقك الان
                        <i class="fas fa-arrow-left"></i>
                    </button>
                </div>
                <div class="app-image">
                    <div class="image-placeholder">
                        <img src="{{ asset('assets/images/apps.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- End app Section -->

        <section class="apps-features-section">
            <div class="apps-features-header">
                <span>تطبيق</span>
                <h1>مميزات تصميم التطبيق مع متجرك</h1>
            </div>
            <div class="apps-features-container">
                <div class="apps-features-content">
                    <div class="apps-feature-item">
                        <div class="apps-feature-header">
                            <div class="apps-check-circle">
                                <i class="fas fa-check"></i>
                            </div>
                            <h3>تحسين تجربة المستخدم مع التطبيقات المتنقلة</h3>
                        </div>
                        <p>تعرف على كيف يمكن للتطبيقات أن توفر تجربة مستخدم سلسة ومريحة...</p>
                    </div>

                    <div class="apps-feature-item">
                        <div class="apps-feature-header">
                            <div class="apps-check-circle">
                                <i class="fas fa-check"></i>
                            </div>
                            <h3>زيادة التفاعل والولاء عبر الإشعارات الفورية</h3>
                        </div>
                        <p>تساهم الإشعارات الفورية في إبقاء عملائك على اطلاع دائم...</p>
                    </div>

                    <div class="apps-feature-item">
                        <div class="apps-feature-header">
                            <div class="apps-check-circle">
                                <i class="fas fa-check"></i>
                            </div>
                            <h3>تعزيز المبيعات من خلال تجربة تسوق مخصصة</h3>
                        </div>
                        <p>توفر تجربة تسوق مخصصة تتناسب مع تفضيلات كل عميل...</p>
                    </div>
                </div>

                <div class="apps-features-image">
                    <div class="apps-image-wrapper">
                        <img src="{{ asset('assets/images/features.png') }}" alt="ميزات التطبيق">
                    </div>
                </div>
            </div>

            <section class="app-custom-section">
                <div class="app-section-container">
                    <div class="app-content-container">
                        <h2 class="app-section-title">اكتشف أهمية التطبيقات لمتجرك الإلكتروني</h2>
                        <p class="app-section-description">
                            في هذا الفيديو، سنستعرض كيف يمكن للتطبيقات أن تحدث فرقًا كبيرًا في نجاح متجرك الإلكتروني...
                        </p>
                        <button class="app-submit-btn">اطلب التطبيق الآن</button>
                    </div>

                    <div class="app-images-container">
                        <div class="app-image-wrapper">
                            <div class="app-video-container">
                                <img src="{{ asset('assets/images/viplast.jpg') }}" alt="تطبيق المتجر الإلكتروني"
                                    class="app-main-image">
                                <div class="app-play-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <img src="{{ asset('assets/images/blob-haikei (3).svg') }}" alt="خلفية التطبيق"
                                class="app-small-image">
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

    <div id="footer"></div>

    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/footer.js') }}"></script>
    <script src="{{ asset('assets/js/products-container.js') }}"></script>
    <script>
        window.isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
    </script>
</body>

</html>
