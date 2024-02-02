import $ from "jquery/dist/jquery";

let $formsFilterButtons = $('.forms-filter button');

$formsFilterButtons.on('click', function(){
    $formsFilterButtons.removeClass('active');
    $(this).addClass('active');
    let target = '#' + $(this).data('target');
    $('.forms .form-holder').removeClass('active');
    $(target).addClass('active');
});