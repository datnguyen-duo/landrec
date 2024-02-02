import { Swiper, Autoplay, EffectFade, Pagination, Navigation } from 'swiper';
Swiper.use([Autoplay, EffectFade, Pagination, Navigation]);

var cardsSwiper = new Swiper(".cards-swiper", {
    speed: 750,
    slidesPerView: 1.2,
    spaceBetween: 25,
    centeredSlides: true,
    watchSlidesProgress: true,
    watchOverflow: true,
    navigation: {
        nextEl: ".cards-swiper-button-next",
        prevEl: ".cards-swiper-button-prev",
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 40,
            centeredSlides: false,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 50,
            centeredSlides: false,
        }
    },
});