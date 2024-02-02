import { Swiper, Autoplay, Navigation } from 'swiper';
Swiper.use([Autoplay, Navigation]);

let gallerySwiper = "";
const $popupOpener = $('.gallery-holder');
$popupOpener.on('click', function () {
    let popupIndex = $(this).data('popup-index');
    $('.gallery-popup').fadeOut();
    $( '#gallery-popup-' + popupIndex ).fadeIn();
    $('body').addClass('no-scroll');

    if( gallerySwiper ) {
        gallerySwiper.destroy();
    }

    gallerySwiper = new Swiper(".gallery-swiper-" + popupIndex, {
        speed: 750,
        slidesPerView: 1,
        spaceBetween: 25,
        watchOverflow: true,
        navigation: {
            prevEl: ".gallery-swiper-button-prev-" + popupIndex,
            nextEl: ".gallery-swiper-button-next-" + popupIndex,
        },
    });
});

$('.close-popup').on('click', function(){
    $(this).parent().parent().fadeOut();
    $('body').removeClass('no-scroll');
});

