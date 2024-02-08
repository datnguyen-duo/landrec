<?php
/* Template Name: Design */
get_header(); 

$choice = get_field('choose_section');
?>
    <div class="design-page-container">
        <?php
        $blocks = get_field('blocks');
        $borderBgColor = '';
        $borderColor = get_field('hero_section');

        get_template_part('template-parts/hero',null, array(
            'data' => array(
                'title' => get_field('hero_section')['title'],
                'button' => null,
                'files' => null,
                'image' => get_the_post_thumbnail(),
            )
        ));

        $desc_s = get_field('description_section');
        if( $desc_s['title'] || $desc_s['description'] ): ?>
        <section class="description-section">
            <div class="section-content">
                <?php section_title( $desc_s['title'] );
                section_desc( $desc_s['description'] ) ?>
            </div>
        </section>
        <?php endif;

        if( $blocks ): ?>
            <section class="blocks-section">
                <div class="blocks">
                    <?php foreach ( $blocks as $block ): ?>
                        <div class="block">
                            <div class="block-info">
                                <?php if($block['icon']): ?>
                                    <div class="block-icon slide-up-element">
                                        <img src="<?php echo $block['icon']['url']; ?>" alt="<?php echo $block['icon']['alt']; ?>">
                                    </div>
                                <?php endif; ?>
                                <?php section_title( $block['title'],'block-title' );
                                echo $block['subtitle'] ? '<h3 class="block-subtitle">'. $block['subtitle']. '</h3>' : '';
                                section_desc( $block['description'],'block-description' );
                                button( $block['button'] , 'block-button')
                                ?>
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

        <?php if ($choice == 'cards') : 
            $headline = get_field('section_headline');
            $cards = get_field('cards');
            ?>
            <section class="cards section__bottom">
                <?php if ($headline): ?>
                    <h2 class="cards__headline"><?php echo $headline; ?></h2>
                <?php endif; ?>

                <?php if ($cards): ?>
                    <div class="cards__container">
                        <?php foreach ($cards as $card): ?>
                            <div class="card">
                                <div class="card__image">
                                    <?php echo wp_get_attachment_image($card['image'], array('430','auto'))?>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><?php echo $card['title']; ?></h3>
                                    <p class="card__description"><?php echo $card['text']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </section>

        <?php elseif ($choice == 'cards-headline') : 
            $cards_headline = get_field('headline_cards')['headline'];
            $cards_h = get_field('headline_cards')['cards'];
            ?>

            <section class="cards-h section__bottom">
                <?php if ($cards_headline): ?>
                    <h2 class="cards-h__headline"><?php echo $cards_headline; ?></h2>
                <?php endif; ?>
                
                <?php if ($cards_h): ?>
                    <div class="cards-h__container">
                        <?php foreach ($cards_h as $card): ?>
                            <div class="card">
                                <div class="card__image">
                                    <?php echo wp_get_attachment_image($card['icon']['id'], array('50','auto'))?>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><?php echo $card['title']; ?></h3>
                                    <div class="card__description"><?php echo $card['text']; ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>

        <?php elseif ($choice == 'quote'): ?>
            <section class="quote-section section__bottom">
                <div class="section-content">
                    <h2 class="section-title"><?php echo get_field("second_quote_description"); ?></h2>
                </div>
            </section>
        <?php endif; ?>

        <?php

        if (!get_field('hide')) {
            get_template_part('template-parts/img-with-desc',null, array(
                'data' => get_field('image_with_description_section'),
                'border' => array(
                    'color' => '#06B6B3',
                    'background-color' => '#F0F0F0'
                )
            ));
        } ?>
    </div>
<?php get_footer(); ?>