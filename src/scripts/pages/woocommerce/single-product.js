import { Swiper, Autoplay, Navigation } from 'swiper';
Swiper.use([Autoplay, Navigation]);

var productGallerySwiper = new Swiper(".product-gallery-swiper", {
    speed: 750,
    slidesPerView: 1,
    spaceBetween: 25,
    watchOverflow: true,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
    },
    navigation: {
        prevEl: ".product-swiper-button-prev",
        nextEl: ".product-swiper-button-next",
    },
});

//Product info tabs menu
const currentProductInfoTabMenuItem = $('.product-info-tabs-menu li');
currentProductInfoTabMenuItem.on('click', function(){
    $('.product-info-tabs-menu li').removeClass('active')
    $(this).addClass('active');

    var currentTab = $(this).data('target');

    $('.product-info-tab').each(function( index ) {
        if($(this).attr('id') === currentTab && !$(this).hasClass('active')){
            $('.product-info-tab').removeClass('active');
            $(this).addClass('active');
        }
    })
})
//Product info tabs menu END

//Product info tabs menu navigation controls for mobile
$('.product-info-tab-navigation .product-info-tab-navigation-btn').on('click', function(){
    let currentProductInfoTabMenuItemActive = $('.product-info-tabs-menu li.active');

    if( $(this).hasClass('prev') ) {
        if( currentProductInfoTabMenuItemActive.prev().length ) {
            currentProductInfoTabMenuItemActive.prev().trigger('click');
        } else {
            currentProductInfoTabMenuItem.last().trigger('click');
        }
    } else {
        if( currentProductInfoTabMenuItemActive.next().length ) {
            currentProductInfoTabMenuItemActive.next().trigger('click');
        } else {
            currentProductInfoTabMenuItem.first().trigger('click');
        }
    }

    $('.product-info-tabs-menu').animate({
        scrollLeft: $('.product-info-tabs-menu li.active').offset().left - 20
    }, 600);
});
//Product info tabs menu navigation controls for mobile END

$('.label').on('click', function(){
    $(this).next().slideToggle('fast');
    $(this).parent().find('.variations_opener_icon').toggleClass('active');
})

setTimeout(function () {
    $('.thwvsf-color-li').each(function( index ) {
        $(this).after('<p>'+ $(this).attr("title") +'</p>')
    })
    $('.variations .label').append("<img class='variations_opener_icon active' src="+ site_data.theme_url + "/src/images/icons/variations-opener.svg />")

    addSelectedVariantName();

}, 1000);

function addSelectedVariantName(){
    var currentVariant;
    setTimeout(function () {
    $('table.variations tr').each(function(index){
        currentVariant = $(this).find('.value ul .thwvsf-selected').attr('title');

        $(this).find('.label label .current-variant-value').remove();
        $(this).find('.label label').append('<span class="current-variant-value">: '+ currentVariant +'</span>')
    })
    }, 200);
}

function updatePriceInDescription(){
    setTimeout(function () {
        var newPrice = $('.woocommerce-variation-price .price .woocommerce-Price-amount bdi').text();

        $('.secondary-info .price .woocommerce-Price-amount bdi').text(newPrice);
    }, 1000);
}

updatePriceInDescription()

$('.thwvsf-wrapper-ul').on('click', function(){
    updatePriceInDescription();
    addSelectedVariantName();
});

//Single product gallery popup
let singleProductPopupGallery = new Swiper(".single-product-popup-swiper", {
    speed: 750,
    slidesPerView: 1,
    spaceBetween: 25,
    watchOverflow: true,
    pagination: {
        el: '.single-product-popup-swiper-pagination',
        type: 'bullets',
    },
    navigation: {
        prevEl: ".single-product-popup-swiper-btn-prev",
        nextEl: ".single-product-popup-swiper-btn-next",
    },
});

const $singleProductPopupOpener = $('.single-product-popup-opener');
const $singleProductPopup = $('.single-product-gallery-popup');
$singleProductPopupOpener.on('click', function () {
    $singleProductPopup.fadeIn();
    $('body').addClass('no-scroll');
});

$('.close-single-product-popup').on('click', function(){
    $singleProductPopup.fadeOut();
    $('body').removeClass('no-scroll');
});
//Single product gallery popup END


const $singleInfoIcon = $('.single-icon-wrap');
const $singleInfoIconDescription = $('.single-icon-description-wrap');

$singleInfoIcon.on('click', function(){
    $singleInfoIcon.removeClass('active');
    $(this).addClass('active');
    $singleInfoIconDescription.removeClass('active');
    let target = $(this).data('target');
    $( '#' + target ).addClass('active');
});
