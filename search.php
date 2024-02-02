<?php
get_header();
global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$the_query = new WP_Query($search_query);

if ( $the_query->have_posts() ) : ?>
    <div class="search-wrap">
        <div class="search-result">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<!--                <div class="single-search-item">-->
<!--                    <div class="image_holder">-->
<!--                        --><?//= get_the_post_thumbnail(get_the_ID(),'large') ?>
<!--                    </div>-->
<!--                    <a href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a>-->
<!--                </div>-->
                <div class="search-holder">
                    <?php get_template_part('template-parts/project') ?>
                </div>
            <?php endwhile; ?>
        </div>

        <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <div class="no-posts-wrap">
                <div class="no-posts-wrap-content">
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <a href="/" class="site-button">Back To Home</a>
                </div>

            </div>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>
