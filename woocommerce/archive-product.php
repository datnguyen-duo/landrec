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
        'data' => get_field('hero_section', wc_get_page_id( 'shop' ) ),
        'border' => get_field('hero_section', wc_get_page_id( 'shop' ) ),
    ))
    ?>

    <section class="products-section">
        <form class="section-content" id="products-form">
            <input type="hidden" name="action" value="products_filter">

            <?php if($filter_section_headline): ?>
                <h2 class="section-title"><?php echo $filter_section_headline; ?></h2>
            <?php endif; ?>

            <?php if($filter_section_description): ?>
                <div class="section-description">
                    <p><?php echo $filter_section_description; ?></p>
                </div>
            <?php endif; ?>

            <div class="posts-filters-desktop">
                <div class="filters-title">Filter</div>

                <div class="filters">
                    <div class="filter-option">
                        <select name="sort" id="sort" data-class="outline-select" data-placeholder="Sort">
                            <option></option>
                            <option value="sales">Most Popular</option>
                            <option value="asc">Price: Low To High</option>
                            <option value="desc">Price: High To Low</option>
                        </select>
                    </div>

                    <?php if( $products_categories ): ?>
                        <div class="filter-option">
                            <select name="age-range" id="age-range" data-placeholder="Age range">
                                <option></option>
                                <?php foreach ( $products_categories as $category ): ?>
                                    <option value="<?= $category->slug ?>"><?= $category->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <?php if( $products_type ): ?>
                        <div class="filter-option">
                            <select name="product-type" id="product-type" data-placeholder="Product type">
                                <option></option>
                                <?php foreach ( $products_type as $category ): ?>
                                    <option value="<?= $category->slug ?>"><?= $category->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>


                    <?php if( $product_material ): ?>
                    <div class="filter-option">
                        <select name="material-type" id="material-type" data-placeholder="Material type">
                            <option></option>
                            <?php foreach ( $product_material as $category ): ?>
                                <option value="<?= $category->slug ?>"><?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php endif; ?>

                    <div class="filter-option">
                        <p class="clear-filter">Clear filters</p>
                    </div>
                </div>
            </div>

            <div class="posts-filters-mobile">
                <div class="buttons-holder opener-buttons-holder">
                    <div class="button-holder">
                        <div class="filters-button mobile-menu-opener sort-by-button" data-menu="mobile-menu-1" data-id="sort">
                            Sort
                        </div>
                    </div>
                    <div class="button-holder">
                        <div class="filters-button mobile-menu-opener filter-by-button" data-menu="mobile-menu-2" data-id="filter-by">
                            Filter
                        </div>
                    </div>
                </div>

                <div class="mobile-posts-filters-menu">
                    <div class="mobile-filters-menu-content">
                        <div class="buttons-holder">
                            <div class="button-holder">
                                <div class="filters-button mobile-menu-opener sort-by-button" data-menu="mobile-menu-1" data-id="sort">
                                    Sort
                                </div>
                            </div>
                            <div class="button-holder">
                                <div class="filters-button mobile-menu-opener filter-by-button" data-menu="mobile-menu-2" data-id="filter-by">
                                    Filter
                                </div>
                            </div>
                        </div>

                        <div class="mobile-menu mobile-menu-1">
                            <div class="mobile-filters-menu-title">Sort</div>

                            <div class="filters-options">
                                <div class="filter-option">
                                    <label class="filters-button">
                                        <input type="radio" name="sort">
                                        <span>Most popular</span>
                                    </label>
                                </div>

                                <div class="filter-option">
                                    <label class="filters-button">
                                        <input type="radio" name="sort">
                                        <span>Price: Low To High</span>
                                    </label>
                                </div>

                                <div class="filter-option">
                                    <label class="filters-button">
                                        <input type="radio" name="sort">
                                        <span>Price: High To Low</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mobile-menu mobile-menu-2">
                            <div class="mobile-filters-menu-title">Filter</div>

                            <div class="filter-options">
                                <?php if( $products_categories ): ?>
                                    <div class="filter-option">
                                        <select name="age-range" id="age-range-m" data-placeholder="Age range">
                                            <option></option>
                                            <?php foreach ( $products_categories as $category ): ?>
                                                <option value="<?= $category->slug ?>"><?= $category->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <?php if( $product_material ): ?>
                                    <div class="filter-option">
                                        <select name="material-type" id="material-type-m" data-placeholder="Material type">
                                            <option></option>
                                            <?php foreach ( $product_material as $category ): ?>
                                                <option value="<?= $category->slug ?>"><?= $category->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <?php if( $products_type ): ?>
                                    <div class="filter-option">
                                        <select name="product-type" id="product-type-m" data-placeholder="Product type">
                                            <option></option>
                                            <?php foreach ( $products_type as $category ): ?>
                                                <option value="<?= $category->slug ?>"><?= $category->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="submit-button-holder">
                            <button type="button" class="site-button dark-button submit-mobile-filters-button">Apply</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="products-response">
                <?php print_products() ?>
            </div>
        </form>
    </section>

    <?php get_template_part('template-parts/img-with-desc',null, array(
        'data' => get_field('image_with_description_section', wc_get_page_id( 'shop' )),
        'border' => array(
            'color' => '#FFA3C3',
        )
    ))
    ?>
</div>
<?php get_footer(); ?>
