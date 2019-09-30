<?php
/**
 * TM Wizard configuration.
 *
 * @var array
 *
 * @package Galwalking
 */
$plugins = array(
	'cherry-data-importer' => array(
		'name'   => esc_html__( 'Cherry Data Importer', 'galwalking' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/CherryFramework/cherry-data-importer/archive/master.zip',
		'access' => 'base',
	),
	'cherry-sidebars' => array(
		'name'   => esc_html__( 'Cherry Sidebars', 'galwalking' ),
		'source' => 'local',
		'path'   => GALWALKING_THEME_DIR . '/assets/includes/plugins/cherry-sidebars.zip',
		'access' => 'skins',
	),
	'cherry-socialize' => array(
		'name'   => esc_html__( 'Cherry Socialize', 'galwalking' ),
		'access' => 'skins',
	),
	'cherry-search' => array(
		'name'   => esc_html__( 'Cherry Search', 'galwalking' ),
		'access' => 'skins',
	),
	'cherry-popups' => array(
		'name'   => esc_html__( 'Cherry Popups', 'galwalking' ),
		'access' => 'skins',
	),
	'cherry-trending-posts' => array(
		'name'   => esc_html__( 'Cherry Trending Posts', 'galwalking' ),
		'access' => 'skins',
	),
	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'galwalking' ),
		'access' => 'skins',
	),
	'wordpress-social-login' => array(
		'name'   => esc_html__( 'WordPress Social Login', 'galwalking' ),
		'access' => 'skins',
	),
	'elementor' => array(
		'name'   => esc_html__( 'Elementor Page Builder', 'galwalking' ),
		'access' => 'base',
	),
	'jet-elements' => array(
		'name'   => esc_html__( 'Jet Elements', 'galwalking' ),
		'source' => 'local',
		'path'   => GALWALKING_THEME_DIR . '/assets/includes/plugins/jet-elements.zip',
		'access' => 'base',
	),
	'jet-blog' => array(
		'name'   => esc_html__( 'Jet Blog', 'galwalking' ),
		'source' => 'local',
		'path'   => GALWALKING_THEME_DIR . '/assets/includes/plugins/jet-blog.zip',
		'access' => 'base',
	),
	'tm-dashboard' => array(
		'name'   => esc_html__( 'Jetimpex Dashboard', 'galwalking' ),
		'source' => 'remote',
		'path'   => 'http://cloud.cherryframework.com/downloads/free-plugins/tm-dashboard.zip',
		'access' => 'base',
	),
);

/**
 * Skins configuration example
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'elementor',
		'cherry-data-importer',
		'jet-elements',
		'jet-blog',
		'tm-dashboard',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
				'cherry-sidebars',
				'cherry-socialize',
				'cherry-trending-posts',
				'cherry-search',
				'cherry-popups',
				'contact-form-7',
				'wordpress-social-login',
			),
			'lite'  => false,
			'demo'  => 'http://ld-wp.template-help.com/wordpress_galwalking/galwalking_v1/',
			'thumb' => get_template_directory_uri() . '/assets/demo-content/default.png',
			'name'  => esc_html__( 'Galwalking', 'galwalking' ),
		),
	),
);

$texts = array(
	'theme-name' => esc_html__( 'Galwalking', 'galwalking' ),
);
