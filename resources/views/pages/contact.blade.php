<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>تواصل معنا</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap (للتنبيهات فقط أو التصميم الكامل) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- ملفات التنسيق الخاصة بك -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contact/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/join-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
</head>

<body>

    <div id="header"></div>

    <main>
        <div class="contact-container">
            <div class="contact-header">
                <h1>تواصل معنا اليوم</h1>
                <p class="subtitle">سوف نقوم بالرد عليك في أسرع وقت ممكن</p>
            </div>

            <div class="contact-sections">
                <!-- معلومات التواصل -->
                <div class="contact-info-section">
                    <div class="info-box">
                        <h2>معلومات التواصل</h2>
                        <div class="info-item"><i class="fab fa-whatsapp"></i>
                            <div><span>واتساب</span><span>0123456879450</span></div>
                        </div>
                        <div class="info-item"><i class="fas fa-phone"></i>
                            <div><span>هاتف</span><span>0123456879450</span></div>
                        </div>
                        <div class="info-item"><i class="fas fa-envelope"></i>
                            <div><span>بريد إلكتروني</span><span>info@example.com</span></div>
                        </div>
                        <div class="info-item"><i class="fas fa-map-marker-alt"></i>
                            <div><span>العنوان</span><span>مصر، القاهرة</span></div>
                        </div>
                    </div>
                </div>

                <!-- نموذج التواصل -->
                <div class="contact-form-section">
                    <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
                        @csrf

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

                        <div class="form-group">
                            <label for="company">اسم الشركة</label>
                            <input type="text" id="company" name="company" required>
                        </div>

                        <div class="form-group">
                            <label for="name">الاسم بالكامل</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">الايميل</label>
                            <input type="email" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="phone">رقم الهاتف</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">موضوع الرسالة</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>

                        <div class="form-group">
                            <label for="message">الرسالة</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="signature">التوقيع (اختياري)</label>
                            <input type="text" id="signature" name="signature">
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i> إرسال الرسالة
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- قسم الانضمام -->
        <section class="join-section">
            <div class="container" id="joinSection"></div>
        </section>
    </main>

    <div id="footer"></div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/footer.js') }}"></script>
    <script src="{{ asset('assets/js/join-section.js') }}"></script>
    <script>
        window.isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
    </script>
</body>

</html>
