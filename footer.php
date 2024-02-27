    </main> <!--#page-content end-->
    <?php $checkoutPage = ( is_checkout() && empty( is_wc_endpoint_url('order-received')) ); ?>

    <?php if(!$checkoutPage): ?>
        <footer id="site-footer">
            <div class="logo-holder">
                <a href="<?= site_url() ?>">
                    <img class="site-logo" src="<?= get_template_directory_uri() ?>/src/images/logo-light.svg" alt="logo">
                </a>
            </div>

            <?php if( has_nav_menu('menu-3') ): ?>
                <nav>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'menu-3',
                            'container' => false,
                        )
                    ); ?>
                </nav>
            <?php endif; ?>

            <div class="bottom-part">
            <div class="left">
                <?php if (get_field('social_links', 'option')): ?>
                    <ul>
                    <?php foreach (get_field('social_links', 'option') as $link): ?>
                        <li>
                            <a href="<?php echo $link['link'] ?>" class="button-circle">
                                <?php echo wp_get_attachment_image( $link['icon']['id'], '', false, array( '' ) );?>

                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
             
            </div>
            <div class="middle">
                <p>© <?php echo date("Y"); ?> Landrec Inc. All Rights Reserved</p>
            </div>
            <div class="right">
                <img src="<?= get_template_directory_uri() ?>/src/images/footer-logo.svg" alt="logo">
                <p>
                    We are a proud member of the American Society of Landscape
                    Architects and welcome collaboration with the design community.
                </p>
            </div>
        </div>
        </footer>
    <?php endif; ?>
</div> <!--#page end-->

<?php wp_footer(); ?>

</body>

</html>