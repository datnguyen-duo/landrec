<?php get_header();
$categories = get_the_terms(get_the_ID(), 'project-category');
$post_id = get_the_ID();

$hero_section = get_field('hero_section', $post_id);

$projects = get_field('projects', $post_id); ?>
    <div class="single-project-page-container">
        <?php
        get_template_part('template-parts/hero',null, array(
            'data' => array(
                'title' => get_the_title(),
                'button' => null,
                'files' => null,
                'image' => get_the_post_thumbnail(),
            ),
            'border' => array(
                'color' => '#FBE681',
            )
        )) ?>

        <?php
        $gallery = get_field('project_gallery');
        if( $gallery ): ?>
        <section class="project-gallery-section">
            <?php
            $g_client = get_field('client', $post_id);
            $g_collaboration = get_field('collaboration', $post_id);
            $g_location = get_field('location', $post_id);

            if( $g_client || $g_collaboration || $g_location ): ?>
            <div class="project-gallery-section__info">
                <?php if( $g_client ): ?>
                    <div class="gallery-text">
                        <p>Client</p>
                        <p><?= $g_client ?></p>
                    </div>
                <?php endif; ?>

                <?php if( $g_collaboration ): ?>
                    <div class="gallery-text">
                        <p>Collaboration</p>
                       <p><?= $g_collaboration ?></p>
                    </div>
                <?php endif; ?>

                <?php if( $g_location ): ?>
                    <div class="gallery-text">
                        <p>Location</p>
                        <p><?= $g_location ?></p>
                    </div>
                <?php endif; ?>

                

            </div>
            <?php endif; ?>

            <div class="swiper project-gallery-section__images">
                <div class="swiper-wrapper">
                    <?php foreach( $gallery as $item ): ?>
                        <div class="swiper-slide">
                            <?= wp_get_attachment_image($item['image']['ID'],'large','') ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        

        <?php
        $blocks = get_field('blocks');
        if( $blocks ): ?>
            <section class="blocks-section">
                <?php foreach ( $blocks as $block ): ?>
                    <div class="block">
                        <div class="block-info">
                            <div class="block-info-content">
                                <?php section_title( $block['title'],'block-title' );
                                section_desc( $block['description'],'block-description' ); ?>
                            </div>
                        </div>

                        <div class="image">
                            <?= wp_get_attachment_image($block['image']['id'],'large') ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <?php

        $similar_posts_args = array(
            'post_type' => 'projects',
            'posts_per_page' => 4,
            'post__not_in' => array( $post_id ),
            'post_status' => array( 'publish' ),
            'tax_query' => array()
        );

        $similar_posts = new WP_Query( $similar_posts_args );

        if( $similar_posts->have_posts() ): ?>
            <section class="similar-projects-section">
                <div class="section-content">
                    <h2 class="section-title">Recent Projects</h2>

                    <div class="projects">
                        <?php while( $similar_posts->have_posts() ): $similar_posts->the_post(); 
                        ?>
                            <div class="project-holder">
                                <?php get_template_part('template-parts/project') ?>
                            </div>

                        <?php  endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="form-section">
            <?php wave_border('#06B6B3','#f0f0f0') ?>
            <h2 class="section-title">Have A Custom Project In Mind?</h2>
            <div class="form-holder">
                <?= do_shortcode('[contact-form-7 id="255" title="Contact form 1"]') ?>
            </div>
        </section>
    </div>
<?php get_footer(); ?>