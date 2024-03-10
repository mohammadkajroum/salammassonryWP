<?php
/**
 * Show the appropriate content for the Audio post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vidcast
 * @since Vidcast 1.0.0
 */

$content = get_the_content();

if ( has_block( 'core/audio', $content ) ) {
	vidcast_print_first_instance_of_block( 'core/audio', $content );
} elseif ( has_block( 'core/embed', $content ) ) {
	vidcast_print_first_instance_of_block( 'core/embed', $content );
} else {
	vidcast_print_first_instance_of_block( 'core-embed/*', $content );
}

// Add the excerpt.
if ( absint(vidcast_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}