<?php
/**
 * Menus configuration.
 *
 * @package Galwalking
 */

add_action( 'after_setup_theme', 'galwalking_register_menus', 5 );
/**
 * Register menus.
 */
function galwalking_register_menus() {

	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'galwalking' ),
		'main'   => esc_html__( 'Main', 'galwalking' ),
		'footer' => esc_html__( 'Footer', 'galwalking' ),
		'social' => esc_html__( 'Social', 'galwalking' ),
	) );
}
