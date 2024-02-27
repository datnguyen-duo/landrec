<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'shop' );
$post_id = get_the_ID();
$product = wc_get_product( $post_id );
$categories = get_the_terms( $post_id, 'product_cat' );
$gallery = $product->get_gallery_image_ids();
$product_image = get_the_post_thumbnail(get_the_ID(), 'large');
$product_model_number = get_field('model_number');
$product_desc = $product->get_description();
$product_short_desc = $product->get_short_description();

$product_info_description = get_field('product_info_description');
$product_info_icons = get_field('product_info_icons');
$instalation_info_description = get_field('instalation_info_description');
$warranty_and_certificates_description = get_field('warranty_and_certificates_description');
$cad_files_and_pdfs_description = get_field('cad_files_and_pdfs_description');
$cart_popup_description = get_field('cart_popup_description', 'option');

?>
    <div class="single-product-page-container">
        
        <?php
        /**
         * woocommerce_before_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         */
//        do_action( 'woocommerce_before_main_content' );
        ?>
        <section class="hero-section">
            <div class="product-gallery-holder">
                <?php if( $gallery ): ?>
                    <div class="product-gallery">
                        <div class="swiper product-gallery-swiper">
                            <div class="swiper-wrapper">
                                <?php foreach( $gallery as $image_id ): ?>
                                    <div class="swiper-slide">
                                        <div class="slide-content">
                                            <div class="image-holder single-product-popup-opener">
                                                <?= wp_get_attachment_image( $image_id,'lrage') ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="product-swiper-button product-swiper-button-prev button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-dark.svg' ?>" alt="arrow-icon">
                            </div>
                            <div class="product-swiper-button product-swiper-button-next button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-dark.svg' ?>" alt="arrow-icon">
                            </div>
                        </div>
                    </div>
                <?php elseif( $product_image ): ?>
                    <div class="product-image">
                        <div class="image-holder">
                            <?= $product_image; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="product-info-holder">
                <div class="product-info">
                    <div class="basic-product-info">
                        <h1><?php the_title() ?></h1>

                        <div class="secondary-info">
                            <?php if( $product_model_number ): ?>
                                <p><?= $product_model_number ?></p>
                            <?php endif; ?>

                            <?php if( $product->get_price() ): ?>
                                <p class="price"><?= wc_price($product->get_price()) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if( $product_desc ): ?>
                        <div class="description">
                            <?= $product_desc; ?>
                        </div>
                    <?php endif;

                    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
                    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
                    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
                    // do_action( 'woocommerce_single_product_summary' );
                    ?>
                    <!-- <div class="payment-options-holder">
                        <div class="payment-options">
                            <div class="payment-options-content">
                                <p>We accept: </p>

                                <div class="icons-holder">
                                    <div class="single-payment-icon">
                                        <img src="<?= get_template_directory_uri() ?>/src/images/icons/product/american_express.svg" alt="American Express">
                                    </div>
                                    <div class="single-payment-icon">
                                        <img src="<?= get_template_directory_uri() ?>/src/images/icons/product/discover.svg" alt="Disover">
                                    </div>
                                    <div class="single-payment-icon">
                                        <img src="<?= get_template_directory_uri() ?>/src/images/icons/product/matercard.svg" alt="Master Card">
                                    </div>
                                    <div class="single-payment-icon">
                                        <img src="<?= get_template_directory_uri() ?>/src/images/icons/product/visa.svg" alt="Visa">
                                    </div>
                                    <div class="single-payment-icon">
                                        <img src="<?= get_template_directory_uri() ?>/src/images/icons/product/paypall.svg" alt="Pay Pall">
                                    </div>
                                    <div class="single-payment-icon">
                                        <img src="<?= get_template_directory_uri() ?>/src/images/icons/product/z.svg" alt="z">
                                    </div>
                                    <div class="single-payment-icon">
                                        <img src="<?= get_template_directory_uri() ?>/src/images/icons/product/crypto.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>

                            <?php if($cart_popup_description): ?>
                                <div class="cart-finance-description">
                                    <?php echo $cart_popup_description; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div> -->

                    <div class="product-details">
                        <?php if(
                                $product_info_description ||
                                $product_info_icons ||
                                $instalation_info_description ||
                                $warranty_and_certificates_description ||
                                $cad_files_and_pdfs_description
                        ): ?>
                        <div class="product-details-header">
                            <h2>Details</h2>

                            <div class="buttons-holder product-info-tab-navigation">
                                <div class="product-info-tab-navigation-btn prev">
                                    <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-dark.svg' ?>" alt="arrow-icon">
                                </div>
                                <div class="product-info-tab-navigation-btn next">
                                    <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-dark.svg' ?>" alt="arrow-icon">
                                </div>
                            </div>
                        </div>

                        <ul class="product-info-tabs-menu">
                            <?php if( $product_info_description || $product_info_icons ): ?>
                                <li data-target="product-info-tab-info" class="active">Product info</li>
                            <?php endif;
                            if( $instalation_info_description ): ?>
                                <li data-target="product-info-tab-installation-info">Installation Info</li>
                            <?php endif;
                            if( $warranty_and_certificates_description ): ?>
                                <li data-target="product-info-tab-warranty-certificates">Warranty & Certificates</li>
                            <?php endif;
                            if( $cad_files_and_pdfs_description ): ?>
                                <li data-target="product-info-tab-files">CAD Files & PDFs</li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>

                        <?php if($product_info_description || $product_info_icons): ?>
                            <div class="product-info-tab active" id="product-info-tab-info">
                                <?php if($product_info_description): ?>
                                    <?php echo $product_info_description; ?>
                                <?php endif; ?>

                                <?php if( $product_info_icons ): ?>
                                    <div class="product-info-icons-holder">
                                        <?php foreach( $product_info_icons as $index => $single_icon ): ?>
                                            <div class="single-icon-wrap <?= ( $index == 0 ) ? ' active' : null ?>" data-target="single-icon-description-<?= $index ?>">
                                                <div class="single-info-icon">
                                                    <?php if($single_icon): ?>
                                                        <img src="<?= get_template_directory_uri() ?>/src/images/icons/product/paypall.svg" alt="Pay Pall">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $product_info_icons ) : ?>
                                    <div class="product-info-icons-descriptions-holder">
                                        <?php foreach( $product_info_icons as $index => $item ): ?>
                                            <?php if( $item['icon_title'] || $item['icon_description'] ): ?>
                                            <div class="single-icon-description-wrap <?= ( $index == 0 ) ? ' active' : null ?>" id="single-icon-description-<?= $index ?>">
                                                <?php if( $item['icon_title'] ): ?>
                                                    <div class="icon-title"><?= $item['icon_title'] ?></div>
                                                <?php endif; ?>

                                                <?= $item['icon_description'] ?>
                                            </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif;

                        if($instalation_info_description): ?>
                            <div class="product-info-tab" id="product-info-tab-installation-info">
                                <?php echo $instalation_info_description; ?>
                            </div>
                        <?php endif;

                        if($warranty_and_certificates_description): ?>
                            <div class="product-info-tab" id="product-info-tab-warranty-certificates">
                                <?php echo $warranty_and_certificates_description; ?>
                            </div>
                        <?php endif;

                        if($cad_files_and_pdfs_description): ?>
                            <div class="product-info-tab" id="product-info-tab-files">
                                <?php echo $cad_files_and_pdfs_description; ?>
                            </div>
                        <?php endif; ?>

                        <a class="site-button" href="/contact/#custom-projects">Request Pricing</a>
                    </div>
                </div>
            </div>

        </section>

        <div class="single_product_bottom_section">
            <?php

            $current_post_categories_slugs = array();

            if( $categories ) {
                foreach ( $categories as $category ) {
                    array_push( $current_post_categories_slugs, $category->term_id );
                }
            }

            $similar_posts_args = array(
                'post_type' => 'product',
                'posts_per_page' => 4,
                'post__not_in' => array( $post_id ),
                'post_status' => array( 'publish' ),
                'tax_query' => array()
            );

            if( $current_post_categories_slugs ) {
                $similar_posts_args['tax_query'] = array(
                    array (
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' =>  $current_post_categories_slugs
                    )
                );
            }

            $similar_posts = new WP_Query( $similar_posts_args );

            if( $current_post_categories_slugs && !$similar_posts->have_posts() ) {
                //If there is no products with the same categories show latest posts
                $similar_posts_args['tax_query'] = array();
                $similar_posts = new WP_Query( $similar_posts_args );
            }

            if( $similar_posts->have_posts() ): ?>
                <section class="similar-posts-section">
                    <div class="section-content">
                        <h2 class="section-title">Related Products</h2>

                        <div class="posts">
                            <div class="post">
                                <?php while( $similar_posts->have_posts() ): $similar_posts->the_post(); ?>
                                    <div class="card">
                                        <div class="card-content">
                                            <?php get_template_part('template-parts/post') ?>
                                        </div>
                                    </div>
                                <?php endwhile; wp_reset_postdata() ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php get_template_part('template-parts/img-with-desc',null, array(
                'data' => get_field('single_product_image_with_description_section','option'),
                'border' => array(
                    'color' => '#06B6B3',
                    'background-color' => '#F0F0F0',
                )
            ))
            ?>
        </div>

        <?php if( $gallery ): ?>
        <div class="single-product-gallery-popup">
            <div class="popup-header">
                <div class="popup-logo">
                    <img src="<?= get_template_directory_uri().'/src/images/logo-light.svg' ?>" alt="logo">
                </div>

                <div class="close-popup button-circle">
                    <img src="<?= get_template_directory_uri().'/src/images/icons/x.svg' ?>" alt="x-icon">
                </div>
            </div>

            <div class="gallery-popup-content">
                <div class="gallery-swiper single-product-popup-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach( $gallery as $image_id ): ?>
                            <div class="swiper-slide">
                                <div class="slide-content">
                                    <div class="image-holder">
                                        <?= wp_get_attachment_image( $image_id,'large') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="swiper-controls">
                <div class="button-holder">
                    <div class="single-product-popup-button single-product-popup-swiper-btn-prev button-circle">
                        <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-dark.svg' ?>" alt="arrow-icon">
                    </div>
                </div>

                <div class="pagination-holder">
                    <div class="single-product-popup-swiper-pagination"></div>
                </div>

                <div class="button-holder">
                    <div class="single-product-popup-button single-product-popup-swiper-btn-next button-circle">
                        <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-dark.svg' ?>" alt="arrow-icon">
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>


        <?php
        /**
         * woocommerce_after_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action( 'woocommerce_after_main_content' );
        ?>
    </div>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

