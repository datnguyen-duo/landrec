<?php
get_header();
$products_args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'post_status' => array( 'publish' ),
    'tax_query' => array(),
);

$products = new WP_Query($products_args);

$products_categories = get_terms(array(
    'taxonomy' => 'product_cat'
));

$products_type = get_terms(array(
    'taxonomy' => 'product-type'
));

$product_material = get_terms(array(
    'taxonomy' => 'product-material'
));

$filter_section_headline = get_field('filter_section_headline', wc_get_page_id( 'shop' ));
$filter_section_description = get_field('filter_section_description', wc_get_page_id( 'shop' ));

?>
<div class="products-page-container">
    <?php
    get_template_part('template-parts/hero',null, array(
        'data' => array(
            'title' => get_field('hero_section', wc_get_page_id( 'shop' ) )['title'],
            'description' => get_field('hero_section', wc_get_page_id( 'shop' ) )['description'],
            'button' => null,
            'image' => get_the_post_thumbnail(wc_get_page_id( 'shop' )),
        ),
        'border' => get_field('hero_section', wc_get_page_id( 'shop' ) ),
    ))
    ?>

    <section class="products-section">
        <form class="section-content" id="products-form">
            <input type="hidden" name="action" value="products_filter">
            <div id="products-response">
                <?php print_products() ?>
            </div>
        </form>
    </section>

    <section class="cta">
    <?php section_title( get_field('headline', wc_get_page_id( 'shop' )) ) ?>

    <?php if( get_field('button', wc_get_page_id( 'shop' )) ) :?>
        <div class="button-holder">
            <?php button( get_field('button', wc_get_page_id( 'shop' )) ) ?>
        </div>
    <?php endif; ?>
    </section>

    <?php get_template_part('template-parts/img-with-desc',null, array(
        'data' => get_field('image_with_description_section', wc_get_page_id( 'shop' )),
        'border' => array(
            'color' => '#06B6B3',
        )
    ))
    ?>
</div>
<?php get_footer(); ?>
