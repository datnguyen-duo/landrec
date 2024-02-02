const $searchOpener = $('.search-opener');
const $searchOverlay = $('.search-overlay');
const $closeSearchOverlay = $('.close-search-overlay');

$searchOpener.on('click', function () {
    $searchOverlay.addClass('active');
});

$closeSearchOverlay.on('click', function () {
    $searchOverlay.removeClass('active');
});

$('.search_menu_item').on('click', function(){
    $searchOverlay.addClass('active');
})
