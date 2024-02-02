(function ($) {
    //Change (optional text in cart)
    $('label .optional').text('(This is optional)');
    //Change (optional text in cart) END

    $("#ship-to-different-address-checkbox").change(function () {
        $(".shipping_address select").select2({
            width: '100%',
        });
    });

    $('.ship-to-different-address-checkboxes .single-checkbox').on('click', function(){
        $('.single-checkbox').removeClass('active');
        $(this).addClass('active');

        if($(this).hasClass('different-address')){
            $('.shipping_address').slideDown();
            $("#ship-to-different-address-checkbox").attr('checked', 'checked').change();

        } else{
            $('.shipping_address').slideUp();
            $("#ship-to-different-address-checkbox").removeAttr('checked').change();
        }
    })

    // Change tabs on checkoout page
    let $checkoutStepChanger = $('.checkout-nav-item, .checkout_buttons_holder .navigation_links');
    $checkoutStepChanger.on('click', function(){
        window.scrollTo({ top: 0, behavior: 'smooth' });
        var currentStep = $(this).data('step');
        $('.single_step').fadeOut('fast');
        $('.checkout-nav-item').removeClass('active');

        if( currentStep === 1 ) {
            $('.checkout_nav ul li[data-step=1]').addClass('active');
            $('.billing_box').fadeIn('fast');
        }

        if(  currentStep === 2) {
            $('.checkout_nav ul li[data-step=2]').addClass('active');
            $('.shipping_box').fadeIn('fast');
        }

        if( currentStep === 3 ) {
            $('.checkout_nav ul li[data-step=3]').addClass('active');
            $('#order_review').fadeIn('fast');
        }
    })
    // Change tabs on checkoout page END
})(jQuery);