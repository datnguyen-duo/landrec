<?php
$products_per_page = -1;
function products_filter() {
    /*
    TODO uncomment and replace category_name_1 and taxonomy-name-1 with the real taxonomy
    */
    $products_categorie = $_GET['age-range'];
    $products_type = $_GET['product-type'];
    $products_material = $_GET['material-type'];
    $sort = $_GET['sort'];

    $products_args = array(
        'post_type' => 'product',
        'post_status' => array( 'publish' ),
        'posts_per_page' => $GLOBALS['products_per_page'],
        'tax_query' => array(
            'relation' => 'AND',
        )
    );

//    Example for taxonomy filtration
    if( $products_categorie ) {
        array_push($products_args['tax_query'],array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $products_categorie
        ));
    }

    if( $products_type ) {
        array_push($products_args['tax_query'],array(
            'taxonomy' => 'product-type',
            'field' => 'slug',
            'terms' => $products_type
        ));
    }

    if( $products_material ) {
        array_push($products_args['tax_query'],array(
            'taxonomy' => 'product-material',
            'field' => 'slug',
            'terms' => $products_material
        ));
    }

    if( $sort == 'sales' ) {
        $products_args['orderby'] = 'meta_value_num';
        $products_args['meta_key'] = 'total_sales';
    } elseif( $sort == 'asc' ) {
        $products_args['orderby'] = 'meta_value_num';
        $products_args['meta_key'] = '_price';
        $products_args['order'] = 'asc';
    }elseif( $sort == 'desc' ) {
        $products_args['orderby'] = 'meta_value_num';
        $products_args['meta_key'] = '_price';
        $products_args['order'] = 'desc';
    }

    $products = new WP_Query($products_args);

    print_products($products);
    die;
}
add_action('wp_ajax_products_filter', 'products_filter');
add_action('wp_ajax_nopriv_products_filter', 'products_filter');

function print_products( $query = '' ) {
    if( !$query ) {
        $query = new WP_Query(array(
            'post_type' => 'product',
            'post_status' => array( 'publish' ),
            'posts_per_page' => $GLOBALS['products_per_page'],
        ));
    }
    if( $query->have_posts() ): ?>
        <div class="products">
            <?php while( $query->have_posts() ): $query->the_post() ?>
                <div class="product-holder">
                    <?php get_template_part('template-parts/product') ?>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    <?php else: ?>
        <div class="no-results">
            <h2>No products found.</h2>
        </div>
    <?php endif;
}