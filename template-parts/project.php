<?php
$post_terms = get_the_terms(get_the_ID(),'project-type');
?>
<a href="<?php the_permalink(); ?>" class="tmplt-part-project">
    <div class="post-image">
        <?= get_the_post_thumbnail(get_the_ID(),'large') ?>

    </div>
    <div class="project-info">
        <div class="title-holder">
            <h3 class="project-title"><?php the_title() ?></h3>
        </div>
    </div>
</a>