<?php

$is_sticky = vidcast_get_option('enable_sticky_menu');

?>

<div class="site-header-components">
    <div class="site-header-items">

        <div class="header-individual-component branding-components">
            <?php get_template_part('template-parts/header/site-branding'); ?>
            <div class="branding-components-extras hide-on-desktop">

                <button id="theme-toggle-offcanvas-button" class="hide-on-desktop theme-button theme-button-transparent theme-button-offcanvas" aria-expanded="false" aria-controls="theme-offcanvas-navigation">
                    <span class="screen-reader-text"><?php _e('Menu', 'vidcast'); ?></span>
                    <span class="toggle-icon"><?php vidcast_theme_svg('menu'); ?></span>
                </button>

                <button id="theme-toggle-search-button" class="theme-button theme-button-transparent theme-button-search" aria-expanded="false" aria-controls="theme-header-search">
                    <span class="screen-reader-text"><?php _e('Search', 'vidcast'); ?></span>
                    <?php vidcast_theme_svg('search'); ?>
                </button>

            </div>
        </div>

        <div class="hide-on-tablet hide-on-mobile">
            <div class="header-individual-component search-components">
                <?php get_search_form(); ?>
            </div>



                <?php $blog_mini_cart = vidcast_get_option('enable_mini_cart_header');
                if ($blog_mini_cart && class_exists('WooCommerce')) {
                    vidcast_woocommerce_cart_count();
                } ?>


            <div class="header-individual-component main-nav-components">
                <nav aria-label="<?php echo esc_attr_x('Mobile', 'menu', 'vidcast'); ?>" role="navigation">
                    <ul id="theme-offcanvas-navigation" class="theme-offcanvas-menu reset-list-style">
                        <?php
                        if (has_nav_menu('primary-menu')) {
                            ?>

                            <?php
                            wp_nav_menu(
                                array(
                                    'container' => '',
                                    'items_wrap' => '%3$s',
                                    'show_toggles' => true,
                                    'theme_location' => 'primary-menu'
                                )
                            );
                            ?>

                            <?php
                        } else {
                            wp_list_pages(
                                array(
                                    'match_menu_classes' => true,
                                    'show_sub_menu_icons' => true,
                                    'title_li' => false,
                                )
                            );
                        } ?>

                    </ul><!-- .theme-offcanvas-navigation -->
                </nav>
            </div>

            <?php if ( has_nav_menu('social-menu') ) { ?>
                <div class="header-individual-component main-search-components">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'social-menu',
                        'container_class' => 'footer-social-navigation',
                        'fallback_cb' => false,
                        'depth' => 1,
                        'menu_class' => 'theme-social-navigation theme-menu theme-footer-navigation',
                        'link_before'     => '<span class="screen-reader-text">',
                        'link_after'      => '</span>',
                    ) );
                    ?>
                </div>
            <?php } ?>


            <?php
            if ( is_active_sidebar( 'vidcast-navigation-widget' ) ) { ?>
                <div class="header-individual-component main-widgets-components">
                    <?php dynamic_sidebar( 'vidcast-navigation-widget' ); ?>
                </div>
            <?php  } ?>

        </div>
    </div>
</div>