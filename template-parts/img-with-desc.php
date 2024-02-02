<?php

$image = !empty($args['data']['image']) ? $args['data']['image'] : null;
$title = !empty($args['data']['title']) ? $args['data']['title'] : null;
$desc = !empty($args['data']['description']) ? $args['data']['description'] : null;
$button = !empty($args['data']['button']) ? $args['data']['button'] : null;
$formId = !empty($args['data']['form_id']) ? $args['data']['form_id'] : null;
$border_color = !empty($args['border']['color']) ? $args['border']['color'] : "#ffba6b";
$border_bg_color = !empty($args['border']['background-color']) ? $args['border']['background-color'] : "#fff";

if( $image || $title || $desc || $button ): ?>
    <section class="tmplt-part-img-with-desc">
        <?= wp_get_attachment_image($image['id'],'full','', array('class'=>'section-background')) ?>

        <div class="section-content">
            <?php
            section_title( $title );
            section_desc( $desc );
            button( $button );
            section_subscribe_form( $formId ) ?>
        </div>

        <?php wave_border($border_color,$border_bg_color) ?>
    </section>
<?php endif; ?>