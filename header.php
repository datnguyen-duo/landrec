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

                <div class="button-circle cart custom-side-cart-opener">
<!--                    <img src="--><?//= get_template_directory_uri() ?><!--/src/images/icons/cart.svg" alt="">-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28" height="23" viewBox="0 0 28 23">
                <defs>
                    <clipPath id="clip-path">
                    <rect id="Rectangle_22457" data-name="Rectangle 22457" width="28" height="23" transform="translate(0 0)" fill="none"/>
                    </clipPath>
                </defs>
                <g id="Group_6007" data-name="Group 6007" transform="translate(0 0.343)">
                    <g id="Group_6006" data-name="Group 6006" transform="translate(0 -0.343)" clip-path="url(#clip-path)">
                    <path id="Path_48038" data-name="Path 48038" d="M27.714,8.255H23.433l-5.541-8A.59.59,0,0,0,17.072.1L16.1.776a.591.591,0,0,0-.15.821l4.611,6.659H7.745L12.369,1.6A.59.59,0,0,0,12.22.776L11.251.1a.59.59,0,0,0-.821.149l-5.558,8H.59a.59.59,0,0,0-.59.59v1.769a.59.59,0,0,0,.59.59H1.9l3.041,9.56A2.35,2.35,0,0,0,7.19,22.407H21.114a2.35,2.35,0,0,0,2.248-1.644L26.4,11.2h1.311a.59.59,0,0,0,.59-.59V8.845a.59.59,0,0,0-.59-.59" transform="translate(0 0.355)" />
                    </g>
                </g>
                </svg>



                </div>

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

                <div class="social-media">
                    <ul>
                        <li>
                            <a href="" class="button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/social/facebook-w.svg' ?>" alt="">
                            </a>
                        </li>

                        <li>
                            <a href="" class="button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/social/twitter-w.svg' ?>" alt="">
                            </a>
                        </li>

                        <li>
                            <a href="" class="button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/social/instagram-w.svg' ?>" alt="">
                            </a>
                        </li>

                        <li>
                            <a href="" class="button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/social/linkedin-w.svg' ?>" alt="">
                            </a>
                        </li>

                        <li>
                            <a href="" class="button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/social/youtube-w.svg' ?>" alt="">
                            </a>
                        </li>

                        <li>
                            <a href="" class="button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/social/pinterest-w.svg' ?>" alt="">
                            </a>
                        </li>

                        <li>
                            <a href="" class="button-circle">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/social/tiktok-w.svg' ?>" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif;
    render_shopping_cart();
    endif; ?>

    <main id="page-content">