<?php
/**
 * Displays progressbar
 *
 * @package Vidcast
 */

$show_progressbar = vidcast_get_option( 'show_progressbar' );

if ( $show_progressbar ) :
	$progressbar_position = vidcast_get_option( 'progressbar_position' );
	echo '<div id="vidcast-progress-bar" class="theme-progress-bar ' . esc_attr( $progressbar_position ) . '"></div>';
endif;
