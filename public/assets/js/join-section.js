const joinData = {
  imageSrc: "assets/images/featured_01.png",
  imageAlt: "تحليلات",
  heading: "انضم إلى 100 شركة تعمل على تعزيز منتجاتها بالمتجر",
  description:
    "أنشئ متجرك الآن بأدوات مرنة وحلول متكاملة تساعدك في كل خطوة نحو نمو مبيعاتك وتسويق منتجاتك",
  buttonText: "راسلنا الآن", // تقدر تعدل نص الزر لو حبيت
  buttonAction: "startStore()",
};

const joinSection = document.getElementById("joinSection");

joinSection.innerHTML = `
  <div class="card">
    <div class="card-image">
      <img src="${joinData.imageSrc}" alt="${joinData.imageAlt}" />
    </div>
    <div class="card-content">
      <h2>${joinData.heading}</h2>
      <p>${joinData.description}</p>
      <button class="join-btn" onclick="${joinData.buttonAction}">${joinData.buttonText}</button>
    </div>
  </div>
`;

// الدالة الجديدة تفتح صفحة الرسائل
function startStore() {
  window.location.href = "/massage"; // ← غيّر الرابط لو عايز يروح لصفحة مختلفة
}
