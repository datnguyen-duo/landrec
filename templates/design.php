<?php
/* Template Name: Design */
get_header(); ?>
    <div class="design-page-container">
        <?php
        $blocks = get_field('blocks');
        $borderBgColor = '';
        $borderColor = get_field('hero_section');

        if( $blocks ) {
            $borderBgColor = $blocks[0]['background_color'];
        }

        get_template_part('template-parts/hero',null, array(
            'data' => get_field('hero_section'),
            'border' => array(
                'background-color' => $borderBgColor,
                'color' => $borderColor['color']
            )
        ));

        if( $blocks ): ?>
            <section class="blocks-section">
                <div class="background-fill top" style="background-color: <?= $blocks[0]['background_color'] ?>;"></div>
                <div class="background-fill bottom" style="background-color: <?= $blocks[sizeof($blocks)-1]['background_color'] ?>;"></div>

                <div class="blocks">
                    <?php foreach ( $blocks as $block ): ?>
                        <div class="block" style="background-color: <?= $block['background_color'] ?>" <?php if($block['block_id']):?>id="<?php echo $block['block_id'] ?>"<?php endif; ?> >

                            <div class="block-info">
                                <?php if($block['icon']): ?>
                                    <div class="block-icon slide-up-element">
                                        <img src="<?php echo $block['icon']['url']; ?>" alt="<?php echo $block['icon']['alt']; ?>">
                                    </div>
                                <?php endif; ?>

                                <?php section_title( $block['title'],'block-title' );
                                section_desc( $block['description'],'block-description' );
                                button( $block['button'],'block-button' ); ?>
                            </div>
                            <div class="image-holder">
                                <div class="image">
                                    <?= wp_get_attachment_image($block['image']['id'],'large') ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php
        $borderBgColor = '';

        if( $blocks ) {
            $borderBgColor = $blocks[sizeof($blocks) - 1]['background_color'];
        }

        get_template_part('template-parts/img-with-desc',null, array(
            'data' => get_field('image_with_description_section'),
            'border' => array(
                'color' => '#FFA3C3',
                'background-color' => $borderBgColor
            )
        )) ?>
    </div>
<?php get_footer(); ?>