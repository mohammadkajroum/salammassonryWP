<?php

$is_sticky = vidcast_get_option('enable_sticky_menu');

?>
<div class="masthead-main-navigation <?php echo ($is_sticky) ? 'has-sticky-header' : ''; ?>">
    <div class="wrapper">
        <div class="site-header-wrapper">
            <div class="site-header-left">
                <?php if (is_active_sidebar('vidcast-offcanvas-widget')): ?>

                    <button id="theme-offcanvas-widget-button" class="theme-button theme-button-transparent theme-button-offcanvas">
                        <span class="screen-reader-text"><?php _e('Offcanvas Widget', 'vidcast'); ?></span>
                        <span class="toggle-icon"><?php vidcast_theme_svg('menu-alt'); ?></span>
                    </button>

                <?php endif; ?>

                <?php get_template_part('template-parts/header/site-branding'); ?>
            </div>

            <div class="site-header-right">
                <div id="site-navigation" class="main-navigation theme-primary-menu">
                    <?php
                    if (has_nav_menu('primary-menu')) {
                        ?>
                        <nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x('Primary', 'menu', 'vidcast'); ?>">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary-menu'
                                    )
                                );
                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->
                        <?php
                    } else { ?>
                        <nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x('Primary', 'menu', 'vidcast'); ?>">
                            <ul class="primary-menu reset-list-style">
                                <?php
                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                    )
                                );

                                ?>
                            </ul>
                        </nav><!-- .primary-menu-wrapper -->

                    <?php } ?>
                </div><!-- .main-navigation -->

                <?php $blog_mini_cart = vidcast_get_option('enable_mini_cart_header');
                if ($blog_mini_cart && class_exists('WooCommerce')) {
                    vidcast_woocommerce_cart_count();
                } ?>

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
    </div>
</div>