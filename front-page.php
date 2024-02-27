<?php get_header(); ?>
    <div class="front-page-container">
        <?php
        get_template_part('template-parts/hero',null, array(
            'data' => get_field('hero_section'),
        ))
        ?>

        <?php
        $desc_s = get_field('description_section');
        if( $desc_s['title'] || $desc_s['description'] ): ?>
        <section class="description-section">
            <div class="section-content">
                <?php section_title( $desc_s['title'] );
                section_desc( $desc_s['description'] ) ?>
            </div>
        </section>
        <?php endif; ?>

        <?php
        $blocks = get_field('blocks');
        if( $blocks ): ?>
        <section class="blocks-section">
            <?php foreach ( $blocks as $block ): ?>
            <div class="block" style="background-color: <?= $block['background_color'] ?>">
                <div class="block-info">
                    <?php section_title( $block['title'],'block-title' );
                    section_desc( $block['description'],'block-description' );
                    button( $block['button'], $block['button_hover_theme']) ?>
                </div>

                <div class="block-gallery">
                    <div class="mobile-image">
                        <div class="image">
                            <?= wp_get_attachment_image($block['image_1']['id'],'large') ?>
                        </div>
                    </div>

                    <div class="images">
                        <div class="col">
                            <div class="image image-1">
                                <?= wp_get_attachment_image($block['image_1']['id'],'large') ?>
                            </div>
                            <div class="image image-2">
                                <?= wp_get_attachment_image($block['image_2']['id'],'large') ?>
                            </div>
                        </div>

                        <div class="col">
                            <div class="image image-3">
                                <?= wp_get_attachment_image($block['image_3']['id'],'large') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
        <?php endif; ?>

        <?php
        $posts_s = get_field('posts_section');
        if( $posts_s['title'] || $posts_s['button'] || $posts_s['posts'] ): ?>
        <section class="posts-section">
            <div class="section-content">
                <?php section_title( $posts_s['title'] ) ?>

                <?php if( $posts_s['button'] ):?>
                    <div class="button-holder">
                        <?php button( $posts_s['button'] ) ?>
                    </div>
                <?php endif; ?>

                <?php if( $posts_s['posts'] ): ?>
                    <div class="posts">
                        <div class="cards-swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ( $posts_s['posts'] as $post ): setup_postdata($post); ?>
                                    <div class="swiper-slide">
                                        <div class="slide-content">
                                            <?php get_template_part('template-parts/post') ?>
                                        </div>
                                    </div>
                                <?php endforeach; wp_reset_postdata(); ?>
                            </div>
                        </div>

                        <div class="slider-buttons">
                            <div class="cards-swiper-button cards-swiper-button-prev button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-dark.svg' ?>" alt="arrow-icon">
                            </div>
                            <div class="cards-swiper-button cards-swiper-button-next button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-dark.svg' ?>" alt="arrow-icon">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php get_template_part('template-parts/img-with-desc',null, array(
            'data' => get_field('image_with_description_section_2'),
            'border' => array(
                'color' => '#06b6b3',
            )
        ))
        ?>
    </div>
<?php get_footer(); ?>