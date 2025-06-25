document.addEventListener("DOMContentLoaded", function () {
  const footer = `
    <footer class="footer">
      <div class="footer-container">



        <div class="footer-col">
          <h3>الشركه</h3>
          <ul>
            <li><a href="/">الرئيسية</a></li>
            <li><a href="/apps">تطبيقاتنا</a></li>
            <li><a href="/pakeg">باقتنا</a></li>
            <li><a href="/about">من نحن</a></li>
            <li><a href="/massage">اتصل بنا</a></li>
          </ul>
        </div>


        <div class="footer-col">
          <h3>قانوني</h3>
          <ul>
            <li><a href="#">سياسة الخصوصية</a></li>
            <li><a href="#">الشروط والخدمات</a></li>
            <li><a href="#">شروط الاستخدام</a></li>
          </ul>
        </div>


        <div class="footer-col">
          <h3>الوصول إلينا</h3>
          <ul class="contact-info">
            <li><i class="fas fa-phone"></i> 01234567890123456</li>
            <li><i class="fas fa-envelope"></i> info@example.com</li>
            <li><i class="fas fa-map-marker-alt"></i> مصر</li>
          </ul>
        </div>


        <div class="footer-col logo-social">
          <h1>LOGO</h1>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        © 2025 جميع الحقوق محفوظة
      </div>
    </footer>
  `;
  document.getElementById("footer").innerHTML = footer;
});
