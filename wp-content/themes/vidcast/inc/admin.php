<?php
/**
 * Vidcast admin logic.
 *
 * @package Vidcast
 */

/**
 * Load Recommended plugins notification logic.
 */
require_once trailingslashit(get_template_directory()) . 'inc/admin/recommended-plugins.php';


function vidcast_admin_setup()
{

    /**
     * Load and initialize Vidcast Dashboard Notices
     *
     */

    // Theme options page.
    require_once trailingslashit(get_template_directory()) . 'inc/admin/dashboard/class-theme-notice.php';
    require_once trailingslashit(get_template_directory()) . 'inc/admin/dashboard/class-notice.php';
    
    require trailingslashit(get_template_directory()) . 'inc/admin/dashboard/class-about-render.php';

    /**
     * Theme dashboard settings.
     */
    require get_template_directory() . '/inc/admin/theme-dashboard-settings.php';

}

add_action('after_setup_theme', 'vidcast_admin_setup');
