<?php
$product = wc_get_product( get_the_ID() );
$price = $product->get_price();
$categories = get_the_terms(get_the_ID(), 'product-type');
?>
<a href="<?php the_permalink() ?>" class="tmplt-part-product">
    <div class="product-image">
        <?= get_the_post_thumbnail(get_the_ID(), 'full'); ?>

        <?php if( $categories ): ?>
            <div class="pills-holder">
                <?php foreach ( $categories as $category ): ?>
                    <span class="pill"><?= $category->name ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="product-info">
        <h3 class="product-title"><?php the_title() ?></h3>
        <div class="product-tag-list"><span>Age Range</span> <span><?= wc_price($price) ?></span></div>

        <div class="button-circle-2">
            <img src="<?= get_template_directory_uri().'/src/images/icons/plus.svg'?>" alt="">
        </div>
    </div>
</a>