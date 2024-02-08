import { Swiper, Autoplay, Navigation } from "swiper";
Swiper.use([Autoplay, Navigation]);

var modalIcon = document.querySelector(".modal-icon"),
  close = document.querySelector(".close");

var gallerySwiper = new Swiper(".gallery-swiper", {
  speed: 400,
  slidesPerView: "auto",
  centeredSlides: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

if (modalIcon) {
  modalIcon.addEventListener("click", function () {
    document.body.classList.add("init-modal");
  });

  close.addEventListener("click", function () {
    document.body.classList.remove("init-modal");
  });
}
