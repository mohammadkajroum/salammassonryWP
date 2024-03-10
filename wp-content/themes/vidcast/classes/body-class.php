<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function vidcast_body_classes( $classes ) {
    global $post;
    $post_type = "";
    if (!empty($post)) {
        $post_type = get_post_type($post->ID);
    }
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    $header_style = vidcast_get_option('header_style');
    $enable_fix_navigation_area = vidcast_get_option( 'enable_fix_navigation_area'); 
    if ($enable_fix_navigation_area) {
        $classes[] = 'header-style-aside-fixed';
    }
    $classes[] = ' vidcast-'.$header_style;

    if ($header_style == 'header_style_2') {
        $classes[] = 'header-style-aside';
    }
    if ($post_type == 'product') {
        if ( ! is_active_sidebar( 'shop-sidebar' ) ) {
            $classes[] = 'no-sidebar';
        } else {
            $page_layout = vidcast_get_page_layout();
            if('no-sidebar' != $page_layout ){
                $classes[] = 'has-sidebar '.esc_attr($page_layout);
            }
        }
    } else {
        if ($post_type != 'page') { 
        	$page_layout = vidcast_get_page_layout();
            if('no-sidebar' != $page_layout ){
                $classes[] = 'has-sidebar '.esc_attr($page_layout);
            }else{

                $classes[] = esc_attr($page_layout);
            }
        }elseif (is_search()) {
            $page_layout = vidcast_get_page_layout();
            if('no-sidebar' != $page_layout ){
                $classes[] = 'has-sidebar '.esc_attr($page_layout);
            }else{

                $classes[] = esc_attr($page_layout);
            }
        }
    }


	return $classes;
}
add_filter( 'body_class', 'vidcast_body_classes' );
