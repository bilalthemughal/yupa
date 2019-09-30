<?php
/**
 * Post meta configuration.
 *
 * @package Galwalking
 */

/**
 * Get post meta settings.
 *
 * @return array
 */
function galwalking_get_post_meta_settings() {

	$container_options = array(
		'inherit'   => array(
			'label'   => esc_html__( 'Inherit', 'galwalking' ),
			'img_src' => trailingslashit( GALWALKING_THEME_URI ) . 'assets/images/admin/inherit.svg',
		),
		'boxed'     => array(
			'label'   => esc_html__( 'Boxed', 'galwalking' ),
			'img_src' => trailingslashit( GALWALKING_THEME_URI ) . 'assets/images/admin/type-boxed.svg',
		),
		'fullwidth' => array(
			'label'   => esc_html__( 'Fullwidth', 'galwalking' ),
			'img_src' => trailingslashit( GALWALKING_THEME_URI ) . 'assets/images/admin/type-fullwidth.svg',
		),
	);

	return apply_filters( 'galwalking_get_post_meta_settings',  array(
		'id'            => 'page-settings',
		'title'         => esc_html__( 'Page settings', 'galwalking' ),
		'page'          => array( 'post', 'page', 'team', 'projects', 'cherry-services' ),
		'context'       => 'normal',
		'priority'      => 'high',
		'callback_args' => false,
		'fields'        => array(
			'tabs' => array(
				'element' => 'component',
				'type'    => 'component-tab-horizontal',
			),
			'layout_tab' => array(
				'element'     => 'settings',
				'parent'      => 'tabs',
				'title'       => esc_html__( 'Layout Options', 'galwalking' ),
			),
			'header_tab' => array(
				'element'     => 'settings',
				'parent'      => 'tabs',
				'title'       => esc_html__( 'Header Style', 'galwalking' ),
				'description' => esc_html__( 'Header style settings', 'galwalking' ),
			),
			'header_elements_tab' => array(
				'element'     => 'settings',
				'parent'      => 'tabs',
				'title'       => esc_html__( 'Header Elements', 'galwalking' ),
				'description' => esc_html__( 'Enable/Disable header elements', 'galwalking' ),
			),
			'breadcrumbs_tab' => array(
				'element'     => 'settings',
				'parent'      => 'tabs',
				'title'       => esc_html__( 'Breadcrumbs', 'galwalking' ),
				'description' => esc_html__( 'Breadcrumbs settings', 'galwalking' ),
			),
			'footer_tab' => array(
				'element'     => 'settings',
				'parent'      => 'tabs',
				'title'       => esc_html__( 'Footer Settings', 'galwalking' ),
				'description' => esc_html__( 'Footer settings', 'galwalking' ),
			),
			'galwalking_sidebar_position' => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Sidebar layout', 'galwalking' ),
				'description'   => esc_html__( 'Sidebar position global settings redefining. If you select inherit option, global setting will be applied for this layout', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => array(
					'inherit' => array(
						'label'   => esc_html__( 'Inherit', 'galwalking' ),
						'img_src' => trailingslashit( GALWALKING_THEME_URI ) . 'assets/images/admin/inherit.svg',
					),
					'one-left-sidebar' => array(
						'label'   => esc_html__( 'Sidebar on left side', 'galwalking' ),
						'img_src' => trailingslashit( GALWALKING_THEME_URI ) . 'assets/images/admin/page-layout-left-sidebar.svg',
					),
					'one-right-sidebar' => array(
						'label'   => esc_html__( 'Sidebar on right side', 'galwalking' ),
						'img_src' => trailingslashit( GALWALKING_THEME_URI ) . 'assets/images/admin/page-layout-right-sidebar.svg',
					),
					'fullwidth' => array(
						'label'   => esc_html__( 'No sidebar', 'galwalking' ),
						'img_src' => trailingslashit( GALWALKING_THEME_URI ) . 'assets/images/admin/page-layout-fullwidth.svg',
					),
				),
			),
			'galwalking_page_container_type' => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Page type', 'galwalking' ),
				'description'   => esc_html__( 'Page type global settings redefining. If you select inherit option, global setting will be applied for this layout', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => $container_options,
			),
			'galwalking_header_container_type' => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Header container type', 'galwalking' ),
				'description'   => esc_html__( 'Header container type global settings redefining. If you select inherit option, global setting will be applied for this layout', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => $container_options,
			),
			'galwalking_breadcrumbs_container_type' => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Breadcrumbs container type', 'galwalking' ),
				'description'   => esc_html__( 'Breadcrumbs container type global settings redefining. If you select inherit option, global setting will be applied for this layout', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => $container_options,
			),
			'galwalking_content_container_type' => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Content container type', 'galwalking' ),
				'description'   => esc_html__( 'Content container type global settings redefining. If you select inherit option, global setting will be applied for this layout', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => $container_options,
			),
			'galwalking_footer_container_type'  => array(
				'type'          => 'radio',
				'parent'        => 'layout_tab',
				'title'         => esc_html__( 'Footer container type', 'galwalking' ),
				'description'   => esc_html__( 'Footer container type global settings redefining. If you select inherit option, global setting will be applied for this layout', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options'       => $container_options,
			),
			'galwalking_header_layout_type' => array(
				'type'    => 'select',
				'parent'  => 'header_tab',
				'title'   => esc_html__( 'Header Layout', 'galwalking' ),
				'value'   => 'inherit',
				'options' => galwalking_get_header_layout_pm_options(),
			),
			'galwalking_header_transparent_layout' => array(
				'type'          => 'radio',
				'parent'        => 'header_tab',
				'title'         => esc_html__( 'Header Transparent Overlay', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => array(
						'label' => esc_html__( 'Inherit', 'galwalking' ),
					),
					'true'    => array(
						'label' => esc_html__( 'Enable', 'galwalking' ),
						'slave' => 'header-transparent',
					),
					'false'   => array(
						'label' => esc_html__( 'Disable', 'galwalking' ),
					),
				),
			),
			'galwalking_header_transparent_bg' => array(
				'type'          => 'colorpicker',
				'parent'        => 'header_tab',
				'title'         => esc_html__( 'Header Transparent Background', 'galwalking' ),
				'value'         => '',
				'master'        => 'header-transparent',
				'display_input' => false,
			),
			'galwalking_header_transparent_bg_alpha' => array(
				'type'          => 'slider',
				'parent'        => 'header_tab',
				'title'         => esc_html__( 'Header Transparent Background Alpha', 'galwalking' ),
				'max_value'     => 100,
				'min_value'     => -1,
				'step_value'    => 1,
				'master'        => 'header-transparent',
				'display_input' => false,
			),
			'galwalking_header_invert_color_scheme' => array(
				'type'          => 'radio',
				'parent'        => 'header_tab',
				'title'         => esc_html__( 'Invert Color Scheme', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => array(
						'label' => esc_html__( 'Inherit', 'galwalking' ),
					),
					'true'    => array(
						'label' => esc_html__( 'Enable', 'galwalking' ),
					),
					'false'   => array(
						'label' => esc_html__( 'Disable', 'galwalking' ),
					),
				),
			),
			'galwalking_top_panel_visibility' => array(
				'type'          => 'select',
				'parent'        => 'header_elements_tab',
				'title'         => esc_html__( 'Top panel', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'galwalking' ),
					'true'    => esc_html__( 'Enable', 'galwalking' ),
					'false'   => esc_html__( 'Disable', 'galwalking' ),
				),
			),
			'galwalking_header_contact_block_visibility' => array(
				'type'          => 'select',
				'parent'        => 'header_elements_tab',
				'title'         => esc_html__( 'Header Contact Block', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'galwalking' ),
					'true'    => esc_html__( 'Enable', 'galwalking' ),
					'false'   => esc_html__( 'Disable', 'galwalking' ),
				),
			),
			'galwalking_header_search' => array(
				'type'          => 'select',
				'parent'        => 'header_elements_tab',
				'title'         => esc_html__( 'Header Search', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'galwalking' ),
					'true'    => esc_html__( 'Enable', 'galwalking' ),
					'false'   => esc_html__( 'Disable', 'galwalking' ),
				),
			),
			'galwalking_breadcrumbs_visibillity' => array(
				'type'          => 'radio',
				'parent'        => 'breadcrumbs_tab',
				'title'         => esc_html__( 'Breadcrumbs visibillity', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => array(
						'label' => esc_html__( 'Inherit', 'galwalking' ),
					),
					'true'    => array(
						'label' => esc_html__( 'Enable', 'galwalking' ),
					),
					'false'   => array(
						'label' => esc_html__( 'Disable', 'galwalking' ),
					),
				),
			),
			'galwalking_footer_layout_type' => array(
				'type'    => 'select',
				'parent'  => 'footer_tab',
				'title'   => esc_html__( 'Footer Layout', 'galwalking' ),
				'value'   => 'inherit',
				'options' => galwalking_get_footer_layout_pm_options(),
			),
			'galwalking_footer_widget_area_visibility' => array(
				'type'          => 'select',
				'parent'        => 'footer_tab',
				'title'         => esc_html__( 'Footer Widgets Area', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'galwalking' ),
					'true'    => esc_html__( 'Enable', 'galwalking' ),
					'false'   => esc_html__( 'Disable', 'galwalking' ),
				),
			),
			'galwalking_footer_contact_block_visibility' => array(
				'type'          => 'select',
				'parent'        => 'footer_tab',
				'title'         => esc_html__( 'Footer Contact Block', 'galwalking' ),
				'value'         => 'inherit',
				'display_input' => false,
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'galwalking' ),
					'true'    => esc_html__( 'Enable', 'galwalking' ),
					'false'   => esc_html__( 'Disable', 'galwalking' ),
				),
			),
		),
	) ) ;
}
