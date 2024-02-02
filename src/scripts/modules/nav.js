import $ from "jquery/dist/jquery";

/**
 * Header - on scroll show/hide header or increase/decrease height of header
 * **/
const siteHeader = document.getElementById('site-header');
const $siteNavMobile = $('#site-nav-mobile');

window.addEventListener('scroll', function() {
    if($('header').length > 0){
        checkHeaderPosition();
    }
});

window.addEventListener('load', function(event) {
    if($('header').length > 0){
        checkHeaderPosition();
    }
});

function checkHeaderPosition() {
    if( window.pageYOffset > 100 ) {
        siteHeader.classList.add('small-header');

        if($('body').hasClass('product-template-default') || $('.default-page-wrap').length){
            siteHeader.classList.remove('single-product-header');
        }

    } else {
        siteHeader.classList.remove('small-header');

        if($('body').hasClass('product-template-default') || $('.default-page-wrap').length){
            siteHeader.classList.add('single-product-header');
        }
    }
}
/**
 * Header - on scroll show/hide header or increase/decrease height of header
 * END
 * **/

/**
 * Mobile nav
 * **/
const $hamburger = $('.hamburger');
$hamburger.on('click', function(){
    $(this).toggleClass('active');
    $(siteHeader).toggleClass('mobile-nav-is-active');
    $($siteNavMobile).fadeToggle();
    $('body').toggleClass('no-scroll');
})
/**
 * Mobile nav END
 * **/