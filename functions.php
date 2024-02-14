<?php
if ( ! function_exists( 'site_setup' ) ):
    function site_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'woocommerce' );

        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Primary', 'landrec' ),
                'menu-2' => esc_html__( 'Secondary', 'landrec' ),
                'menu-3' => esc_html__( 'Footer', 'landrec' ),
                'menu-4' => esc_html__( 'Primary - Mobile', 'landrec' ),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'site_setup' );

function site_scripts() {
    wp_enqueue_style('site-style', get_theme_file_uri('/build/style-index.css'), array(), '1.8', false);
    wp_enqueue_script('main-js-file', get_theme_file_uri('/build/index.js'), array(), '1.8', true);
    wp_localize_script('main-js-file','site_data',array(
        'site_url' => site_url(),
        'theme_url' => get_template_directory_uri(),
    ));
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );

require_once('inc/post-types.php');
require_once('inc/acf.php');
require_once('inc/woocommerce-custom-cart.php');
require_once('inc/blog-filter.php');
require_once('inc/products-filter.php');
require_once('inc/projects-filter.php');
require_once('inc/taxonomies.php');
require_once('inc/icons.php');
require_once('inc/functions.php');
require_once('inc/checkout-checkbox.php');