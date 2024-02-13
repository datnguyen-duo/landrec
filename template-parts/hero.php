<?php
$files = !empty($args['data']['files']) ? $args['data']['files'] : null;
$image = !empty($args['data']['image']) ? $args['data']['image'] : null;
$title = !empty($args['data']['title']) ? $args['data']['title'] : null;
$desc = !empty($args['data']['description']) ? $args['data']['description'] : null;
$button = !empty($args['data']['button']) ? $args['data']['button'] : null;

?>
<section class="tmplt-part-hero">
    <?php if ($files): ?>
        <div class="section-background swiper hero-swiper">
            <div class="swiper-wrapper">
                <?php foreach($files as $key => $file ): 
                    if( $file['file']['type'] == 'image' ) {
                        echo wp_get_attachment_image( $file['file']['id'],'full','', array(
                            'loading' => 'eager',
                            'class' => 'swiper-slide'
                            ) );
                    } else {
                    ?>
                    <video src="<?php echo $file['file']['url'] ?>#t=0.1" id="video" preload="metadata" autoplay loop muted playsinline class="swiper-slide"></video>

                    <?php } ?>
                    
                <?php endforeach; ?>
            </div>
            <div class="hero-swiper-pagination"></div>

        </div>
    <?php endif; ?>

    <?php if ($image): ?> 
        <div class="section-background">
            <?php echo $image; ?>
        </div>
    <?php endif; ?>

    <div class="section-content">
        <?php section_title( $title ) ?>
        <?php echo $desc ?  '<p class="section-description">' . $desc . "</p>" : null; ?>
        <?php button( $button ) ?>
    </div>
</section>