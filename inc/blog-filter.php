<?php
//$per_page = get_option( 'posts_per_page' );
$per_page = 3;
function posts_filter() {
    /*
    TODO uncomment and replace category_name_1 and taxonomy-name-1 with the real taxonomy
    */
    $post_categories = $_GET['category'];

    $current_page = $_GET['page'];

    $posts_args = array(
        'post_type' => 'post',
        'post_status' => array( 'publish' ),
        'posts_per_page' => $GLOBALS['per_page'],
        'paged' => $current_page,
        'tax_query' => []
    );

//    Example for taxonomy filtration
    if( $post_categories ) {
        array_push($posts_args['tax_query'],array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $post_categories
        ));
    }

    $posts = new WP_Query($posts_args);

    print_posts($posts);
    die;
}
add_action('wp_ajax_posts_filter', 'posts_filter');
add_action('wp_ajax_nopriv_posts_filter', 'posts_filter');

function print_posts( $query = '' ) {
    if( !$query ) {
        $query = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => array( 'publish' ),
            'posts_per_page' => $GLOBALS['per_page'],
            'paged' => 1,
        ));
    }
    $posts_per_page = $query->query['posts_per_page'];
    $found_posts = $query->found_posts;
    $current_page = $query->query['paged'];
    $total_pages = ceil($found_posts / $posts_per_page);
    if( $query->have_posts() ): ?>
        <div class="posts">
            <?php while( $query->have_posts() ): $query->the_post();
                $categories = get_the_terms(get_the_ID(), 'category'); ?>
                <div class="post">
                    <div class="post-image">
                        <?= get_the_post_thumbnail(get_the_ID(), array('700', 'auto')) ?>
                    </div>
                    <div class="post-info-holder">
                        <h2 class="post-title"><?php the_title() ?></h2>
                        <p class="post-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 25, ' [...]' ); ?></p>
                        <a href="<?php the_permalink() ?>" class="site-button dark-button">Read More</a>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php if( $total_pages > 1 ): ?>
            <div class="posts-pagination">
                <div class="pagination-page next-prev-page prev-page" data-page="<?= ($current_page == 1) ? $total_pages : $current_page-1; ?>">
                    <div class="button-circle">
                        <img src="<?= get_template_directory_uri().'/src/images/icons/pagination-arrow.svg' ?>" alt="arrow-icon">
                    </div>
                </div>
                <div class="posts-pages">
                    <ul>
                        <?php for( $i=1; $i <= $total_pages; $i++ ): ?>
                            <li data-page="<?php echo $i; ?>" class="pagination-page <?= ($current_page == $i) ? ' active' : null; ?>"></li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <div class="pagination-page next-prev-page next-page" data-page="<?= ($current_page == $total_pages) ? 1 : $current_page+1; ?>">
                    <div class="button-circle">
                        <img src="<?= get_template_directory_uri().'/src/images/icons/pagination-arrow.svg' ?>" alt="arrow-icon">
                    </div>
                </div>
            </div>
        <?php endif;
    else: ?>
        <div class="no-results">
            <h2>No posts found.</h2>
        </div>
    <?php endif;
}