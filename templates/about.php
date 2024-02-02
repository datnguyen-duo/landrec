<?php
/* Template Name: About */
get_header(); ?>
    <div class="about-page-container">
        <?php
        get_template_part('template-parts/hero',null, array(
            'data' => get_field('hero_section'),
        )); ?>

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
                    <div class="block" <?php if($block['block_id']):?>id="<?php echo $block['block_id'] ?>"<?php endif; ?>>
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
        $img_desc_s = get_field('image_with_description_section');
        $main_title_exists = $img_desc_s['title'];
        if( $img_desc_s['title'] ||
            $img_desc_s['image'] ||
            $img_desc_s['sub_title'] ||
            $img_desc_s['description'] ||
            $img_desc_s['button']
        ): ?>
            <section class="img-with-desc-section">
                <?php wave_border('#FFA3C3','#06B6B3') ?>
                <div class="section-content">
                    <?php section_title( $img_desc_s['title']) ?>

                    <div class="img-with-desc">
                        <div class="image-holder">
                            <div class="image">
                                <?= wp_get_attachment_image($img_desc_s['image']['id'],'large') ?>
                            </div>
                        </div>

                        <div class="info-holder">
                            <?php
                            $sub_title_class = ( $main_title_exists ) ? 'section-sub-title' : 'section-sub-title-big';
                            section_title( $img_desc_s['sub_title'], $sub_title_class);
                            section_desc( $img_desc_s['description'] );
                            button( $img_desc_s['button'] ) ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>