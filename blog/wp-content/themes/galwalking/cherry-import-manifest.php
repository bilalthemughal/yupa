<?php
/**
 * Theme import manifest file.
 *
 * @var array
 *
 * @package Galwalking
 */
$settings = array(
	'xml' => false,
	'advanced_import' => array(
		'default' => array(
			'label'    => esc_html__( 'Galwalking', 'galwalking' ),
			'full'     => get_template_directory() . '/assets/demo-content/default.xml',
			'thumb'    => get_template_directory_uri() . '/assets/demo-content/default.png',
			'demo_url' => 'http://ld-wp2.template-help.com/wptheme/galwalking/',
		),
	),
	'import' => array(
		'chunk_size' => 3,
	),
	'slider' => array(
		'path' => 'https://raw.githubusercontent.com/JetImpex/wizard-slides/master/slides.json',
	),
	'export' => array(
		'options' => array(
			'cherry_projects_options',
			'cherry_projects_options_default',
			'cherry-team',
			'cherry-team_default',
			'cherry-services',
			'cherry-services_default',
			'cherry-search',
			'cherry-search-default',
			'revslider-global-settings',
			'elementor_cpt_support',
			'elementor_disable_color_schemes',
			'elementor_disable_typography_schemes',
			'elementor_container_width',
			'elementor_css_print_method',
			'elementor_global_image_lightbox',
			'site_icon',
			'wsl_settings_social_icon_set',
			'toastie_smsb_li',
			'toastie_smsb_gp',
			'toastie_smsb_fb',
			'toastie_smsb_tw',
			'toastie_smsb_custom_fb',
			'toastie_smsb_custom_tw',
			'toastie_smsb_custom_gp',
			'toastie_smsb_custom_li',
			'toastie_smsb_format',
			'toastie_smsb_tu',
			'toastie_smsb_pi',
			'toastie_smsb_st',
			'toastie_smsb_vk',
			'toastie_smsb_em',
			'toastie_smsb_title',
			'toastie_smsb_email',
			'toastie_smsb_opengraph',
			'toastie_smsb_custom_pi',
			'toastie_smsb_custom_tu',
			'toastie_smsb_custom_st',
			'toastie_smsb_custom_vk',
			'toastie_smsb_custom_em',
			'jet-elements-settings',
		),
	),
);
