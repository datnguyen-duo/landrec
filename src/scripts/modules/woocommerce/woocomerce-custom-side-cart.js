const customSideCart = $(".custom-side-cart");
const customSideCartOverlay = $(".custom-cart-overlay");
const customSideCartOpener = $(".custom-side-cart-opener");
const checkOutPage = $(".woocommerce-checkout");

function openSideCart() {
    customSideCart.addClass("active");
    customSideCartOverlay.fadeIn();
}

$('.cart_menu_item').on('click', function(){
    customSideCart.addClass("active");
    customSideCartOverlay.fadeIn();
})

function closeSideCart() {
    customSideCart.removeClass("active");
    customSideCartOverlay.fadeOut();
}

customSideCartOpener.on("click", function () {
    openSideCart();
});

customSideCart.find(".close-cart").on("click", function () {
    closeSideCart();
});

customSideCartOverlay.on("click", function () {
    closeSideCart();
});

//Update items in shopping cart
function updateShoppingCart( isItemAddedToCart, openCart = true ) {
    var responseDiv = document.getElementById("cart-items-response");
    customSideCart.addClass('loading');

    $.ajax({
        url: customSideCart.data("action"),
        data: {
            action: "updateshoppingcart",
            addedToCart: isItemAddedToCart,
        }, // form data
        type: "POST", // POST
        beforeSend: function (xhr) {},
        success: function (data) {
            responseDiv.innerHTML = data;
        },
        complete: function (xhr, status) {
            customSideCart.removeClass('loading');

            if ( openCart ) {
                openSideCart();
            }

            if (
                customSideCart.hasClass("checkout-page") &&
                !customSideCart.find(".cart-items .cart-item").length
            ) {
                window.location.href = "/";
            }
        },
    });
}
//Update items in shopping cart END

//Events
    //Event after adding to cart action
    $("body").on("added_to_cart", function () {
        updateShoppingCart(1);
    });

    //Event after updating the cart
    $( "body" ).on("updated_checkout", function () {
        updateShoppingCart(0, false);
    });

    // $(document).on('click', '#shipping_method', function(){
    //     setTimeout(function () {
    //         console.log('updated');
    //         updateShoppingCart(0, false);
    //     }, 5000);
    // });
//Events END

//Remove item from cart function
customSideCart.on("click", ".remove-item", function (event) {
    event.preventDefault();
    let cartItemKey = $(this).data("target");
    $.ajax({
        url: $(".custom-side-cart").data("action"),
        data: {
            action: "woo_custom_remove_from_cart",
            cartItemKey: cartItemKey,
        },
        type: "POST", // POST
        beforeSend: function (xhr) {
            $("#cart-item-" + cartItemKey).slideUp(250);
        },
        success: function (data) {
            if ( checkOutPage.length ) {
                $("body").trigger("update_checkout");
            }

            setTimeout(function () {
                updateShoppingCart();
            }, 250);
        },
        complete: function (xhr, status) {},
    });
});

customSideCart.on('click', '.update-cart-container .quantity button', function (e) {
    e.preventDefault();
    var qty = $(this).parent().find('input').val();
    var cartItemKey = $(this).parent().find('input').data("item-key");

    updateItemQuantity( qty, cartItemKey );
});

customSideCart.on('change', '.update-cart-container .quantity', function (e) {
    var qty = $(this).parent().find('input').val();
    var cartItemKey = $(this).parent().find('input').data("item-key");
    updateItemQuantity( qty, cartItemKey );
});

function updateItemQuantity( quantity, cartItemKey ) {
    customSideCart.addClass('loading');

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: site_data.site_url + '/wp-admin/admin-ajax.php',
        data: {action : 'update_item_from_cart', 'cart_item_key' : cartItemKey, 'qty' : quantity,  },
        success: function (data) {
            updateShoppingCart();
        },
        // complete: function (data) {}
    });
}