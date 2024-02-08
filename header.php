<?php
$checkoutPage = (is_checkout() && empty(is_wc_endpoint_url('order-received')));
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page">
    <?php if( !$checkoutPage ): ?>
    <header id="site-header" <?php if( is_product() ): ?>class="single-product-header"<?php endif; ?>>
        <div class="search-overlay">
            <span class="search-title">Search for a product, project or idea</span>

            <div class="search-form-holder">
                <form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
                    <input type="search"
                           class="search-field"
                           placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
                           value="<?php echo get_search_query() ?>"
                           name="s"
                           title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
                    <button type="submit" role="button" class="button-circle">
                        <img src="<?= get_template_directory_uri().'/src/images/icons/arrow.svg' ?>" alt="">
                    </button>
                </form>

                <div class="button-circle close-search-overlay">
                    <img src="<?= get_template_directory_uri().'/src/images/icons/x.svg' ?>" alt="">
                </div>
            </div>
        </div>

        <div class="mobile-filters-close-button-holder">
            <div class="button-circle mobile-filters-close-button">
                <img src="<?= get_template_directory_uri().'/src/images/icons/x-white.svg' ?>" alt="">
            </div>
        </div>

        <div class="left">
            <a href="<?= site_url() ?>">
                <img class="site-logo visible" src="<?= get_template_directory_uri().'/src/images/logo-light.svg' ?>" alt="">
                <img class="site-logo hidden" src="<?= get_template_directory_uri().'/src/images/logo-green.svg' ?>" alt="">
            </a>
        </div>

        <div class="middle">
            <?php if( has_nav_menu('menu-1') ): ?>
                <nav>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'container' => false,
                        )
                    ); ?>
                </nav>
            <?php endif; ?>
        </div>

        <div class="right">
            <?php if( has_nav_menu('menu-2') ): ?>
                <nav>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'menu-2',
                            'container' => false,
                        )
                    ); ?>
                </nav>
            <?php endif; ?>

            <div class="icons-holder">
                <div class="button-circle search search-opener">
                    <?php icon_search() ?>
                </div>

                <?php if (get_field("cart_icon", "option")): ?>
                <div class="button-circle cart custom-side-cart-opener">
                    <?php echo wp_get_attachment_image( get_field('cart_icon', 'option')['id'], array('18', '18'), false, '' ); ?>
                    <?php echo wp_get_attachment_image( get_field('cart_icon_active', 'option')['id'], array('18', '18'), false, '' ); ?>
                </div>
                <?php endif; ?>
                <?php if( has_nav_menu('menu-4') ): ?>
                    <div class="button-circle hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <?php if( has_nav_menu('menu-4') ): ?>
        <div id="site-nav-mobile">
            <div class="section-content">
                <nav>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'menu-4',
                            'container' => false,
                        )
                    ); ?>
                </nav>

                <?php if (get_field("social_links", "option")): ?>
                <div class="social-media">
                    <ul>
                        <?php foreach(get_field("social_links", "option") as $link) :?>
                            <li>
                                <a href="<?php echo $link["link"]; ?>" class="button-circle">
                                    <img src="<?= $link["icon"]["url"] ?>" alt="social-icon">
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif;
    render_shopping_cart();
    endif; ?>

    <main id="page-content">