const desktopPostsFilters = $('.posts-filters-desktop');
const mobilePostsFilters = $('.posts-filters-mobile');
const mobilePostsFiltersSubmitButton = $('.submit-mobile-filters-button');

const mobilePostsFiltersMenu = $('.mobile-posts-filters-menu');
const mobilePostsFiltersMenuOpener = $('.posts-filters-mobile .mobile-menu-opener');
const mobilePostsFiltersMenuCloser = $('.mobile-filters-close-button');

mobilePostsFiltersMenuOpener.on('click', function() {
    mobilePostsFiltersMenuOpener.removeClass('active');
    mobilePostsFiltersMenu.fadeIn();
    $('.mobile-menu').removeClass('active');
    let menu = $(this).data('menu');
    $('.' + menu).addClass('active');
    let id = $(this).data('id');
    $('.mobile-menu-opener[data-id="' + id + '"]').addClass('active');
    $('#site-header').addClass('mobile-filters-are-active');
    $('body').addClass('no-scroll');
});

mobilePostsFiltersMenuCloser.on('click', function(){
    closePostsFiltersMenu();
});

mobilePostsFiltersSubmitButton.on('click', function(event){
    event.preventDefault();
    closePostsFiltersMenu();
});

function closePostsFiltersMenu() {
    $('#site-header').removeClass('mobile-filters-are-active');
    mobilePostsFiltersMenu.fadeOut();
    mobilePostsFiltersMenuOpener.removeClass('active');
    $('body').removeClass('no-scroll');
}

function checkPostsFilters() {
    //Toggle between desktop and mobile inputs
    //Switch them on/off if they are visible/hidden
    if( desktopPostsFilters.is(':visible') ) {
        desktopPostsFilters.find('input, select').prop( "disabled", false );
        mobilePostsFilters.find('input, select').prop( "disabled", true );
    } else {
        desktopPostsFilters.find('input, select').prop( "disabled", true );
        mobilePostsFilters.find('input, select').prop( "disabled", false );
    }
}

var resizeTimer;
$( window ).on( "resize", function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function(){
        //When resizing is stopped
        checkPostsFilters();
    },100);
});

$( window ).on( "load", function() {
    checkPostsFilters();
});

function checkIfSelectedOptionsExists() {
    let selectedSelects = 0;
    let selectedRadioButtons = 0;

    mobilePostsFilters.find('select').each(function () {
        if( $(this).val() ) {
            selectedSelects+=1;
        }
    });
    if( selectedSelects ) {
        let buttonForIndicator = mobilePostsFilters.find('.filter-by-button');
        buttonForIndicator.find('.indicator').remove();
        buttonForIndicator.append(
            '<span class="indicator">'+selectedSelects+'</span>'
        );
    }

    mobilePostsFilters.find('input').each(function () {
        if( $(this).is(':checked') ) {
            selectedRadioButtons++;
        }
    });
    if( selectedRadioButtons ) {
        let buttonForIndicator = mobilePostsFilters.find('.sort-by-button');
        buttonForIndicator.find('.indicator').remove();
        buttonForIndicator.append(
            '<span class="indicator indicator-sort-by"></span>'
        );
    }
}

mobilePostsFilters.find('select').on('select2:select', function (e) {
    checkIfSelectedOptionsExists();
});

mobilePostsFilters.find('input').on('change', function (e) {
    checkIfSelectedOptionsExists();
});

// export { checkIfSelectedOptionsExists };