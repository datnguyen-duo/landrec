<?php
/* Template Name: Contact */
get_header(); ?>
    <div class="contact-page-container">
        <?php
        get_template_part('template-parts/hero',null, array(
            'data' => array(
                'image' => get_the_post_thumbnail(),
                'title' => get_field('hero_section')['title'],
            ),
            'border' => array(
                'color' => '#FFA3C3',
                'background-color' => '#013250'
            )
        ));

        $contact_s = get_field('contact_section');
        if( $contact_s['title'] || $contact_s['contacts'] || $contact_s['forms'] ): ?>
        <section class="form-section">
            <?php if( $contact_s['title'] || $contact_s['contacts'] ): ?>
                <div class="section-header">
                    <?php if( $contact_s['title'] ): ?>
                        <h2 class="section-title"><?= $contact_s['title'] ?></h2>
                    <?php endif; ?>

                    <?php if( $contact_s['contacts'] ): ?>
                        <div class="contacts">
                            <?php foreach( $contact_s['contacts'] as $contact ): ?>
                                <?php
                                $link = $contact['contact'];
                                if( $link ):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <div class="contact">
                                        <a class="button" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                            <?= esc_html( $link_title ); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if( $contact_s['forms'] ): ?>
                <div class="forms">

                    <div class="forms-filter">
                        <?php if( $contact_s['forms_title'] ): ?>
                            <h3 class="forms-filter-title"><?= $contact_s['forms_title'] ?></h3>
                        <?php endif; ?>

                        <div class="filters">
                            <?php foreach( $contact_s['forms'] as $index => $form ): ?>
                                <div class="button-holder">
                                    <button class="<?= ( $index == 0 ) ? 'active' : null ?>" data-target="contact-form-<?= $index ?>">
                                        <?= $form['form_title'] ?>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php foreach( $contact_s['forms'] as $index => $form ): ?>
                        <div class="form-holder <?= ( $index == 0 ) ? 'active' : null ?>" id="contact-form-<?= $index ?>">
                            <?= do_shortcode($form['form_shortcode'] ) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
        <?php endif; ?>

        <?php
        get_template_part('template-parts/img-with-desc',null, array(
            'data' => get_field('image_with_description_section'),
            'border' => array(
                'color' => '#06B6B3',
                'background-color' => '#f0f0f0'
            )
        )) ?>
    </div>
<?php get_footer(); ?>