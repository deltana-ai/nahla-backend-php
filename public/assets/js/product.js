const templates = [
  {
    id: 1,
    image: "assets/images/prodect.jpg",
    category: "مطاعم"
  },
  {
    id: 2,
    image: "assets/images/prodect.jpg",
    category: "مطاعم"
  },
  {
    id: 3,
    image: "assets/images/prodect.jpg",
    category: "ملابس"
  },
  {
    id: 4,
    image: "assets/images/prodect.jpg",
    category: "ملابس"
  },
  {
    id: 5,
    image: "assets/images/prodect.jpg",
    category: "مطاعم"
  },
  {
    id: 6,
    image: "assets/images/prodect.jpg",
    category: "ملابس"
  }
];

// عرض القوالب حسب الفئة
function renderTemplates(category) {
  const container = document.getElementById('template-container');
  container.innerHTML = '';

  const filtered = category === 'all' ? templates : templates.filter(t => t.category === category);

  filtered.forEach(template => {
    const card = document.createElement('div');
    card.className = 'template-card';
    card.innerHTML = `
      <img src="${template.image}" alt="${template.title}">
      
      <button onclick="addToCart('${template.title}')">أضف إلى السلة</button>
    `;
    container.appendChild(card);
  });
}

// عند الضغط على زر الفئة
document.querySelectorAll('.filter-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const category = btn.getAttribute('data-category');
    renderTemplates(category);
  });
});

// عرض أول فئة تلقائيًا عند تحميل الصفحة (مطاعم)
window.addEventListener('DOMContentLoaded', () => {
  const firstBtn = document.querySelector('.filter-btn[data-category="مطاعم"]');
  if (firstBtn) {
    firstBtn.classList.add('active');
    const category = firstBtn.getAttribute('data-category');
    renderTemplates(category);
  }
});

// وظيفة السلة
function addToCart(title) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push(title);
  localStorage.setItem('cart', JSON.stringify(cart));
  alert(`تمت إضافة "${title}" إلى السلة 🛒`);
}
