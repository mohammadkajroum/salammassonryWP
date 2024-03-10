<?php
/**
 * Show the appropriate content for the Chat post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vidcast
 * @since Vidcast 1.0.0
 */


// If there are paragraph blocks, print up to two.
// Otherwise this is legacy content, so print the excerpt.

if ( has_block( 'core/paragraph', get_the_content() ) ) {
	vidcast_print_first_instance_of_block( 'core/paragraph', get_the_content(), 2 );
} else {
    if ( absint(vidcast_get_option( 'excerpt_length' )) != '0'){
    	the_excerpt();
    }
}