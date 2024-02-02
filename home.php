<?php get_header();
$posts_args = array(
    'post_type' => 'post',
    'posts_per_page' => -1
);
$posts = new WP_Query($posts_args);

$post_categories = get_terms(array(
    'taxonomy' => 'category'
));
?>
<div class="posts-page-container">
    <?php get_template_part('template-parts/hero',null, array(
        'data' => get_field('hero_section', get_option('page_for_posts') ),
        'border' => array(
            'color' => '#FFA3C3',
            'background-color' => '#06B6B3',
        )
    )) ?>

    <section class="posts-section">
        <form class="section-content" id="posts-form">
            <input type="hidden" name="action" value="posts_filter">
            <input type="hidden" name="page" value="1" id="posts-page-input">

            <div class="posts-filters-desktop">
                <div class="filters-title">Filter By</div>

                <div class="filters">
                    <div class="filter-option">
                        <select name="sort" id="sort" data-class="outline-select" data-placeholder="Sort">
                            <option></option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                        </select>
                    </div>

                    <?php if( $post_categories ): ?>
                        <div class="filter-option">
                            <select name="category" id="category" data-placeholder="Category One">
                                <option></option>
                                <?php foreach ( $post_categories as $category ): ?>
                                    <option value="<?= $category->slug ?>"><?= $category->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="filter-option">
                        <select name="filter-option-2" id="filter-option-2" data-placeholder="Filter option">
                            <option></option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                        </select>
                    </div>

                    <div class="filter-option">
                        <select name="filter-option-3" id="filter-option-3" data-placeholder="Filter option">
                            <option></option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                        </select>
                    </div>

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
                                    Filter By
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
                                <div class="filter-option">
                                    <select name="filter-option-1-m" id="filter-option-1-m" data-placeholder="Filter option 1">
                                        <option></option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                    </select>
                                </div>

                                <div class="filter-option">
                                    <select name="filter-option-2-m" id="filter-option-2-m" data-placeholder="Filter option 2">
                                        <option></option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                    </select>
                                </div>

                                <div class="filter-option">
                                    <select name="filter-option-3-m" id="filter-option-3-m" data-placeholder="Filter option 3">
                                        <option></option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="submit-button-holder">
                            <button type="button" class="site-button dark-button submit-mobile-filters-button">Apply</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="posts-response">
                <?php print_posts() ?>
            </div>
        </form>
    </section>

    <?php get_template_part('template-parts/img-with-desc',null, array(
        'data' => get_field('image_with_description_section', get_option('page_for_posts')),
        'border' => array(
            'color' => '#FFA3C3',
            'background-color' => '#06B6B3',
        )
    ))
    ?>
</div>
<?php get_footer(); ?>