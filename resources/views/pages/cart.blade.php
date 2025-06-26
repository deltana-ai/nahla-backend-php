<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>السلة</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/cart/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/prodects.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pricing-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/products-container.css') }}">
    <style>
        .products-slider {
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .products-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
            will-change: transform;
        }

        .product-card {
            min-width: 250px;
            margin: 10px;
            flex-shrink: 0;
        }
    </style>
</head>

<body>
    <header id="header"></header>

    <main>
        <div class="wizard">
            <div class="steps">
                <div class="step active" onclick="showStep(1)">
                    <div class="circle">1</div>
                    <div>السلة</div>
                </div>
                <div class="step" onclick="showStep(2)">
                    <div class="circle">2</div>
                    <div>تفاصيل الدفع</div>
                </div>
                <div class="step" onclick="showStep(3)">
                    <div class="circle">3</div>
                    <div>الطلب جاهز</div>
                </div>
            </div>

            <div id="step1" class="content active">
                <h2>السلة</h2>
                <form id="cart-form">
                    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
                        @php
                            use App\Models\Plan;
                            $plans = Plan::all();
                        @endphp
                        <div class="box-section">
                            <h4>تفاصيل الباقة</h4>
                            <select id="plan" name="plan" class="custom-select">
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->monthly_price }}" data-id="{{ $plan->id }}">
                                        {{ $plan->title }} - {{ $plan->monthly_price }}$</option>
                                @endforeach
                            </select>

                            <h4 style="margin-top: 20px;">التطبيق</h4>
                            <select id="app" name="app" class="custom-select">
                                @foreach ($apps as $app)
                                    <option value="{{ $app->price }}" data-id="{{ $app->id }}">
                                        {{ $app->name }} - {{ $app->price }}$</option>
                                @endforeach
                                <option value="0" data-id="">بدون تطبيق - 0$</option>
                            </select>
                        </div>

                        <div class="box-section">
                            <h4>مدة الاشتراك</h4>
                            <select id="sub" name="sub" class="custom-select">
                                <option value="" disabled selected>اختر مدة الاشتراك</option>
                            </select>
                        </div>

                    </div>
                    <hr style="margin: 20px 0;" />
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <strong>الإجمالي:</strong>
                        <strong id="total-amount">$0.00</strong>
                    </div>
                    <button type="button" class="btn" onclick="submitCart()">الدفع</button>
                </form>
            </div>

            <div id="step2" class="content">
                <div class="cart-summary">
                    <h3>ملخص السلة</h3>
                    <div class="cart-item"><span class="item-label">الباقة</span><span class="item-price"
                            id="summary-plan"></span></div>
                    <div class="cart-item"><span class="item-label">التطبيق</span><span class="item-price"
                            id="summary-app"></span></div>
                    <div class="cart-item"><span class="item-label">مدة الاشتراك</span><span class="item-price"
                            id="summary-sub"></span></div>
                    <hr>
                    <div class="cart-total"><span>الإجمالي</span><span id="summary-total"></span></div>
                </div>

                <div class="payment-box" style="margin-top: 30px;">
                    <label for="transferNumber">رقم التحويل</label>
                    <input type="text" id="transferNumber" placeholder="أدخل رقم التحويل">
                    <div class="upload-area" onclick="document.getElementById('receiptInput').click()">
                        <span id="upload-text">ارفق صورة الإيصال</span>
                        <img id="receiptPreview" src="" alt=""
                            style="display: none; max-width: 100%; margin-top: 10px;" />
                    </div>
                    <input type="file" id="receiptInput" accept="image/*" style="display: none;"
                        onchange="previewReceipt(event)" />
                </div>

                <div style="text-align: center; margin-top: 30px;">
                    <button class="btn" onclick="submitPayment()">التالي</button>
                </div>
            </div>

            <div id="step3" class="content">
                <div class="circle">
                    <div class="checkmark">✓</div>
                </div>
                <h1>تم اشتراكك بنجاح</h1>
                <div class="subtitle">سيتواصل معك فريق خدمة العملاء فورًا</div>
                <button class="start-button" onclick="location.href='/'">العودة للرئيسية</button>
            </div>
        </div>

        <div class="products-section">
            <div class="products-container">
                <div class="products-slider">
                    <button class="prev-btn">
                        < </button>
                            <button class="next-btn"> > </button>
                            <div class="products-wrapper">
                                @foreach ($apps as $app)
                                    <div class="product-card active"
                                        data-category="{{ $app->category->name ?? '' }}">
                                        <img src="{{ asset('storage/' . $app->image) }}" alt="{{ $app->name }}"
                                            class="product-image">
                                        <p>{{ $app->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                </div>
            </div>





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

                            {{-- <a href="/massage" class="btn">ابدأ الآن</a> --}}
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>

    <div id="footer"></div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            updateSubscriptionPrices();
        });


        let cartData = {};

        function showStep(step) {
            document.querySelectorAll('.content').forEach(div => div.classList.remove('active'));
            document.getElementById('step' + step).classList.add('active');
            document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.step')[step - 1].classList.add('active');
        }

        function calculateTotal() {
            const plan = parseFloat(document.getElementById('plan').value) || 0;
            const app = parseFloat(document.getElementById('app').value) || 0;
            const sub = parseFloat(document.getElementById('sub').value) || 0;
            const total = plan + app + sub;
            document.getElementById('total-amount').textContent = `$${total.toFixed(2)}`;
        }

        function submitCart() {
            calculateTotal();

            const planSelect = document.getElementById('plan');
            const appSelect = document.getElementById('app');
            const subSelect = document.getElementById('sub');

            cartData = {
                plan_id: planSelect.selectedOptions[0].dataset.id,
                plan_price: parseFloat(planSelect.value),
                app_id: appSelect.selectedOptions[0].dataset.id || null,
                app_price: parseFloat(appSelect.value),
                subscription_price: parseFloat(subSelect.value)
            };
            cartData.total_price = (cartData.plan_price + cartData.app_price + cartData.subscription_price).toFixed(2);

            document.getElementById('summary-plan').textContent = planSelect.selectedOptions[0].textContent;
            document.getElementById('summary-app').textContent = appSelect.selectedOptions[0].textContent;
            document.getElementById('summary-sub').textContent = subSelect.selectedOptions[0].textContent;
            document.getElementById('summary-total').textContent = `$${cartData.total_price}`;

            showStep(2);
        }

        function submitPayment() {
            const formData = new FormData();
            formData.append('plan_id', cartData.plan_id);
            formData.append('app_id', cartData.app_id);
            formData.append('subscription_price', cartData.subscription_price);
            formData.append('total_price', cartData.total_price);
            formData.append('transfer_number', document.getElementById('transferNumber').value);

            const receiptInput = document.getElementById('receiptInput');
            if (receiptInput.files.length > 0) {
                formData.append('receipt', receiptInput.files[0]);
            }

            fetch("{{ route('cart.store') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(res => res.ok ? res.json() : Promise.reject('فشل في إرسال الطلب'))
                .then(data => showStep(3))
                .catch(err => alert('حدث خطأ أثناء حفظ الطلب، حاول مرة أخرى'));
        }

        document.querySelectorAll('#plan, #app, #sub').forEach(select => {
            select.addEventListener('change', calculateTotal);
        });

        const wrapper = document.querySelector('.products-wrapper');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');

        let scrollPosition = 0;
        const cardWidth = 270;

        nextBtn.addEventListener('click', () => {
            scrollPosition -= cardWidth;
            wrapper.style.transform = `translateX(${scrollPosition}px)`;
        });

        prevBtn.addEventListener('click', () => {
            scrollPosition += cardWidth;
            wrapper.style.transform = `translateX(${scrollPosition}px)`;
        });

        function previewReceipt(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const img = document.getElementById('receiptPreview');
                img.src = reader.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        const subSelect = document.getElementById('sub');
        const planSelect = document.getElementById('plan');

        function updateSubscriptionPrices() {
            const monthlyPrice = parseFloat(planSelect.value);
            if (isNaN(monthlyPrice)) return;

            const options = [{
                    years: 1,
                    label: 'عام'
                },
                {
                    years: 2,
                    label: 'عامين'
                },
                {
                    years: 3,
                    label: 'ثلاثة أعوام'
                }
            ];

            subSelect.innerHTML = '';

            options.forEach(opt => {
                const price = monthlyPrice * 12 * opt.years;
                const option = document.createElement('option');
                option.value = opt.years;
                option.setAttribute('data-price', price.toFixed(2));
                option.textContent = `${opt.label} - ${price.toFixed(2)}$`;
                subSelect.appendChild(option);
            });

            calculateTotal();
        }

        function calculateTotal() {
            const plan = parseFloat(document.getElementById('plan').value) || 0;
            const app = parseFloat(document.getElementById('app').value) || 0;
            const subOption = subSelect.options[subSelect.selectedIndex];
            const subPrice = subOption ? parseFloat(subOption.dataset.price) : 0;
            const total = plan + app + subPrice;
            document.getElementById('total-amount').textContent = `$${total.toFixed(2)}`;
        }

        function submitCart() {
            calculateTotal();

            const planSelect = document.getElementById('plan');
            const appSelect = document.getElementById('app');
            const subSelect = document.getElementById('sub');

            const subOption = subSelect.options[subSelect.selectedIndex];
            const subYears = subOption ? parseInt(subSelect.value) : 0;
            const subPrice = subOption ? parseFloat(subOption.dataset.price) : 0;

            cartData = {
                plan_id: planSelect.selectedOptions[0].dataset.id,
                plan_price: parseFloat(planSelect.value),
                app_id: appSelect.selectedOptions[0].dataset.id || null,
                app_price: parseFloat(appSelect.value),
                subscription_years: subYears,
                subscription_price: subPrice
            };

            cartData.total_price = (cartData.plan_price + cartData.app_price + cartData.subscription_price).toFixed(2);

            document.getElementById('summary-plan').textContent = planSelect.selectedOptions[0].textContent;
            document.getElementById('summary-app').textContent = appSelect.selectedOptions[0].textContent;
            document.getElementById('summary-sub').textContent = subOption.textContent;
            document.getElementById('summary-total').textContent = `$${cartData.total_price}`;

            showStep(2);
        }

        function submitPayment() {
            const formData = new FormData();
            formData.append('plan_id', cartData.plan_id);
            formData.append('app_id', cartData.app_id);
            formData.append('subscription_years', cartData.subscription_years);
            formData.append('subscription_price', cartData.subscription_price);
            formData.append('total_price', cartData.total_price);
            formData.append('transfer_number', document.getElementById('transferNumber').value);
            formData.append('web_id', CURRENT_WEB_ID); // ✅ هنا الإضافة

            const receiptInput = document.getElementById('receiptInput');
            if (receiptInput.files.length > 0) {
                formData.append('receipt', receiptInput.files[0]);
            }

            fetch("{{ route('cart.store') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(res => res.ok ? res.json() : Promise.reject('فشل في إرسال الطلب'))
                .then(data => showStep(3))
                .catch(err => alert('حدث خطأ أثناء حفظ الطلب، حاول مرة أخرى'));
        }



        planSelect.addEventListener('change', updateSubscriptionPrices);
        window.addEventListener('DOMContentLoaded', updateSubscriptionPrices);
    </script>
    <script>
        const CURRENT_WEB_ID = {{ $web->id }};

        window.isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
    </script>
    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/pricing-section.js') }}"></script>
    <script src="{{ asset('assets/js/products-container.js') }}"></script>
    <script src="{{ asset('assets/js/footer.js') }}"></script>
</body>

</html>
