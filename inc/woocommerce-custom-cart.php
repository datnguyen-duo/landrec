<?php
function render_shopping_cart_items() {
    $woocommerce_cart = WC()->cart->get_cart();
    $checkoutPage = (is_checkout() && empty(is_wc_endpoint_url('order-received')));
    $cart_popup_description = get_field('cart_popup_description', 'option');

    if( $woocommerce_cart ):
        $checkout_url = wc_get_checkout_url();
        $cart_subtotal_price = WC()->cart->get_subtotal();
        $cart_shipping = WC()->cart->get_shipping_total();
        $cart_totals = WC()->cart->get_totals();
        $cart_price = $cart_totals['total'];
        $cart_price_subtotal = $cart_totals['subtotal'];
        $cart_price_total_tax = $cart_totals['total_tax']; ?>

        <div class="cart-items">
            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
                $item_name = $cart_item['data']->get_title();
                $product_id = $cart_item['product_id'];
                $product_quantity = $cart_item['quantity'];
                $price = $cart_item['data']->get_price();
                $image = get_the_post_thumbnail($product_id);
                ?>
                <div class="cart-item item-<?php echo $product_id; ?>" id="cart-item-<?php echo $cart_item_key; ?>">
                    <div class="cart-item-holder">
                        <div class="left">
                            <a href="<?= get_permalink($product_id) ?>" class="cart-item-image"><?= $image; ?></a>
                        </div>
                        <div class="right">
                            <div class="basic-product-cart-info">
                                <div class="left-info">
                                    <div class="cart-item-name"><?= $item_name; ?> (<?php echo $product_quantity; ?>)</div>
                                    <div class="product-attributes">
                                        <?php foreach($cart_item['data']->attributes as $single_attribute): ?>
                                            <p>
                                                <?= $single_attribute; ?>
                                            </p>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                                <div class="right-info">
                                    <div class="cart-item-price"> <?= wc_price($price) ?></div>
                                </div>
                            </div>
                            <div class="update-cart-container">
                                <div class="quantity">
                                   <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"><img src="<?= get_template_directory_uri() ?>/src/images/icons/variations-opener.svg" alt=""></button>
                                        <input type="number" stetype="number"p="1" min="1" data-item-key="<?php echo $cart_item_key ?>" name="cart[<?php echo $cart_item_key ?>]" title="Cart Qty" class="cart-qty" value="<?php echo $product_quantity; ?>">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"><img src="<?= get_template_directory_uri() ?>/src/images/icons/variations-opener.svg" alt=""></button>
                                </div>
                                <p class="remove-item" data-target="<?php echo $cart_item_key ?>">Remove</p>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cart-footer">
            <div class="cart-footer-info">
                <div class="total-cost-wrap">
                    <div class="single_price_row cart_total_price">
                        <h4>Total Cost</h4>
                        <p>
                        <?php if($checkoutPage): ?>
                            <?= wc_price($cart_price) ?>
                        <?php else: ?>
                            <?= wc_price($cart_price_subtotal) ?>
                        <?php endif; ?>
                        </p>
                    </div>

                    <?php if($checkoutPage): ?>
                        <div class="single_price_row cart_shipping_price">
                            <h4>Subtotal: </h4>
                            <p><?= wc_price($cart_price_subtotal) ?></p>
                        </div>

                        <div class="single_price_row cart_shipping_price">
                            <?php if(is_numeric($cart_shipping)): ?>
                                <h4>Shipping Costs: </h4>
                            <?php endif; ?>
                            <p><?= ( is_numeric($cart_shipping) ) ? wc_price($cart_shipping) : 'DOES NOT INCLUDE SHIPPING' ?></p>
                        </div>

                        <div class="single_price_row cart_tax_price">
                            <h4>Sales Tax:</h4>
                            <p><?= wc_price($cart_price_total_tax) ?></p>
                        </div>
                    <?php endif; ?>

                </div>
                <?php if($cart_popup_description): ?>

                    <div class="cart-footer-descripton">
                        <?php echo $cart_popup_description; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="checkout-btn-holder">
                <a href="<?= $checkout_url; ?>">Go To Checkout</a>
            </div>
        </div>
    <?php else:
        echo '<p class="empty-cart-message">Your cart is empty.</p>';
    endif;
}

function update_shopping_cart() {
    $is_item_added_to_cart = boolval($_POST['addedToCart']);
    render_shopping_cart_items($is_item_added_to_cart);
    die;
}
add_action('wp_ajax_updateshoppingcart', 'update_shopping_cart'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_updateshoppingcart', 'update_shopping_cart');

function render_shopping_cart() {
    $checkoutPage = ( is_checkout() && empty( is_wc_endpoint_url('order-received')) ); ?>
    <div class="custom-cart-overlay <?php echo ( $checkoutPage ) ? ' checkout-page' : null; ?>"></div>

    <div class="custom-side-cart <?php echo ( $checkoutPage ) ? ' checkout-page' : null; ?>" data-action="<?php echo site_url() ?>/wp-admin/admin-ajax.php">
        <div class="custom-side-cart-content">
            <div class="cart-header">
                <h2 class="cart-title"><?php echo ( $checkoutPage ) ? ' Your Order' : 'My Shopping Bag'; ?></h2>
                <div class="button-circle close-cart">
                    <img src="<?= get_template_directory_uri().'/src/images/icons/x-white.svg' ?>" alt="">
                </div>
            </div>

            <div class="cart-items-holder" id="cart-items-response">
                <?php render_shopping_cart_items(); ?>
            </div>
        </div>
    </div>
<?php }

function woo_custom_remove_from_cart() {
    $cart_item_key = $_POST['cartItemKey'];
    WC()->cart->remove_cart_item($cart_item_key);
}
add_action('wp_ajax_woo_custom_remove_from_cart', 'woo_custom_remove_from_cart'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_woo_custom_remove_from_cart', 'woo_custom_remove_from_cart');

function update_item_from_cart() {
    $cart_item_key = $_POST['cart_item_key'];
    $quantity = $_POST['qty'];

    // Get mini cart
//    ob_start();

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
    {
        if( $cart_item_key == $_POST['cart_item_key'] )
        {
            WC()->cart->set_quantity( $cart_item_key, $quantity, $refresh_totals = true );
        }
    }
    WC()->cart->calculate_totals();
//    WC()->cart->maybe_set_cart_cookies();
    return true;
}

add_action('wp_ajax_update_item_from_cart', 'update_item_from_cart');
add_action('wp_ajax_nopriv_update_item_from_cart', 'update_item_from_cart');