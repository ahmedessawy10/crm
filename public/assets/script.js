
// \\\\\\\\\\\
window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");
  if (window.scrollY > this.screen.height-200) { // بعد ما تنزلي 50px
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});


// تفعيل مكتبة AOS
AOS.init({
  duration: 1000,   // مدة الانيميشن
  once: false,      // لو true يحصل مرة واحدة بس
});



