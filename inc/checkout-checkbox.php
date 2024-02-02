<?php

$checkout_checkbox_description = get_field('checkout_checkbox_description', 'option');
$checkout_checkbox_link = get_field('checkout_checkbox_link', 'option');

add_action( 'woocommerce_review_order_before_submit', 'bt_add_checkout_checkbox', 10 );
/**
 * Add WooCommerce additional Checkbox checkout field
 */
function bt_add_checkout_checkbox() {

    woocommerce_form_field( 'checkout_checkbox', array( // CSS ID
        'type'          => 'checkbox',
        'class'         => array('mycheckbox'), // CSS Class
        'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
        'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
        'required'      => true, // Mandatory or Optional
        'label'         => '<span class="checkbox-span"></span>Yes, I agree to privacy terms',
    ));
}

add_action( 'woocommerce_checkout_process', 'bt_add_checkout_checkbox_warning' );
/**
 * Alert if checkbox not checked
 */
function bt_add_checkout_checkbox_warning() {
    if ( ! (int) isset( $_POST['checkout_checkbox'] ) ) {
        wc_add_notice( __( 'Please check the privacy agreement' ), 'error' );
    }
}

add_action( 'woocommerce_checkout_update_order_meta', 'bt_checkout_field_order_meta_db' );
/**
 * Add custom field as order meta with field value to database
 */
function bt_checkout_field_order_meta_db( $order_id ) {
    if ( ! empty( $_POST['checkout_checkbox'] ) ) {
        update_post_meta( $order_id, 'checkout_checkbox', sanitize_text_field( $_POST['checkout_checkbox'] ) );
    }
}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'bt_checkout_field_display_admin_order_meta', 10, 1 );
/**
 * Display field value on the backend WooCOmmerce order
 */
function bt_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Checkout Checkbox Label').':</strong> ' . get_post_meta( $order->get_id(), 'checkout_checkbox', true ) . '<p>';
}
?>