<?php
$product = wc_get_product( get_the_ID() );
$price = $product->get_price();
$categories = get_the_terms(get_the_ID(), 'product-type');
?>
<a href="<?php the_permalink() ?>" class="tmplt-part-product">
    <div class="product-image">
        <?= get_the_post_thumbnail(get_the_ID(), 'full'); ?>
    </div>

    <div class="product-info">
        <h3 class="product-title"><?php the_title() ?></h3>
    </div>
</a>