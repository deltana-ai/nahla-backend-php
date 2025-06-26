<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حسابي - نحلة</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/profile/profile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!-- زر القائمة للجوال -->
    <button class="mobile-menu-btn" id="mobileMenuBtn">
        <i class="fas fa-bars"></i>
    </button>

    <!-- الشريط الجانبي -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>تفاصيل الحساب</h3>
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <button class="active" onclick="showSection('profile')">
                    <i class="fas fa-user"></i> البروفايل
                </button>
            </li>
            <li class="nav-item">
                <button onclick="showSection('orders')">
                    <i class="fas fa-shopping-bag"></i> الطلبات
                </button>
            </li>
            <li class="nav-item">
                <button class="cta-btn" onclick="window.location.href='/'"><i class="fas fa-home"></i>الرئيسية</button>

            </li>

        </ul>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="main-content">

        <!-- قسم البروفايل -->
        <section id="profile" class="profile-section">
            <div class="content-header">
                <h2>البروفايل</h2>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">تسجيل الخروج</button>
                </form>
            </div>

            <form class="profile-form" method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-groub">
                    <div class="profile-wrapper">
                        <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/images/profile.jpg') }}"
                            alt="الصورة الشخصية">
                    </div>
                </div>

                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}">
                </div>

                <div class="form-group">
                    <label>البريد الإلكتروني الأساسي</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}">
                </div>

                <div class="form-group">
                    <label>البريد الإلكتروني الثانوي</label>
                    <input type="email" name="alt_email" value="{{ auth()->user()->alt_email }}">
                </div>

                <div class="form-group">
                    <label>اسم المنشأة</label>
                    <input type="text" name="company_name" value="{{ auth()->user()->company_name }}">
                </div>

                <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input type="text" name="phone" value="{{ auth()->user()->phone }}">
                </div>

                <div class="form-group">
                    <label>لغة المتجر</label>
                    <select name="store_language">
                        <option value="العربية" {{ auth()->user()->store_language == 'العربية' ? 'selected' : '' }}>
                            العربية</option>
                        <option value="الإنجليزية"
                            {{ auth()->user()->store_language == 'الإنجليزية' ? 'selected' : '' }}>الإنجليزية</option>
                    </select>
                </div>

                <div class="form-group">
                    <label> العنوان</label>
                    <input type="text" name="store_address" value="{{ auth()->user()->store_address }}">
                </div>
                <button type="submit" class="update-btn">تحديث</button>
            </form>
        </section>

        <!-- قسم الطلبات -->
        <section id="orders" class="orders-section hidden">
            <div class="content-header">
                <h2>الطلبات</h2>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">تسجيل الخروج</button>
                </form>
            </div>

            @php
                $orders = auth()
                    ->user()
                    ->orders()
                    ->with(['plan', 'app'])
                    ->latest()
                    ->get();
            @endphp

            @if ($orders->isEmpty())
                <p>لا يوجد طلبات حتى الآن.</p>
            @else
                <div style="overflow-x: auto;">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>الباقه</th>
                                <th>المتجر</th>
                                <th>موبيل</th>
                                <th>الاشتراك</th>
                                <th>التاريخ</th>
                                <th>الوقت</th>
                                <th>الاجمالي</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->plan?->title ?? '-' }}</td>
                                    <td>{{ $order->web?->name ?? '-' }}</td>
                                    <td>{{ $order->app?->name ?? '-' }}</td>
                                    <td>
                                        @if ($order->subscription_years)
                                            @switch($order->subscription_years)
                                                @case(1)
                                                    عام
                                                @break

                                                @case(2)
                                                    عامين
                                                @break

                                                @default
                                                    {{ $order->subscription_years }} أعوام
                                            @endswitch
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $order->created_at->format('g:i a') }}</td>
                                    <td>{{ number_format($order->total_price, 2) }}$</td>
                                    <td>
                                        @php
                                            // مثال: يمكنك تعديل الحالة حسب جدولك أو منطقك
                                            $status = $order->status ?? 'completed';
                                        @endphp
                                        @if ($status == 'completed')
                                            <span class="status-completed">مكتمل</span>
                                        @elseif($status == 'pending')
                                            <span class="status-pending">الانتظار</span>
                                        @elseif($status == 'cancelled')
                                            <span class="status-cancelled">ملغي</span>
                                        @else
                                            <span>{{ $status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>


    </main>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.profile-section, .orders-section, .packages-section').forEach(section => {
                section.classList.add('hidden');
            });

            document.getElementById(sectionId).classList.remove('hidden');

            document.querySelectorAll('.nav-item button').forEach(btn => {
                btn.classList.remove('active');
            });

            event.currentTarget.classList.add('active');
        }

        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');

            const icon = this.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mobileBtn = document.getElementById('mobileMenuBtn');

            if (window.innerWidth <= 992 &&
                !sidebar.contains(event.target) &&
                !mobileBtn.contains(event.target)) {
                sidebar.classList.remove('active');
                mobileBtn.querySelector('i').classList.remove('fa-times');
                mobileBtn.querySelector('i').classList.add('fa-bars');
            }
        });
    </script>
</body>

</html>
