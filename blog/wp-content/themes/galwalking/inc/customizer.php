<?php
/**
 * Theme Customizer.
 *
 * @package Galwalking
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function galwalking_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'galwalking_get_customizer_options' , array(
		'prefix'     => 'galwalking',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Identity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'galwalking' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => false,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'    => esc_html__( 'Show ToTop button', 'galwalking' ),
				'section'  => 'title_tagline',
				'priority' => 61,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),

			/** `General Site settings` panel */
			'general_settings' => array(
				'title'    => esc_html__( 'General Site settings', 'galwalking' ),
				'priority' => 40,
				'type'     => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'    => esc_html__( 'Logo &amp; Favicon', 'galwalking' ),
				'priority' => 25,
				'panel'    => 'general_settings',
				'type'     => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'galwalking' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'galwalking' ),
					'text'  => esc_html__( 'Text', 'galwalking' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'galwalking' ),
				'description'     => esc_html__( 'Upload logo image', 'galwalking' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_logo_image',
			),
			'invert_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Logo Upload', 'galwalking' ),
				'description'     => esc_html__( 'Upload logo image', 'galwalking' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/invert-logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'galwalking' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'galwalking' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_logo_image',
			),
			'invert_retina_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Retina Logo Upload', 'galwalking' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'galwalking' ),
				'section'         => 'logo_favicon',
				'default'         => false,
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'galwalking' ),
				'section'         => 'logo_favicon',
				'default'         => 'Montserrat, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'galwalking' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => galwalking_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'galwalking' ),
				'section'         => 'logo_favicon',
				'default'         => '700',
				'field'           => 'select',
				'choices'         => galwalking_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'galwalking' ),
				'section'         => 'logo_favicon',
				'default'         => '24',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_logo_text',
			),
			'header_logo_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'galwalking' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'galwalking' ),
				'section'     => 'logo_favicon',
				'default'     => '1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
				'active_callback' => 'galwalking_is_header_logo_text',
			),
			'header_logo_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'logo_favicon',
				'default'     => '0.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
				'active_callback' => 'galwalking_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'galwalking' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => galwalking_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_logo_text',
			),
			'header_logo_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'logo_favicon',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
				'active_callback' => 'galwalking_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'galwalking' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'galwalking' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'galwalking' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'galwalking' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'galwalking' ),
				'section' => 'breadcrumbs',
				'default' => 'full',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'galwalking' ),
					'minified' => esc_html__( 'Minified', 'galwalking' ),
				),
				'type'    => 'control',
			),
			'breadcrumbs_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'galwalking' ),
				'section' => 'breadcrumbs',
				'default' => '#42474C',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'breadcrumbs_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'galwalking' ),
				'section' => 'breadcrumbs',
				'default' => '%s/assets/images/breadcrumbs_bg.jpg',
				'field'   => 'image',
				'type'    => 'control',
			),
			'breadcrumbs_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'galwalking' ),
				'section' => 'breadcrumbs',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => galwalking_get_bg_repeat(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'galwalking' ),
				'section' => 'breadcrumbs',
				'default' => 'center',
				'field'   => 'select',
				'choices' => galwalking_get_bg_position(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'galwalking' ),
				'section' => 'breadcrumbs',
				'default' => 'cover',
				'field'   => 'select',
				'choices' => galwalking_get_bg_size(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'galwalking' ),
				'section' => 'breadcrumbs',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => galwalking_get_bg_attachment(),
				'type'    => 'control',
			),
			'breadcrumbs_text_color' => array(
				'title'       => esc_html__( 'Text Color', 'galwalking' ),
				'description' => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'galwalking' ),
				'section'     => 'breadcrumbs',
				'default'     => 'light',
				'field'       => 'select',
				'choices'     => galwalking_get_text_color(),
				'type'        => 'control',
			),
			'breadcrumbs_padding_y' => array(
				'title'       => esc_html__( 'Desktop Padding Top Bottom (px)', 'galwalking' ),
				'section'     => 'breadcrumbs',
				'default'     => 70,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 5,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_padding_y_tablet' => array(
				'title'       => esc_html__( 'Tablet Padding Top Bottom (px)', 'galwalking' ),
				'section'     => 'breadcrumbs',
				'default'     => 40,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 5,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_padding_y_mobile' => array(
				'title'       => esc_html__( 'Mobile Padding Top Bottom (px)', 'galwalking' ),
				'section'     => 'breadcrumbs',
				'default'     => 20,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 5,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'galwalking' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'galwalking' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'galwalking' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'galwalking' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'galwalking' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'galwalking' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'page_container_type' => array(
				'title'   => esc_html__( 'Page type', 'galwalking' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'galwalking' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'galwalking' ),
				),
				'type' => 'control',
			),
			'page_boxed_width' => array(
				'title'       => esc_html__( 'Page boxed width (px)', 'galwalking' ),
				'section'     => 'page_layout',
				'default'     => 1200,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
				'active_callback' => 'galwalking_is_page_type_boxed',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header container type', 'galwalking' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'galwalking' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'galwalking' ),
				),
				'type' => 'control',
			),
			'breadcrumbs_container_type' => array(
				'title'   => esc_html__( 'Breadcrumbs container type', 'galwalking' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'galwalking' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'galwalking' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content container type', 'galwalking' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'galwalking' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'galwalking' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer container type', 'galwalking' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'galwalking' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'galwalking' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'galwalking' ),
				'section'     => 'page_layout',
				'default'     => 1200,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'galwalking' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Page Preloader` section */
			'page_preloader_section' => array(
				'title'    => esc_html__( 'Page Preloader', 'galwalking' ),
				'priority' => 60,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),

			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'galwalking' ),
				'section'  => 'page_preloader_section',
				'priority' => 10,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),

			'page_preloader_bg' => array(
				'title'           => esc_html__( 'Preloader Cover Background Color', 'galwalking' ),
				'section'         => 'page_preloader_section',
				'default'         => '#fff',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_page_preloader_enable',
			),

			'page_preloader_url' => array(
				'title'           => esc_html__( 'Preloader Image Upload', 'galwalking' ),
				'section'         => 'page_preloader_section',
				'field'           => 'image',
				'default'         => '%s/assets/images/preloader-image.png',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_page_preloader_enable',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'galwalking' ),
				'description' => esc_html__( 'Configure Color Scheme', 'galwalking' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'galwalking' ),
				'priority'    => 10,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#f88f9d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#f5aa95',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#9798a6',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#191b32',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#f5aa95',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#191b32',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#191b32',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#191b32',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#191b32',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#191b32',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'galwalking' ),
				'section' => 'regular_scheme',
				'default' => '#191b32',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'galwalking' ),
				'priority'    => 20,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'galwalking' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'galwalking' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'galwalking' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'galwalking' ),
				'section' => 'invert_scheme',
				'default' => '#f5aa95',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'galwalking' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'galwalking' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'galwalking' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'galwalking' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'galwalking' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'galwalking' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Greyscale colors` section */
			'grey_scheme' => array(
				'title'       => esc_html__( 'Greyscale colors', 'galwalking' ),
				'priority'    => 30,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),

			'grey_color_1' => array(
				'title'   => esc_html__( 'Grey color (1)', 'galwalking' ),
				'section' => 'grey_scheme',
				'default' => '#f7f7f7',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'grey_color_2' => array(
				'title'   => esc_html__( 'Grey color (2)', 'galwalking' ),
				'section' => 'grey_scheme',
				'default' => '#eaeae9',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Colors` section */
			'page_bg_color' => array(
				'title'   => esc_html__( 'Page Background Color', 'galwalking' ),
				'section' => 'colors',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'galwalking' ),
				'description' => esc_html__( 'Configure typography settings', 'galwalking' ),
				'priority'    => 50,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'galwalking' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'galwalking' ),
				'section' => 'body_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'galwalking' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => galwalking_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'galwalking' ),
				'section' => 'body_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => galwalking_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'galwalking' ),
				'section'     => 'body_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'galwalking' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'galwalking' ),
				'section'     => 'body_typography',
				'default'     => '1.667',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'galwalking' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => galwalking_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'galwalking' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => galwalking_get_text_aligns(),
				'type'    => 'control',
			),
			'body_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'body_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'    => esc_html__( 'H1 Heading', 'galwalking' ),
				'priority' => 10,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'galwalking' ),
				'section' => 'h1_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'galwalking' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => galwalking_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'galwalking' ),
				'section' => 'h1_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => galwalking_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'galwalking' ),
				'section'     => 'h1_typography',
				'default'     => '36',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'galwalking' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'galwalking' ),
				'section'     => 'h1_typography',
				'default'     => '1.3',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'galwalking' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => galwalking_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'galwalking' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => galwalking_get_text_aligns(),
				'type'    => 'control',
			),
			'h1_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'h1_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'    => esc_html__( 'H2 Heading', 'galwalking' ),
				'priority' => 15,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'galwalking' ),
				'section' => 'h2_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'galwalking' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => galwalking_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'galwalking' ),
				'section' => 'h2_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => galwalking_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'galwalking' ),
				'section'     => 'h2_typography',
				'default'     => '24',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'galwalking' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'galwalking' ),
				'section'     => 'h2_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'galwalking' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => galwalking_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'galwalking' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => galwalking_get_text_aligns(),
				'type'    => 'control',
			),
			'h2_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'h2_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'    => esc_html__( 'H3 Heading', 'galwalking' ),
				'priority' => 20,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'galwalking' ),
				'section' => 'h3_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'galwalking' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => galwalking_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'galwalking' ),
				'section' => 'h3_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => galwalking_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'galwalking' ),
				'section'     => 'h3_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'galwalking' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'galwalking' ),
				'section'     => 'h3_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'galwalking' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => galwalking_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'galwalking' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => galwalking_get_text_aligns(),
				'type'    => 'control',
			),
			'h3_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'h3_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'    => esc_html__( 'H4 Heading', 'galwalking' ),
				'priority' => 25,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'galwalking' ),
				'section' => 'h4_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'galwalking' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => galwalking_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'galwalking' ),
				'section' => 'h4_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => galwalking_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'galwalking' ),
				'section'     => 'h4_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'galwalking' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'galwalking' ),
				'section'     => 'h4_typography',
				'default'     => '1.33',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'galwalking' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => galwalking_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'galwalking' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => galwalking_get_text_aligns(),
				'type'    => 'control',
			),
			'h4_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'h4_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'    => esc_html__( 'H5 Heading', 'galwalking' ),
				'priority' => 30,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'galwalking' ),
				'section' => 'h5_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'galwalking' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => galwalking_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'galwalking' ),
				'section' => 'h5_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => galwalking_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'galwalking' ),
				'section'     => 'h5_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'galwalking' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'galwalking' ),
				'section'     => 'h5_typography',
				'default'     => '1.33',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'galwalking' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => galwalking_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'galwalking' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => galwalking_get_text_aligns(),
				'type'    => 'control',
			),
			'h5_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'h5_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'    => esc_html__( 'H6 Heading', 'galwalking' ),
				'priority' => 35,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'galwalking' ),
				'section' => 'h6_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'galwalking' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => galwalking_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'galwalking' ),
				'section' => 'h6_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => galwalking_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'galwalking' ),
				'section'     => 'h6_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'galwalking' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'galwalking' ),
				'section'     => 'h6_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'galwalking' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => galwalking_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'galwalking' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => galwalking_get_text_aligns(),
				'type'    => 'control',
			),
			'h6_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'h6_typography',
				'default' => 'h6_text_transform',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
			),

			/** `Accent Text` section */
			'accent_typography' => array(
				'title'    => esc_html__( 'Accent Text', 'galwalking' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'accent_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'galwalking' ),
				'section' => 'accent_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'accent_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'galwalking' ),
				'section' => 'accent_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => galwalking_get_font_styles(),
				'type'    => 'control',
			),
			'accent_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'galwalking' ),
				'section' => 'accent_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => galwalking_get_font_weight(),
				'type'    => 'control',
			),
			'accent_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'accent_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'accent_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'galwalking' ),
				'section' => 'accent_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => galwalking_get_character_sets(),
				'type'    => 'control',
			),
			'accent_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'accent_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'galwalking' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'galwalking' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'galwalking' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => galwalking_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'galwalking' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => galwalking_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'galwalking' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '15',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'galwalking' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'galwalking' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'galwalking' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => galwalking_get_character_sets(),
				'type'    => 'control',
			),
			'breadcrumbs_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
			),

			/** `Meta` section */
			'meta_typography' => array(
				'title'       => esc_html__( 'Meta', 'galwalking' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'meta_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'galwalking' ),
				'section' => 'meta_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'meta_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'galwalking' ),
				'section' => 'meta_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => galwalking_get_font_styles(),
				'type'    => 'control',
			),
			'meta_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'galwalking' ),
				'section' => 'meta_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => galwalking_get_font_weight(),
				'type'    => 'control',
			),
			'meta_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'galwalking' ),
				'section'     => 'meta_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'meta_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'galwalking' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'galwalking' ),
				'section'     => 'meta_typography',
				'default'     => '1.75',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'meta_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'galwalking' ),
				'section'     => 'meta_typography',
				'default'     => '0.04',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'meta_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'galwalking' ),
				'section' => 'meta_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => galwalking_get_character_sets(),
				'type'    => 'control',
			),
			'meta_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'galwalking' ),
				'section' => 'meta_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => galwalking_get_text_transform(),
				'type'    => 'control',
			),

			/** `Typography misc` section */
			'misc_styles' => array(
				'title'    => esc_html__( 'Misc', 'galwalking' ),
				'priority' => 60,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'word_wrap' => array(
				'title'   => esc_html__( 'Enable Word Wrap', 'galwalking' ),
				'section' => 'misc_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'    => esc_html__( 'Header', 'galwalking' ),
				'priority' => 60,
				'type'     => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'    => esc_html__( 'Header Styles', 'galwalking' ),
				'priority' => 5,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'galwalking' ),
				'section' => 'header_styles',
				'default' => 'style-1',
				'field'   => 'select',
				'choices' => galwalking_get_header_layout_options(),
				'type'    => 'control',
			),
			'header_transparent_layout' => array(
				'title'   => esc_html__( 'Header transparent overlay', 'galwalking' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
				'active_callback' => '__return_false',
			),
			'header_transparent_bg' => array(
				'title'   => esc_html__( 'Header Transparent Background', 'galwalking' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#42474c',
				'type'    => 'control',
				'active_callback' => '__return_false',
			),
			'header_transparent_bg_alpha' => array(
				'title'           => esc_html__( 'Header Transparent Background Alpha', 'galwalking' ),
				'section'         => 'header_styles',
				'default'         => '20',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => '__return_false',
			),
			'header_invert_color_scheme' => array(
				'title'   => esc_html__( 'Enable invert color scheme', 'galwalking' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'galwalking' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#ffffff',
				'type'    => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'galwalking' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'galwalking' ),
				'section' => 'header_styles',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => galwalking_get_bg_repeat(),
				'type'    => 'control',
			),
			'header_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'galwalking' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => galwalking_get_bg_position(),
				'type'    => 'control',
			),
			'header_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'galwalking' ),
				'section' => 'header_styles',
				'default' => 'cover',
				'field'   => 'select',
				'choices' => galwalking_get_bg_size(),
				'type'    => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'galwalking' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => galwalking_get_bg_attachment(),
				'type'    => 'control',
			),
			'header_search' => array(
				'title'   => esc_html__( 'Show search', 'galwalking' ),
				'section' => 'header_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_btn_visibility' => array(
				'title'   => esc_html__( 'Show header call to action button', 'galwalking' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_btn_text' => array(
				'title'           => esc_html__( 'Header call to action button', 'galwalking' ),
				'description'     => esc_html__( 'Button text', 'galwalking' ),
				'section'         => 'header_styles',
				'default'         => esc_html__( 'Get In Touch', 'galwalking' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_btn_enable',
			),
			'header_btn_url' => array(
				'title'           => '',
				'description'     => esc_html__( 'Button url', 'galwalking' ),
				'section'         => 'header_styles',
				'default'         => '#',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_btn_enable',
			),
			'header_btn_target' => array(
				'title'           => esc_html__( 'Open Link in New Tab', 'galwalking' ),
				'section'         => 'header_styles',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_btn_enable',
			),
			'header_btn_style_preset' => array(
				'title'   => esc_html__( 'Button Style Preset', 'galwalking' ),
				'section' => 'header_styles',
				'default' => 'primary-transparent',
				'field'   => 'select',
				'choices' => galwalking_get_btn_style_presets(),
				'type'    => 'control',
				'active_callback' => 'galwalking_is_header_btn_enable',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'    => esc_html__( 'Top Panel', 'galwalking' ),
				'priority' => 10,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'top_panel_visibility' => array(
				'title'   => esc_html__( 'Enable top panel', 'galwalking' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_text' => array(
				'title'           => esc_html__( 'Disclaimer Text', 'galwalking' ),
				'description'     => esc_html__( 'HTML formatting support', 'galwalking' ),
				'section'         => 'header_top_panel',
				'default'         => true,
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_top_panel_enable',
			),
			'top_panel_bg'        => array(
				'title'           => esc_html__( 'Background color', 'galwalking' ),
				'section'         => 'header_top_panel',
				'default'         => '#191b32',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_top_panel_enable',
			),
			'top_menu_visibility' => array(
				'title'           => esc_html__( 'Show top menu', 'galwalking' ),
				'section'         => 'header_top_panel',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_top_panel_enable',
			),

			/** `Header contact block` section */
			'header_contact_block' => array(
				'title'       => esc_html__( 'Header Contact Block', 'galwalking' ),
				'description' => esc_html__( 'This block shows only if Top Panel section is enabled!', 'galwalking' ),
				'priority'    => 20,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Header Contact Block', 'galwalking' ),
				'section' => 'header_contact_block',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_contact_icon_1' => array(
				'title'           => esc_html__( 'Contact item 1', 'galwalking' ),
				'description'     => esc_html__( 'Choose icon', 'galwalking' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => galwalking_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_contact_block_enable',
			),
			'header_contact_label_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'galwalking' ),
				'section'         => 'header_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_contact_block_enable',
			),
			'header_contact_text_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'galwalking' ),
				'section'         => 'header_contact_block',
				'default'         => false,
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_contact_block_enable',
			),
			'header_contact_icon_2' => array(
				'title'           => esc_html__( 'Contact item 2', 'galwalking' ),
				'description'     => esc_html__( 'Choose icon', 'galwalking' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => galwalking_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_contact_block_enable',
			),
			'header_contact_label_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'galwalking' ),
				'section'         => 'header_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_contact_block_enable',
			),
			'header_contact_text_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'galwalking' ),
				'section'         => 'header_contact_block',
				'default'         => false,
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_contact_block_enable',
			),
			'header_contact_icon_3' => array(
				'title'           => esc_html__( 'Contact item 3', 'galwalking' ),
				'description'     => esc_html__( 'Choose icon', 'galwalking' ),
				'section'         => 'header_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => galwalking_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_contact_block_enable',
			),
			'header_contact_label_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'galwalking' ),
				'section'         => 'header_contact_block',
				'default'         => false,
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_contact_block_enable',
			),
			'header_contact_text_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Description', 'galwalking' ),
				'section'         => 'header_contact_block',
				'default'         => false,
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_header_contact_block_enable',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'    => esc_html__( 'Main Menu', 'galwalking' ),
				'priority' => 20,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'galwalking' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable description', 'galwalking' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'galwalking' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'galwalking' ),
				'section' => 'sidebar_settings',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'galwalking' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'galwalking' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'galwalking' ),
				),
				'type' => 'control',
			),

			'sidebar_position_post_listing' => array(
				'title'   => esc_html__( 'Sidebar Position on Blog Listing', 'galwalking' ),
				'section' => 'sidebar_settings',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'galwalking' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'galwalking' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'galwalking' ),
				),
				'type' => 'control',
			),

			'sidebar_position_post' => array(
				'title'   => esc_html__( 'Sidebar Position on Blog Post', 'galwalking' ),
				'section' => 'sidebar_settings',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'galwalking' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'galwalking' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'galwalking' ),
				),
				'type' => 'control',
			),

			/** `MailChimp` section */
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'galwalking' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'galwalking' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'galwalking' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'galwalking' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'galwalking' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'galwalking' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'galwalking' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'galwalking' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'galwalking' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'galwalking' ),
				'priority' => 110,
				'type'     => 'panel',
			),

			/** `Footer styles` section */
			'footer_styles' => array(
				'title'    => esc_html__( 'Footer Styles', 'galwalking' ),
				'priority' => 5,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_logo_visibility' => array(
				'title'   => esc_html__( 'Show Footer Logo', 'galwalking' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_logo_url' => array(
				'title'           => esc_html__( 'Logo upload', 'galwalking' ),
				'section'         => 'footer_styles',
				'field'           => 'image',
				'default'         => '%s/assets/images/footer-logo.png',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_logo_enable',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'galwalking' ),
				'section' => 'footer_styles',
				'default' => galwalking_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'galwalking' ),
				'section' => 'footer_styles',
				'default' => 'style-1',
				'field'   => 'select',
				'choices' => galwalking_get_footer_layout_options(),
				'type' => 'control',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'galwalking' ),
				'section' => 'footer_styles',
				'default' => '#f9f9f9',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_widget_area_visibility' => array(
				'title'   => esc_html__( 'Show Footer Widgets Area', 'galwalking' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_widget_columns' => array(
				'title'           => esc_html__( 'Widget Area Columns', 'galwalking' ),
				'section'         => 'footer_styles',
				'default'         => '4',
				'field'           => 'select',
				'choices'         => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_area_enable',
			),
			'footer_widgets_bg' => array(
				'title'           => esc_html__( 'Footer Widgets Area Background color', 'galwalking' ),
				'section'         => 'footer_styles',
				'default'         => '#f9f9f9',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_area_enable',
			),
			'footer_menu_visibility' => array(
				'title'   => esc_html__( 'Show Footer Menu', 'galwalking' ),
				'section' => 'footer_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Footer contact block` section */
			'footer_contact_block' => array(
				'title'    => esc_html__( 'Footer Contact Block', 'galwalking' ),
				'priority' => 10,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Footer Contact Block', 'galwalking' ),
				'section' => 'footer_contact_block',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_contact_icon_1' => array(
				'title'           => esc_html__( 'Contact item 1', 'galwalking' ),
				'description'     => esc_html__( 'Choose icon', 'galwalking' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => galwalking_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_contact_block_enable',
			),
			'footer_contact_label_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'galwalking' ),
				'section'         => 'footer_contact_block',
				'default'         => esc_html__( 'Address:', 'galwalking' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_contact_block_enable',
			),
			'footer_contact_text_1' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'galwalking' ),
				'section'         => 'footer_contact_block',
				'default'         => galwalking_get_default_contact_information( 'address' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_contact_block_enable',
			),
			'footer_contact_icon_2' => array(
				'title'           => esc_html__( 'Contact item 2', 'galwalking' ),
				'description'     => esc_html__( 'Choose icon', 'galwalking' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => galwalking_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_contact_block_enable',
			),
			'footer_contact_label_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'galwalking' ),
				'section'         => 'footer_contact_block',
				'default'         => esc_html__( 'E-mail:', 'galwalking' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_contact_block_enable',
			),
			'footer_contact_text_2' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'galwalking' ),
				'section'         => 'footer_contact_block',
				'default'         => galwalking_get_default_contact_information( 'email' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_contact_block_enable',
			),
			'footer_contact_icon_3' => array(
				'title'           => esc_html__( 'Contact item 3', 'galwalking' ),
				'description'     => esc_html__( 'Choose icon', 'galwalking' ),
				'section'         => 'footer_contact_block',
				'field'           => 'iconpicker',
				'default'         => false,
				'icon_data'       => galwalking_get_fa_icons_data(),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_contact_block_enable',
			),
			'footer_contact_label_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Label', 'galwalking' ),
				'section'         => 'footer_contact_block',
				'default'         => esc_html__( 'Phone:', 'galwalking' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_contact_block_enable',
			),
			'footer_contact_text_3' => array(
				'title'           => '',
				'description'     => esc_html__( 'Value (HTML formatting support)', 'galwalking' ),
				'section'         => 'footer_contact_block',
				'default'         => galwalking_get_default_contact_information( 'phones' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_footer_contact_block_enable',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'    => esc_html__( 'Blog Settings', 'galwalking' ),
				'priority' => 115,
				'type'     => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'galwalking' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'galwalking' ),
				'section' => 'blog',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'          => esc_html__( 'Listing', 'galwalking' ),
					'grid'             => esc_html__( 'Grid', 'galwalking' ),
					'masonry'          => esc_html__( 'Masonry', 'galwalking' ),
					'vertical-justify' => esc_html__( 'Vertical Justify', 'galwalking' ),
				),
				'type' => 'control',
			),
			'blog_layout_columns' => array(
				'title'           => esc_html__( 'Columns', 'galwalking' ),
				'section'         => 'blog',
				'default'         => '2-cols',
				'field'           => 'select',
				'choices'         => array(
					'2-cols' => esc_html__( '2 columns', 'galwalking' ),
					'3-cols' => esc_html__( '3 columns', 'galwalking' ),
					'4-cols' => esc_html__( '4 columns', 'galwalking' ),
				),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_blog_layout_type_grid_masonry',
			),
			'blog_sticky_type' => array(
				'title'   => esc_html__( 'Sticky label type', 'galwalking' ),
				'section' => 'blog',
				'default' => 'icon',
				'field'   => 'select',
				'choices' => array(
					'label' => esc_html__( 'Text Label', 'galwalking' ),
					'icon'  => esc_html__( 'Font Icon', 'galwalking' ),
					'both'  => esc_html__( 'Text with Icon', 'galwalking' ),
				),
				'type' => 'control',
			),
			'blog_sticky_icon' => array(
				'title'           => esc_html__( 'Icon for sticky post', 'galwalking' ),
				'section'         => 'blog',
				'field'           => 'iconpicker',
				'default'         => 'fa-star-o',
				'icon_data'       => galwalking_get_fa_icons_data(),
				'type'            => 'control',
				'transport'       => 'postMessage',
				'active_callback' => 'galwalking_is_sticky_icon',
			),
			'blog_sticky_label' => array(
				'title'           => esc_html__( 'Featured Post Label', 'galwalking' ),
				'description'     => esc_html__( 'Label for sticky post', 'galwalking' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Featured', 'galwalking' ),
				'field'           => 'text',
				'active_callback' => 'galwalking_is_sticky_text',
				'type'            => 'control',
				'transport'       => 'postMessage',
			),
			'blog_featured_image' => array(
				'title'           => esc_html__( 'Featured image', 'galwalking' ),
				'section'         => 'blog',
				'default'         => 'fullwidth',
				'field'           => 'select',
				'choices'         => array(
					'small'     => esc_html__( 'Small', 'galwalking' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'galwalking' ),
				),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_blog_featured_image',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'galwalking' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'galwalking' ),
					'full'    => esc_html__( 'Full content', 'galwalking' ),
					'none'    => esc_html__( 'Hide', 'galwalking' ),
				),
				'type' => 'control',
			),
			'blog_posts_content_length' => array(
				'title'           => esc_html__( 'Number of words in the excerpt', 'galwalking' ),
				'section'         => 'blog',
				'default'         => '30',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_blog_posts_content_type_excerpt',
			),
			'blog_read_more_btn' => array(
				'title'   => esc_html__( 'Show Read More button', 'galwalking' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_read_more_text' => array(
				'title'           => esc_html__( 'Read More button text', 'galwalking' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Read more', 'galwalking' ),
				'field'           => 'text',
				'type'            => 'control',
				'transport'       => 'postMessage',
				'active_callback' => 'galwalking_is_blog_read_more_btn_enable',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'galwalking' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'galwalking' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'galwalking' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'galwalking' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'galwalking' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_trend_views' => array(
				'title'   => esc_html__( 'Show views counter', 'galwalking' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
				'active_callback' => 'galwalking_is_cherry_trending_posts_activated',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'galwalking' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'galwalking' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'galwalking' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'galwalking' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'galwalking' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'galwalking' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_trend_views' => array(
				'title'   => esc_html__( 'Show views counter', 'galwalking' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
				'active_callback' => 'galwalking_is_cherry_trending_posts_activated',
			),
			'single_post_trend_rating' => array(
				'title'   => esc_html__( 'Show rating', 'galwalking' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
				'active_callback' => 'galwalking_is_cherry_trending_posts_activated',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'galwalking' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation' => array(
				'title'   => esc_html__( 'Enable post navigation', 'galwalking' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'galwalking' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'galwalking' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'           => esc_html__( 'Related posts block title', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => esc_html__( 'Related posts', 'galwalking' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
				'transport'       => 'postMessage',
			),
			'related_posts_count' => array(
				'title'           => esc_html__( 'Number of post', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_grid' => array(
				'title'           => esc_html__( 'Layout', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'select',
				'choices'         => array(
					'2' => esc_html__( '2 columns', 'galwalking' ),
					'3' => esc_html__( '3 columns', 'galwalking' ),
					'4' => esc_html__( '4 columns', 'galwalking' ),
				),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_title' => array(
				'title'           => esc_html__( 'Show post title', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_title_length' => array(
				'title'           => esc_html__( 'Number of words in the title', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => '10',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_image' => array(
				'title'           => esc_html__( 'Show post image', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_content' => array(
				'title'           => esc_html__( 'Display content', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => 'hide',
				'field'           => 'select',
				'choices'         => array(
					'hide'         => esc_html__( 'Hide', 'galwalking' ),
					'post_excerpt' => esc_html__( 'Excerpt', 'galwalking' ),
					'post_content' => esc_html__( 'Content', 'galwalking' ),
				),
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_content_length' => array(
				'title'           => esc_html__( 'Number of words in the content', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => '10',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_categories' => array(
				'title'           => esc_html__( 'Show post categories', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_tags' => array(
				'title'           => esc_html__( 'Show post tags', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_author' => array(
				'title'           => esc_html__( 'Show post author', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_publish_date' => array(
				'title'           => esc_html__( 'Show post publish date', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),
			'related_posts_comment_count' => array(
				'title'           => esc_html__( 'Show post comment count', 'galwalking' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'galwalking_is_related_posts_enable',
			),

			/** `404` panel */
			'page_404_options' => array(
				'title'    => esc_html__( '404 Page Style', 'galwalking' ),
				'priority' => 130,
				'type'     => 'section',
			),
			'page_404_bg_color' => array(
				'title'     => esc_html__( 'Background Color', 'galwalking' ),
				'section'   => 'page_404_options',
				'field'     => 'hex_color',
				'default'   => '#000000',
				'type'      => 'control',
			),
			'page_404_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'galwalking' ),
				'section' => 'page_404_options',
				'field'   => 'image',
				'default' => '%s/assets/images/bg_404.jpg',
				'type'    => 'control',
			),
			'page_404_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'galwalking' ),
				'section' => 'page_404_options',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => galwalking_get_bg_repeat(),
				'type' => 'control',
			),
			'page_404_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'galwalking' ),
				'section' => 'page_404_options',
				'default' => 'center',
				'field'   => 'select',
				'choices' => galwalking_get_bg_position(),
				'type' => 'control',
			),
			'page_404_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'galwalking' ),
				'section' => 'page_404_options',
				'default' => 'cover',
				'field'   => 'select',
				'choices' => galwalking_get_bg_size(),
				'type' => 'control',
			),
			'page_404_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'galwalking' ),
				'section' => 'page_404_options',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => galwalking_get_bg_attachment(),
				'type' => 'control',
			),
			'page_404_text_color' => array(
				'title'       => esc_html__( 'Text Color', 'galwalking' ),
				'description' => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'galwalking' ),
				'section'     => 'page_404_options',
				'default'     => 'light',
				'field'       => 'select',
				'choices'     => galwalking_get_text_color(),
				'type'        => 'control',
			),
			'page_404_btn_style_preset' => array(
				'title'   => esc_html__( 'Button Style Preset', 'galwalking' ),
				'section' => 'page_404_options',
				'default' => 'primary',
				'field'   => 'select',
				'choices' => galwalking_get_btn_style_presets(),
				'type'    => 'control',
			),
		),
	) );
}

/**
 * Return true if setting is value. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function galwalking_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function galwalking_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_header_logo_image( $control ) {
	return galwalking_is_setting( $control, 'header_logo_type', 'image' );
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_header_logo_text( $control ) {
	return galwalking_is_setting( $control, 'header_logo_type', 'text' );
}

/**
 * Return blog-featured-image true if blog layout type is default. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_blog_featured_image( $control ) {
	return galwalking_is_setting( $control, 'blog_layout_type', 'default' );
}

/**
 * Return true if sticky label type set to text or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_sticky_text( $control ) {
	return galwalking_is_not_setting( $control, 'blog_sticky_type', 'icon' );
}

/**
 * Return true if sticky label type set to icon or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_sticky_icon( $control ) {
	return galwalking_is_not_setting( $control, 'blog_sticky_type', 'label' );
}

/**
 * Return true if option Show Header Contact Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_header_contact_block_enable( $control ) {
	return galwalking_is_setting( $control, 'header_contact_block_visibility', true );
}

/**
 * Return true if option Show Footer Contact Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_footer_contact_block_enable( $control ) {
	return galwalking_is_setting( $control, 'footer_contact_block_visibility', true );
}

/**
 * Return true if option Show Related Posts Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_related_posts_enable( $control ) {
	return galwalking_is_setting( $control, 'related_posts_visible', true );
}

/**
 * Return true if option Enable Top Panel is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_top_panel_enable( $control ) {
	return galwalking_is_setting( $control, 'top_panel_visibility', true );
}

/**
 * Return true if option Show Footer Logo is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_footer_logo_enable( $control ) {
	return galwalking_is_setting( $control, 'footer_logo_visibility', true );
}

/**
 * Return true if option Show Footer Widgets Area is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_footer_area_enable( $control ) {
	return galwalking_is_setting( $control, 'footer_widget_area_visibility', true );
}

/**
 * Return true if option Blog posts content is excerpt. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_blog_posts_content_type_excerpt( $control ) {
	return galwalking_is_setting( $control, 'blog_posts_content', 'excerpt' );
}

/**
 * Return true if option Show Read More button is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_blog_read_more_btn_enable( $control ) {
	return galwalking_is_setting( $control, 'blog_read_more_btn', true );
}

/**
 * Return true if Blog layout selected Grid or Masonry. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_blog_layout_type_grid_masonry( $control ) {
	if ( in_array( $control->manager->get_setting( 'blog_layout_type' )->value(), array( 'grid', 'masonry' ) ) ) {
		return true;
	}

	return false;
}

/**
 * Return true if option Show header call to action button is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_header_btn_enable( $control ) {
	return galwalking_is_setting( $control, 'header_btn_visibility', true );
}

/**
 * Return true if option Show Page Preloader is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_page_preloader_enable( $control ) {
	return galwalking_is_setting( $control, 'page_preloader', true );
}

/**
 * Return true if option Page type is boxed. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function galwalking_is_page_type_boxed( $control ) {
	return galwalking_is_setting( $control, 'page_container_type', 'boxed' );
}

/**
 * Get default header layouts.
 *
 * @since  1.0.0
 * @return array
 */
function galwalking_get_header_layout_options() {
	return apply_filters( 'galwalking_header_layout_options', array(
		'style-1' => esc_html__( 'Style 1', 'galwalking' ),
		'style-2' => esc_html__( 'Style 2', 'galwalking' ),
		'style-3' => esc_html__( 'Style 3', 'galwalking' ),
		'style-4' => esc_html__( 'Style 4', 'galwalking' ),
	) );
}

/**
 * Get default footer layouts.
 *
 * @since  1.0.0
 * @return array
 */
function galwalking_get_footer_layout_options() {
	return apply_filters( 'galwalking_footer_layout_options', array(
		'style-1' => esc_html__( 'Style 1', 'galwalking' ),
		'style-2' => esc_html__( 'Style 2', 'galwalking' ),
	) );
}

/**
 * Get default header layouts options for Post Meta boxes
 *
 * @return array
 */
function galwalking_get_header_layout_pm_options() {
	$inherit_option = array(
		'inherit' => esc_html__( 'Inherit', 'galwalking' ),
	);

	$options = galwalking_get_header_layout_options();

	return array_merge( $inherit_option, $options );
}

/**
 * Get default footer layouts options for Post Meta boxes
 *
 * @return array
 */
function galwalking_get_footer_layout_pm_options() {
	$inherit_option = array(
		'inherit' => esc_html__( 'Inherit', 'galwalking' ),
	);

	$options = galwalking_get_footer_layout_options();

	return array_merge( $inherit_option, $options );
}

// Change native customizer control (based on WordPress core).
add_action( 'customize_register', 'galwalking_customizer_change_core_controls', 20 );

// Bind JS handlers to instantly live-preview changes.
add_action( 'customize_preview_init', 'galwalking_customize_preview_js' );

/**
 * Change native customize control (based on WordPress core).
 *
 * @since 1.0.0
 * @param  object $wp_customize Object wp_customize.
 * @return void
 */
function galwalking_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section         = 'galwalking_logo_favicon';
	$wp_customize->get_section( 'background_image' )->priority = 45;
	$wp_customize->get_control( 'background_color' )->label    = esc_html__( 'Body Background Color', 'galwalking' );

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function galwalking_customize_preview_js() {
	wp_enqueue_script( 'galwalking-customize-preview', GALWALKING_THEME_JS . '/customize-preview.js', array( 'customize-preview' ), '1.0', true );
}

// Set customize selective refresh.
add_action( 'customize_register', 'galwalking_customizer_selective_refresh', 20 );

/**
 * Set customize selective refresh.
 *
 * @since 1.0.0
 * @param  object $wp_customize Object wp_customize.
 * @return void
 */
function galwalking_customizer_selective_refresh( $wp_customize ) {}

// Typography utility function
/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function galwalking_get_font_styles() {
	return apply_filters( 'galwalking_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'galwalking' ),
		'italic'  => esc_html__( 'Italic', 'galwalking' ),
		'oblique' => esc_html__( 'Oblique', 'galwalking' ),
		'inherit' => esc_html__( 'Inherit', 'galwalking' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function galwalking_get_character_sets() {
	return apply_filters( 'galwalking_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'galwalking' ),
		'greek'        => esc_html__( 'Greek', 'galwalking' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'galwalking' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'galwalking' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'galwalking' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'galwalking' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'galwalking' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function galwalking_get_text_aligns() {
	return apply_filters( 'galwalking_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'galwalking' ),
		'center'  => esc_html__( 'Center', 'galwalking' ),
		'justify' => esc_html__( 'Justify', 'galwalking' ),
		'left'    => esc_html__( 'Left', 'galwalking' ),
		'right'   => esc_html__( 'Right', 'galwalking' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function galwalking_get_font_weight() {
	return apply_filters( 'galwalking_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Get tesx transform.
 *
 * @since 1.0.0
 * @return array
 */
function galwalking_get_text_transform() {
	return apply_filters( 'galwalking_get_text_transform', array(
		'none'       => esc_html__( 'None ', 'galwalking' ),
		'uppercase'  => esc_html__( 'Uppercase ', 'galwalking' ),
		'lowercase'  => esc_html__( 'Lowercase', 'galwalking' ),
		'capitalize' => esc_html__( 'Capitalize', 'galwalking' ),
	) );
}

// Background utility function
/**
 * Get background position
 *
 * @since 1.0.0
 * @return array
 */
function galwalking_get_bg_position() {
	return apply_filters( 'galwalking_get_bg_position', array(
		'top-left'      => esc_html__( 'Top Left', 'galwalking' ),
		'top-center'    => esc_html__( 'Top Center', 'galwalking' ),
		'top-right'     => esc_html__( 'Top Right', 'galwalking' ),
		'center-left'   => esc_html__( 'Middle Left', 'galwalking' ),
		'center'        => esc_html__( 'Middle Center', 'galwalking' ),
		'center-right'  => esc_html__( 'Middle Right', 'galwalking' ),
		'bottom-left'   => esc_html__( 'Bottom Left', 'galwalking' ),
		'bottom-center' => esc_html__( 'Bottom Center', 'galwalking' ),
		'bottom-right'  => esc_html__( 'Bottom Right', 'galwalking' ),
	) );
}

/**
 * Get background size
 *
 * @since 1.0.0
 * @return array
 */
function galwalking_get_bg_size() {
	return apply_filters( 'galwalking_get_bg_size', array(
		'auto'    => esc_html__( 'Auto', 'galwalking' ),
		'cover'   => esc_html__( 'Cover', 'galwalking' ),
		'contain' => esc_html__( 'Contain', 'galwalking' ),
	) );
}

/**
 * Get background repeat
 *
 * @since 1.0.0
 * @return array
 */
function galwalking_get_bg_repeat() {
	return apply_filters( 'galwalking_get_bg_repeat', array(
		'no-repeat' => esc_html__( 'No Repeat', 'galwalking' ),
		'repeat'    => esc_html__( 'Tile', 'galwalking' ),
		'repeat-x'  => esc_html__( 'Tile Horizontally', 'galwalking' ),
		'repeat-y'  => esc_html__( 'Tile Vertically', 'galwalking' ),
	) );
}

/**
 * Get background attachment
 *
 * @since 1.0.0
 * @return array
 */
function galwalking_get_bg_attachment() {
	return apply_filters( 'galwalking_get_bg_attachment', array(
		'scroll' => esc_html__( 'Scroll', 'galwalking' ),
		'fixed'  => esc_html__( 'Fixed', 'galwalking' ),
	) );
}

/**
 * Get text color
 *
 * @since 1.0.0
 * @return array
 */
function galwalking_get_text_color() {
	return apply_filters( 'galwalking_get_text_color', array(
		'light' => esc_html__( 'Light', 'galwalking' ),
		'dark'  => esc_html__( 'Dark', 'galwalking' ),
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function galwalking_get_dynamic_css_options() {
	return apply_filters( 'galwalking_get_dynamic_css_options', array(
		'prefix'        => 'galwalking',
		'type'          => 'theme_mod',
		'parent_handle' => 'galwalking-theme-style',
		'single'        => true,
		'css_files'     => array(
			galwalking_get_locate_template( 'assets/css/dynamic/dynamic.css' ),

			galwalking_get_locate_template( 'assets/css/dynamic/site/elements.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/site/header.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/site/forms.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/site/social.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/site/menus.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/site/post.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/site/navigation.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/site/footer.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/site/misc.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/site/buttons.css' ),

			galwalking_get_locate_template( 'assets/css/dynamic/widgets/widget-default.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/widgets/subscribe.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/widgets/custom-posts.css' ),
			galwalking_get_locate_template( 'assets/css/dynamic/widgets/contact-information.css' ),
		),
		'options' => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_line_height',
			'header_logo_font_family',
			'header_logo_letter_spacing',
			'header_logo_text_transform',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',
			'body_text_transform',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',
			'h1_text_transform',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',
			'h2_text_transform',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',
			'h3_text_transform',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',
			'h4_text_transform',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',
			'h5_text_transform',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',
			'h6_text_transform',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_text_transform',

			'breadcrumbs_bg_color',
			'breadcrumbs_bg_image',
			'breadcrumbs_bg_repeat',
			'breadcrumbs_bg_position',
			'breadcrumbs_bg_size',
			'breadcrumbs_bg_attachment',
			'breadcrumbs_padding_y',
			'breadcrumbs_padding_y_tablet',
			'breadcrumbs_padding_y_mobile',

			'meta_font_style',
			'meta_font_weight',
			'meta_font_size',
			'meta_line_height',
			'meta_font_family',
			'meta_letter_spacing',
			'meta_text_transform',

			'accent_font_style',
			'accent_font_weight',
			'accent_font_family',
			'accent_letter_spacing',
			'accent_text_transform',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'grey_color_1',
			'grey_color_2',

			'page_bg_color',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position',
			'header_bg_attachment',
			'header_bg_size',

			'header_transparent_bg',
			'header_transparent_bg_alpha',

			'page_404_bg_color',
			'page_404_bg_image',
			'page_404_bg_repeat',
			'page_404_bg_position',
			'page_404_bg_attachment',
			'page_404_bg_size',

			'top_panel_bg',
			'page_preloader_bg',

			'page_boxed_width',
			'container_width',

			'footer_widgets_bg',
			'footer_bg',

			'onsale_badge_bg',
			'featured_badge_bg',
			'new_badge_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function galwalking_get_fonts_options() {
	return apply_filters( 'galwalking_get_fonts_options', array(
		'prefix'  => 'galwalking',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'meta' => array(
				'family'  => 'meta_font_family',
				'style'   => 'meta_font_style',
				'weight'  => 'meta_font_weight',
				'charset' => 'meta_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'accent' => array(
				'family'  => 'accent_font_family',
				'style'   => 'accent_font_style',
				'weight'  => 'accent_font_weight',
				'charset' => 'accent_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
		),
	) );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function galwalking_get_default_footer_copyright() {
	return esc_html__( '&copy; %%year%% %%site-name%%. All rights reserved.', 'galwalking' );
}

/**
 * Get default contact information.
 *
 * @since  1.0.0
 * @return string
 */
function galwalking_get_default_contact_information( $value ) {
	$contact_information = array(
		'address'   => esc_html__( '4096 N Highland St, Arlington VA 32101, USA', 'galwalking' ),
		'address-2' => esc_html__( '121 WallStreet Street, NY York, USA', 'galwalking' ),
		'phones'    => sprintf( '<a href="tel:#">%1$s</a>', esc_html__( '800 1234 56 78', 'galwalking' ) ),
		'email'     => sprintf( '<a href="mailto:%1$s">%1$s</a>', esc_html__( 'info@company.com', 'galwalking' ) ),
	);

	return $contact_information[ $value ];
}

/**
 * Get FontAwesome icons set
 *
 * @return array
 */
function galwalking_get_icons_set() {

	static $font_icons;

	if ( ! $font_icons ) {

		ob_start();

		include GALWALKING_THEME_DIR . '/assets/js/icons.json';
		$json = ob_get_clean();

		$font_icons = array();
		$icons      = json_decode( $json, true );

		foreach ( $icons['icons'] as $icon ) {
			$font_icons[] = $icon['id'];
		}
	}

	return $font_icons;
}

function galwalking_get_fa_icons_data() {
	return apply_filters( 'galwalking_get_fa_icons_data', array(
		'icon_set'    => 'galwalkingFontAwesome',
		'icon_css'    => GALWALKING_THEME_URI . '/assets/css/font-awesome.min.css',
		'icon_base'   => 'fa',
		'icon_prefix' => 'fa-',
		'icons'       => galwalking_get_icons_set(),
	) );
}

/**
 * Get iconsmind icons set.
 *
 * @return array
 */
function galwalking_get_iconsmind_icons_set() {

	static $iconsmind_icons;

	if ( ! $iconsmind_icons ) {
		ob_start();

		include GALWALKING_THEME_DIR . '/assets/css/iconsmind.min.css';

		$result = ob_get_clean();

		preg_match_all( '/\.([-_a-zA-Z0-9]+):before[, {]/', $result, $matches );

		if ( ! is_array( $matches ) || empty( $matches[1] ) ) {
			return;
		}

		$iconsmind_icons = $matches[1];
	}

	return $iconsmind_icons;
}

/**
 * Get iconsmind icons data for iconpicker control.
 *
 * @return array
 */
function galwalking_get_iconsmind_icons_data() {
	return apply_filters( 'galwalking_get_iconsmind_icons_data', array(
		'icon_set'    => 'galwalkingIconsmindIcons',
		'icon_css'    => GALWALKING_THEME_URI . '/assets/css/iconsmind.min.css',
		'icon_base'   => 'iconsmind',
		'icon_prefix' => '',
		'icons'       => galwalking_get_iconsmind_icons_set(),
	) );
}

/**
 * Get header button style presets.
 *
 * @return array
 */
function galwalking_get_btn_style_presets() {
	return apply_filters( 'galwalking_get_btn_style_presets', array(
		'primary'             => esc_html__( 'Primary', 'galwalking' ),
		'secondary'           => esc_html__( 'Secondary', 'galwalking' ),
		'primary-transparent' => esc_html__( 'Primary Transparent', 'galwalking' ),
		'grey'                => esc_html__( 'Grey', 'galwalking' ),
	) );
}
