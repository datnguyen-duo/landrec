<?php get_header();
$categories = get_the_terms(get_the_ID(), 'category');
$post_id = get_the_ID();

?>
<div class="single-post-page-container">
    <section class="hero-section">
        <?= get_the_post_thumbnail(get_the_ID(),'full', array('class'=>'section-background')) ?>

        <div class="section-content">
            <?php section_title( get_the_title() ) ?>
        </div>
    </section>

    <?php while( have_posts() ): the_post(); ?>
        <section class="post-editor-section">
            <div class="section-content">
                <div class="editor">
                    <?php the_content() ?>
                </div>
            </div>
        </section>

        <section class="share-section">
            <div class="section-content">
                <p>Share on social</p>
                <?php echo do_shortcode( '[addtoany url="'.get_the_permalink().'" title="'.get_the_title().'"]' );  ?>
            </div>
        </section>
    <?php endwhile; ?>

    <?php
    $current_post_categories_slugs = array();

    if( $categories ) {
        foreach ( $categories as $category ) {
            array_push( $current_post_categories_slugs, $category->slug );
        }
    }

    $similar_posts_args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post__not_in' => array( $post_id ),
        'post_status' => array( 'publish' ),
        'tax_query' => array()
    );

    if( $current_post_categories_slugs ) {
        $similar_posts_args['tax_query'] = array(
            array (
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' =>  $current_post_categories_slugs
            )
        );
    }

    $similar_posts = new WP_Query( $similar_posts_args );

    if( $current_post_categories_slugs && !$similar_posts->have_posts() ) {
        //If there is no posts with the same categories show latest posts
        $similar_posts_args['tax_query'] = array();
        $similar_posts = new WP_Query( $similar_posts_args );
    }

    if( $similar_posts->have_posts() ): ?>
        <section class="similar-posts-section">
            <div class="section-content">
                <h2 class="section-title">Similar Ideas</h2>

                <div class="posts">
                    <div class="cards-swiper">
                        <div class="swiper-wrapper">
                            <?php while( $similar_posts->have_posts() ): $similar_posts->the_post(); ?>
                                <div class="swiper-slide">
                                    <div class="slide-content">
                                        <?php get_template_part('template-parts/post') ?>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata() ?>
                        </div>
                    </div>
                    <div class="slider-buttons">
                        <div class="cards-swiper-button cards-swiper-button-prev button-circle">
                            <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-dark.svg' ?>" alt="">
                        </div>
                        <div class="cards-swiper-button cards-swiper-button-next button-circle">
                            <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-dark.svg' ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part('template-parts/img-with-desc',null, array(
        'data' => get_field('image_with_description_section', get_option('page_for_posts')),
        'border' => array(
            'color' => '#06b6b3',
            'background-color' => '#f0f0f0',
        )
    )) ?>
</div>
<?php get_footer(); ?>