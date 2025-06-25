document.addEventListener("DOMContentLoaded", function () {
  const isLoggedIn = window.isLoggedIn === true;

  const loginButton = !isLoggedIn
    ? `<button class="login-btn"><a href="/login-user">تسجيل دخول</a></button>`
    : "";

  const profileLink = isLoggedIn
    ? `<a href="/profile"><i class="fas fa-user icon"></i></a>`
    : "";

  const header = `
    <header class="header">
      <div class="containers">
        <div class="nav-left">
          ${loginButton}
          ${profileLink}
          <a href="/cart">
            <i class="fas fa-bag-shopping icon">
              <span class="cart-count">3</span>
            </i>
          </a>
        </div>

        <nav class="nav-links">
          <a href="/">الرئيسية</a>
          <a href="/pakeg">باقاتنا</a>
          <a href="/apps">تطبيقاتنا</a>
          <a href="/about">من نحن</a>
          <a href="/massage">اتصل بنا</a>
          <a href="/vip">VIP</a>
        </nav>
        <div class="menu-toggle">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </header>

    <div class="mobile-menu">
      <div class="close-menu">
        <i class="fas fa-times"></i>
      </div>
      <a href="/">الرئيسية</a>
      <a href="/pakeg">باقاتنا</a>
      <a href="/apps">تطبيقاتنا</a>
      <a href="/about">من نحن</a>
      <a href="/massage">اتصل بنا</a>
      <a href="/vip">VIP</a>
    </div>
    <div class="overlay"></div>
  `;

  document.getElementById("header").innerHTML = header;

  const menuToggle = document.querySelector('.menu-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');
  const overlay = document.querySelector('.overlay');
  const closeMenu = document.querySelector('.close-menu');

  menuToggle?.addEventListener('click', function () {
    mobileMenu.classList.add('active');
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  });

  closeMenu?.addEventListener('click', function () {
    mobileMenu.classList.remove('active');
    overlay.classList.remove('active');
    document.body.style.overflow = 'auto';
  });

  overlay?.addEventListener('click', function () {
    mobileMenu.classList.remove('active');
    overlay.classList.remove('active');
    document.body.style.overflow = 'auto';
  });

  document.querySelectorAll('.mobile-menu a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.remove('active');
      overlay.classList.remove('active');
      document.body.style.overflow = 'auto';
    });
  });
});
