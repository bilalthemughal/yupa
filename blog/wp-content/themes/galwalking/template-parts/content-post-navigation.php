<?php
/**
 * Template part for single post navigation.
 *
 * @package Galwalking
 */

if ( ! get_theme_mod( 'single_post_navigation', galwalking_theme()->customizer->get_default( 'single_post_navigation' ) ) ) {
	return;
}

the_post_navigation( array(
	'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'galwalking' ) . '</span>%title',
	'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post', 'galwalking' ) . '</span>%title',
) );
