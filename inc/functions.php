<?php
function button( $link, $button_class = '' ) {
    if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
        <a class="site-button <?= $button_class ?>" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
            <?= esc_html( $link_title ); ?>
        </a>
    <?php endif;
}

function section_title( $title, $title_class = 'section-title' ) {
    if( $title ): ?>
        <h2 class="<?= $title_class ?> slide-up-element"><?= $title ?></h2>
    <?php endif;
}

function rounded_button( $button, $button_class = '' ) {
    if( $button ): ?>
        <a class="site-button"><?= $button ?></a>
    <?php endif;
}

function section_subscribe_form( $formId ) {
    if( $formId ): ?>
        <?= do_shortcode($formId); ?>
    <?php endif;
}

function section_desc( $desc, $desc_class = 'section-description' ) {
    if( $desc ): ?>
        <div class="<?= $desc_class ?>"><?= $desc ?></div>
    <?php endif;
}

function my_wp_nav_menu_objects( $items, $args ) {
    foreach( $items as &$item ) {
        $bg_color = get_field('background_color', $item);

        if( $bg_color ) { ?>
            <style>
                .menu-item-<?= $item->ID ?> {
                    background-color: <?= $bg_color ?> !important;
                }
            </style>
            <?php
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
