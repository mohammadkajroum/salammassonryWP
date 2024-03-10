<?php
/**
 * Show the appropriate content for the Gallery post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vidcast
 * @since Vidcast 1.0.0
 */

 // Print the 1st gallery found.
if ( has_block( 'core/gallery', get_the_content() ) ) {
	vidcast_print_first_instance_of_block( 'core/gallery', get_the_content() );
}
    if ( absint(vidcast_get_option( 'excerpt_length' )) != '0'){
        the_excerpt();  
    }