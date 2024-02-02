<?php
$post_terms = get_the_terms(get_the_ID(),'category');
?>
<a href="<?php the_permalink(); ?>" class="tmplt-part-post">
    <div class="post-image">
        <?= get_the_post_thumbnail(get_the_ID(),'large') ?>

        <!-- <?php if( $post_terms ): ?>
            <div class="pills-holder">
                <?php foreach ( $post_terms as $term ): ?>
                    <span class="pill"><?= $term->name ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?> -->
    </div>
    <h3 class="post-title"><?php the_title() ?></h3>
</a>