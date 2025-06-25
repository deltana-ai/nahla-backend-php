document.addEventListener('DOMContentLoaded', function() {
 const products = [
    { id: 1, title: "هاتف ذكي", price: 1200, image: "assets/images/004.png", category: "الكترونيات" },
    { id: 2, title: "لابتوب", price: 2500, image: "assets/images/001.png", category: "الكترونيات" },
    { id: 3, title: "سماعات", price: 300, image: "assets/images/iPhoneX-Mockup.png", category: "الكترونيات" },
    { id: 4, title: "ساعة ذكية", price: 800, image: "assets/images/000.png", category: "الكترونيات" },
    { id: 5, title: "مطعم ايطالي", price: 0, image: "assets/images/001.png", category: "مطاعم" },
    { id: 6, title: "تيشيرت", price: 200, image: "assets/images/003.png", category: "ملابس" },
    { id: 7, title: "مطعم شرقي", price: 0, image: "assets/images/000.png", category: "مطاعم" },
    { id: 8, title: "بنطلون", price: 300, image: "assets/images/004.png", category: "ملابس" }
];

    const productsWrapper = document.querySelector('.products-wrapper');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentIndex = Math.floor(products.length / 2);
    let isAnimating = false;
const filterButtons = document.querySelectorAll('.filter-btn');
let filteredProducts = [...products];

    // إنشاء عناصر المنتجات
   function createProductCards() {
    productsWrapper.innerHTML = '';
    
    filteredProducts.forEach((product, index) => {
        const productCard = document.createElement('div');
        productCard.className = 'product-card';
        if (index === currentIndex) {
            productCard.classList.add('active');
        }

        productCard.innerHTML = `
            <img src="${product.image}" alt="${product.title}" class="product-image">
            <button class="add-to-cart" data-id="${product.id}">إضافة إلى السلة</button>
        `;

        productCard.addEventListener('click', () => {
            if (index !== currentIndex && !isAnimating) {
                navigateToIndex(index);
            }
        });

        productsWrapper.appendChild(productCard);
    });

    updateSliderPosition();
}

    // تحديث موضع السليدر بناء على المنتج النشط
    function updateSliderPosition() {
        const activeCard = document.querySelector('.product-card.active');
        if (!activeCard) return;
        
        const wrapperWidth = productsWrapper.offsetWidth;
        const wrapperCenter = wrapperWidth / 2;
        const cardCenter = activeCard.offsetLeft + (activeCard.offsetWidth / 2);
        const scrollPosition = wrapperCenter - cardCenter;
        
        productsWrapper.style.transform = `translateX(${scrollPosition}px)`;
    }

    // التنقل إلى منتج معين
    function navigateToIndex(newIndex) {
        if (isAnimating) return;
        
        isAnimating = true;
        
        // إزالة الفئة النشطة من جميع البطاقات
        document.querySelectorAll('.product-card').forEach(card => {
            card.classList.remove('active');
        });
        
        // تحديث المؤشر الحالي
        currentIndex = newIndex;
        
        // إضافة الفئة النشطة للبطاقة الجديدة
        document.querySelectorAll('.product-card')[currentIndex].classList.add('active');
        
        // تحديث موضع السليدر مع انتقال سلس
        updateSliderPosition();
        
        // إعادة تعيين حالة التحريك بعد انتهاء الانتقال
        setTimeout(() => {
            isAnimating = false;
        }, 500);
    }

    // الانتقال إلى المنتج السابق
    function goToPrev() {
        if (currentIndex > 0 && !isAnimating) {
            navigateToIndex(currentIndex - 1);
        }
    }

    // الانتقال إلى المنتج التالي
    function goToNext() {
        if (currentIndex < products.length - 1 && !isAnimating) {
            navigateToIndex(currentIndex + 1);
        }
    }

    // حدث النقر على زر الإضافة
    function handleAddToCart(event) {
        if (event.target.classList.contains('add-to-cart')) {
            const productId = event.target.getAttribute('data-id');
            const product = products.find(p => p.id == productId);
            alert(`تمت إضافة ${product.title} إلى السلة!`);
        }
    }
filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        // إزالة التحديد من الكل
        filterButtons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const category = btn.getAttribute('data-category');

        filteredProducts = category === 'all'
            ? [...products]
            : products.filter(p => p.category === category);

        currentIndex = Math.floor(filteredProducts.length / 2);
        createProductCards();
    });
});

    // تهيئة الأحداث
    prevBtn.addEventListener('click', goToPrev);
    nextBtn.addEventListener('click', goToNext);
    productsWrapper.addEventListener('click', handleAddToCart);
    window.addEventListener('resize', updateSliderPosition);

    // عرض المنتجات عند تحميل الصفحة
    createProductCards();
});