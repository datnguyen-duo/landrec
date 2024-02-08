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

    <?php
       get_template_part('template-parts/hero',null, array(
        'data' => array(
            'title' => get_the_title( get_option('page_for_posts')),
            'button' => null,
            'files' => null,
            'image' => get_the_post_thumbnail(get_option('page_for_posts')),
        )
    )) ?>
    
    <section class="posts-section">
        <form class="section-content" id="posts-form">
            <input type="hidden" name="action" value="posts_filter">
            <input type="hidden" name="page" value="1" id="posts-page-input">
            <div id="posts-response">
                <?php print_posts() ?>
            </div>
        </form>
    </section>

    <?php get_template_part('template-parts/img-with-desc', null, array(
        'data' => get_field('image_with_description_section', get_option('page_for_posts')),
        'border' => array(
            'color' => '#06B6B3',
            'background-color' => '#F0F0F0',
        )
    ))
    ?>
</div>
<?php get_footer(); ?>