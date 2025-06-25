<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vip</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vip/vip-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vip/features.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vip/lastsection.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div id="header"></div>

    <main>
        <!-- VIP Section -->
        <section class="vip-section">
            <div class="vip-container">
                <div class="vip-content">
                    <h1 class="vip-title">كن عميل <span style="color: #8174A0;">VIP</span> وتميز بتصميمك الخاص</h1>
                    <div class="vip-text">
                        <p>انضم إلى صفوف عملائنا VIP وتمتع بترقية فريدة من نوعها في تصميم المواقع الإلكترونية...</p>
                        <p>استمتع بخدمات دعم مميزة على مدار الساعة...</p>
                    </div>
                    <a href="/massage" style="text-decoration: none" class="vip-btn w-25">
                        اشترك
                        <i class="fas fa-arrow-left"></i>
                    </a>

                </div>
                <div class="vip-image">
                    <div class="image-placeholder">
                        <img src="{{ asset('assets/images/02_img_11.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section">
            <div class="features-header">
                <span>خدمة VIP</span>
                <h1>تصميم موقع مخصص بكل دقة</h1>
            </div>
            <div class="features-container">
                <div class="features-content">
                    <div class="feature-item">
                        <div class="feature-header">
                            <div class="check-circle"><i class="fas fa-check"></i></div>
                            <h3>تقارير تحليلية دورية</h3>
                        </div>
                        <p>تمتع بتقارير دورية متقدمة توفر لك رؤى دقيقة حول أداء موقعك...</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-header">
                            <div class="check-circle"><i class="fas fa-check"></i></div>
                            <h3>دعم فني متواصل</h3>
                        </div>
                        <p>نقدم لك دعمًا فنيًا متواصلاً لضمان استمرارية عمل موقعك...</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-header">
                            <div class="check-circle"><i class="fas fa-check"></i></div>
                            <h3>تصميم متجاوب</h3>
                        </div>
                        <p>نضمن تصميم موقع يتوافق مع جميع الأجهزة والشاشات...</p>
                    </div>
                </div>

                <div class="features-image">
                    <div class="image-wrapper">
                        <img class="blob-bg" src="{{ asset('assets/images/blob-haikei (3).svg') }}" alt="خلفية">
                        <img class="dashboard-img" src="{{ asset('assets/images/dashboard.png') }}" alt="لوحة البيانات">
                    </div>
                </div>
            </div>
        </section>

        <!-- Custom Section -->
        <section class="custom-section">
            <div class="section-container">
                <div class="form-container">
                    <form action="{{ route('vip.store') }}" method="POST" class="custom-form">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
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

                        <div class="form-group">
                            <label>ادخل أفكار الموقع</label>
                            <textarea name="ideas" class="form-textarea" placeholder="أدخل رسالتك هنا..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="text" name="phone" class="form-input" placeholder="رقم الهاتف">
                        </div>
                        <button type="submit" class="submit-btn">إرسال</button>
                    </form>
                </div>

                <div class="images-container">
                    <div class="image-wrapper">
                        <div class="video-container">
                            <img src="{{ asset('assets/images/viplast.jpg') }}" alt="الصورة الرئيسية"
                                class="main-image">
                            <div class="play-icon">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <img src="{{ asset('assets/images/blob-haikei (3).svg') }}" alt="الصورة الصغيرة"
                            class="small-image">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div id="footer"></div>
    <script>
        window.isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
    </script>
    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/footer.js') }}"></script>
</body>

</html>
