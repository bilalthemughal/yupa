<?php
/**
 * Register presets for TM Style Switcher
 *
 * @package Galwalking
 */
if ( function_exists( 'tmss_register_preset' ) ) {

	tmss_register_preset(
		'default',
		esc_html__( 'Galwalking', 'galwalking' ),
		get_stylesheet_directory_uri() . '/assets/demo-content/default/default.jpg',
		get_stylesheet_directory() . '/tm-style-switcher-presets/default.json'
	);

	tmss_register_preset(
		'digital',
		esc_html__( 'Galwalking Digital', 'galwalking' ),
		get_stylesheet_directory_uri() . '/assets/demo-content/digital/digital.jpg',
		get_stylesheet_directory() . '/tm-style-switcher-presets/digital.json'
	);

	tmss_register_preset(
		'experience',
		esc_html__( 'Galwalking Experience', 'galwalking' ),
		get_stylesheet_directory_uri() . '/assets/demo-content/experience/experience.jpg',
		get_stylesheet_directory() . '/tm-style-switcher-presets/experience.json'
	);

	tmss_register_preset(
		'finance',
		esc_html__( 'Galwalking Finance', 'galwalking' ),
		get_stylesheet_directory_uri() . '/assets/demo-content/finance/finance.jpg',
		get_stylesheet_directory() . '/tm-style-switcher-presets/finance.json'
	);

	tmss_register_preset(
		'presentation',
		esc_html__( 'Galwalking Presentation', 'galwalking' ),
		get_stylesheet_directory_uri() . '/assets/demo-content/presentation/presentation.jpg',
		get_stylesheet_directory() . '/tm-style-switcher-presets/presentation.json'
	);

	tmss_register_preset(
		'shop',
		esc_html__( 'Galwalking Shop', 'galwalking' ),
		get_stylesheet_directory_uri() . '/assets/demo-content/shop/shop.jpg',
		get_stylesheet_directory() . '/tm-style-switcher-presets/shop.json'
	);
}
