<?php
//remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form');
//add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form' );
?>
<nav class="checkout_nav">
    <a href="<?= get_site_url() ?>" class="logo_holder">
        <img class="site-logo visible" src="<?= get_template_directory_uri().'/src/images/logo-light.svg' ?>" alt="logo">
    </a>

    <ul class="checkout-nav-items">
        <li class="checkout-nav-item button-circle active" data-step="1">
            <a class="white">1</a>
        </li>
        <li class="checkout-nav-item button-circle shipping" data-step="2">
            <a class="white">2</a>
        </li>
        <li class="checkout-nav-item button-circle payment" data-step="3">
            <a class="white">3</a>
        </li>

        <li class="button-circle cart custom-side-cart-opener">
            <svg xmlns="http://www.w3.org/2000/svg" width="19.494" height="22.788" viewBox="0 0 19.494 22.788">
                <g id="g10" transform="translate(1 1.06)">
                    <path id="path243" d="M11.137-20.573l14.342.016c.512,0,.872.7.923,1.559l.718,12.029c.051.862-.412,1.559-.923,1.559H10.558c-.512,0-.965-.7-.923-1.559l.579-11.957c.042-.863.412-1.648.923-1.647Z" transform="translate(-9.632 26.137)" fill="rgba(0,0,0,0)" stroke="#003053" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    <path id="path245" d="M21.917-20.185a4.7,4.7,0,0,0-2.264-4.047,4.386,4.386,0,0,0-4.522.013,4.7,4.7,0,0,0-2.243,4.06" transform="translate(-8.656 24.854)" fill="rgba(0,0,0,0)" stroke="#003053" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </g>
            </svg>
        </li>
    </ul>
</nav>

<div class="form_checkout_page_container">

    <div class="checkout_fields">
        <div class="checkout_header">
            <h1>Checkout</h1>
        </div>
        <?php
        /**
         * Checkout Form
         *
         * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
         *
         * HOWEVER, on occasion WooCommerce will need to update template files and you
         * (the theme developer) will need to copy the new files to your theme to
         * maintain compatibility. We try to do this as little as possible, but it does
         * happen. When this occurs the version of the template file will be bumped and
         * the readme will list any important changes.
         *
         * @see https://docs.woocommerce.com/document/template-structure/
         * @package WooCommerce\Templates
         * @version 3.5.0
         */

        if ( ! defined( 'ABSPATH' ) ) {
            exit;
        }

        do_action( 'woocommerce_before_checkout_form', $checkout );

        // If checkout registration is disabled and not logged in, the user cannot checkout.
        if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
            echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
            return;
        } ?>

        <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

            <?php if ( $checkout->get_checkout_fields() ) : ?>

                <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                <div id="customer_details">
                    <div class="billing_box single_step">
                        <?php do_action( 'woocommerce_checkout_billing' ); ?>
                        <div class="checkout_buttons_holder">
                            <a href="<?= get_site_url() ?>" class="navigation_links back_link">Back To Cart</a>
                            <div class="navigation_links btn" data-step="2">Next: Shipping</div>
                        </div>
                    </div>

                    <div class="shipping_box single_step">
                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>

                        <?php if( WC()->shipping->get_packages() ): ?>
                            <h2>Shipping Methods</h2>
							<?php echo woocommerce_order_review();
                        endif; ?>

                        <div class="checkout_buttons_holder">
                            <div class="navigation_links back_link" data-step="1">Go Back</div>
                            <div class="navigation_links btn" data-step="3">Next: Payment Details</div>
                        </div>
                    </div>
                </div>

                <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
            <?php endif; ?>

            <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <div id="order_review" class="woocommerce-checkout-review-order single_step">
                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
            </div>

            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        </form>
    </div>
    <div class="checkout_cart">
        <?php render_shopping_cart(); ?>
    </div>
</div>
<style>
	body.woocommerce-checkout .form_checkout_page_container .checkout_fields form #customer_details>.shipping_box>.woocommerce-shipping-fields, body.woocommerce-checkout .form_checkout_page_container .checkout_fields form #customer_details>.shipping_box>.woocommerce-additional-fields {
    display: block;
}
</style>