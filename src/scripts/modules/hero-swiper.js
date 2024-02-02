import { Swiper, Autoplay, EffectFade, Pagination, Navigation } from "swiper";
Swiper.use([Autoplay, EffectFade, Pagination, Navigation]);

var heroSwiper = new Swiper(".hero-swiper", {
  speed: 400,
  slidesPerView: 1,
  centeredSlides: true,
  watchOverflow: true,
  effect: "fade",
  autoplay: {
    delay: 5000,
  },
  pagination: {
    el: ".hero-swiper-pagination",
    clickable: true,
  },
});
