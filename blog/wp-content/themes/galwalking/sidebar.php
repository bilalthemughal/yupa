<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Galwalking
 */
$sidebar_position = get_theme_mod( 'sidebar_position', galwalking_theme()->customizer->get_default( 'sidebar_position' ) );

if ( 'fullwidth' === $sidebar_position ) {
	return;
}

if ( is_active_sidebar( 'sidebar' ) && ! galwalking_is_product_page() ) {
	do_action( 'galwalking_render_widget_area', 'sidebar' );
}

if ( is_active_sidebar( 'shop-sidebar' ) && galwalking_is_product_page() ) {
	do_action( 'galwalking_render_widget_area', 'shop-sidebar' );
}
