<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vidcast
 * @since Vidcast 1.0.0
 */
if ( absint(vidcast_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}