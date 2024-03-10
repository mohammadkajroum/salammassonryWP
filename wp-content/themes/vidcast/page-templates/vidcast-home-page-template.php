<?php
/**
 * Template Name: Homepage Page Template
 * Template Post Type: post, page, product
 * Displays the Page Template provided via the theme.
 *
 * @package    Vidcast
 * @since      Vidcast 1.0.0
 */
get_header();

$is_banner_section = vidcast_get_option('enable_banner_section');
    if ($is_banner_section ) {
        get_template_part('template-parts/front-page/banner-section');
    } 
    get_template_part('template-parts/front-page/categories-section');
    if (is_active_sidebar('vidcast-homepage-top-widget')) { ?>
        <section class="site-section site-widgetarea site-widgetarea-full site-widgetarea-home">
            <?php dynamic_sidebar('vidcast-homepage-top-widget'); ?>
        </section>
        <?php
    }

get_footer();
