<?php
/**
 * Theme hooks.
 *
 * @package Galwalking
 */

// Menu description.
add_filter( 'walker_nav_menu_start_el', 'galwalking_nav_menu_description', 10, 4 );

// Sidebars classes.
add_filter( 'galwalking_widget_area_classes', 'galwalking_set_sidebar_classes', 10, 2 );

// Set footer columns.
add_filter( 'dynamic_sidebar_params', 'galwalking_get_footer_widget_layout' );

// Adapt default image post format classes to current theme.
add_filter( 'cherry_post_formats_image_css_model', 'galwalking_add_image_format_classes', 10, 2 );

// Enqueue misc js script.
add_filter( 'galwalking_theme_script_depends', 'galwalking_enqueue_misc' );

// Add to toTop and stickUp properties if required.
add_filter( 'galwalking_theme_script_variables', 'galwalking_js_vars' );

// Add has/no thumbnail classes for posts.
add_filter( 'post_class', 'galwalking_post_thumb_classes' );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'galwalking_modify_comment_form' );

// Reorder comment fields
add_filter( 'comment_form_fields', 'galwalking_reorder_comment_fields' );

// Additional body classes.
add_filter( 'body_class', 'galwalking_extra_body_classes' );

// Render macros in text widgets.
add_filter( 'widget_text', 'galwalking_render_widget_macros', 10, 3 );

// Adds the meta viewport to the header.
add_action( 'wp_head', 'galwalking_meta_viewport', 0 );

// Customization for `Tag Cloud` widget.
add_filter( 'widget_tag_cloud_args', 'galwalking_customize_tag_cloud' );

// Changed excerpt more string.
add_filter( 'excerpt_more', 'galwalking_excerpt_more' );

// Creating wrappers for audio shortcode.
add_filter( 'wp_audio_shortcode', 'galwalking_audio_shortcode', 10, 5 );
add_filter( 'cherry_get_the_post_audio', 'galwalking_cherry_get_the_post_audio' );

// Set specific customizer settings.
add_filter( 'theme_mod_sidebar_position', 'galwalking_specific_sidebar_position' );
add_filter( 'theme_mod_content_container_type', 'galwalking_specific_content_container_type' );

// Change gallery image size into single post and non-sidebar layout.
add_filter( 'cherry_get_the_post_gallery_defaults', 'galwalking_post_gallery_img_size', 10, 3 );

// Add invert classes if breadcrumbs sections is darken.
add_filter( 'cherry_breadcrumbs_wrapper_classes', 'galwalking_cherry_breadcrumbs_wrapper_classes' );

// Add dynamic css function.
add_filter( 'cherry_css_func_list', 'galwalking_add_dynamic_css_function' );

// Check for theme updates.
add_filter( 'http_request_args', 'galwalking_disable_wporg_request', 5, 2 );

// Add dynamic css plugins files.
add_filter( 'galwalking_get_dynamic_css_options', 'galwalking_add_dynamic_css_plugins_files' );

// Add dynamic css variables.
add_filter( 'cherry_css_variables', 'galwalking_dynamic_css_variables', 10, 2 );

// Modify background-image dynamic css variables.
add_filter( 'cherry_css_variables', 'galwalking_modify_bg_img_variables', 10, 2 );

// Modify cherry sidebar post types list.
add_filter( 'cherry_sidebar_post_type', 'galwalking_modify_cherry_sidebar_post_types_list' );

// Modify tm-pg-gallery list css class.
add_filter( 'tm-pg-gallery-list-class', 'galwalking_modify_tm_pg_gallery_list_class' );

// Add additional options to jet menu.
add_action( 'jet-menu/options-page/section-end/styles_tab', 'galwalking_jet_menu_additional_options', 10, 2 );
add_filter( 'jet-menu/menu-css/scheme', 'galwalking_modify_jet_menu_css_scheme' );

// Modify cherry-search thumbnail size.
add_filter( 'cherry_search_thumbnail_size', 'galwalking_modify_cherry_search_thumbnail_size' );

/**
 * Append description into nav items
 *
 * @param  string $item_output The menu item output.
 * @param  WP_Post $item Menu item object.
 * @param  int $depth Depth of the menu.
 * @param  array $args wp_nav_menu() arguments.
 *
 * @return string
 */
function galwalking_nav_menu_description( $item_output, $item, $depth, $args ) {

	if ( 'main' !== $args->theme_location || ! $item->description ) {
		return $item_output;
	}

	$descr_enabled = get_theme_mod(
		'header_menu_attributes',
		galwalking_theme()->customizer->get_default( 'header_menu_attributes' )
	);

	if ( ! $descr_enabled ) {
		return $item_output;
	}

	$current     = $args->link_after . '</a>';
	$description = '<div class="menu-item__desc">' . $item->description . '</div>';
	$item_output = str_replace( $current, $description . $current, $item_output );

	return $item_output;
}

/**
 * Set layout classes for sidebars.
 *
 * @since  1.0.0
 * @uses   galwalking_get_layout_classes.
 *
 * @param  array $classes Additional classes.
 * @param  string $area_id Sidebar ID.
 *
 * @return array
 */
function galwalking_set_sidebar_classes( $classes, $area_id ) {

	if ( 'sidebar' == $area_id || 'shop-sidebar' === $area_id ) {
		if ( $area_id === 'shop-sidebar' ) {
			$classes[] .= 'sidebar';
		}

		return galwalking_get_layout_classes( 'sidebar', $classes );
	}

	if ( 'footer-area' == $area_id ) {
		$columns = get_theme_mod( 'footer_widget_columns', galwalking_theme()->customizer->get_default( 'footer_widget_columns' ) );

		if ( '1' !== $columns ) {
			$classes[] = sprintf( 'footer-area--%s-cols', $columns );
		} else {
			$classes[] = 'footer-area--fullwidth';
		}

		$classes[] = 'row';
	}

	return $classes;
}

/**
 * Get footer widgets layout class
 *
 * @since  1.0.0
 *
 * @param  string $params Existing widget classes.
 *
 * @return string
 */
function galwalking_get_footer_widget_layout( $params ) {

	if ( is_admin() ) {
		return $params;
	}

	if ( empty( $params[0]['id'] ) || 'footer-area' !== $params[0]['id'] ) {
		return $params;
	}

	if ( empty( $params[0]['before_widget'] ) ) {
		return $params;
	}

	$columns = get_theme_mod(
		'footer_widget_columns',
		galwalking_theme()->customizer->get_default( 'footer_widget_columns' )
	);

	$columns = intval( $columns );
	$classes = 'class="col-xs-12 col-sm-%3$s col-md-%2$s col-lg-%1$s %4$s ';

	switch ( $columns ) {
		case 4:
			$lg_col = 3;
			$md_col = 6;
			$sm_col = 12;
			$extra  = '';
			break;

		case 3:
			$lg_col = 4;
			$md_col = 4;
			$sm_col = 12;
			$extra  = '';
			break;

		case 2:
			$lg_col = 6;
			$md_col = 6;
			$sm_col = 12;
			$extra  = '';
			break;

		default:
			$lg_col = 12;
			$md_col = 12;
			$sm_col = 12;
			$extra  = '';
			break;
	}

	$params[0]['before_widget'] = str_replace(
		'class="',
		sprintf( $classes, $lg_col, $md_col, $sm_col, $extra ),
		$params[0]['before_widget']
	);

	return $params;
}

/**
 * Filter image CSS model
 *
 * @param  array $css_model Default CSS model.
 * @param  array $args Post formats module arguments.
 *
 * @return array
 */
function galwalking_add_image_format_classes( $css_model, $args ) {
	$blog_featured_image = get_theme_mod( 'blog_featured_image', galwalking_theme()->customizer->get_default( 'blog_featured_image' ) );
	$blog_layout         = get_theme_mod( 'blog_layout_type', galwalking_theme()->customizer->get_default( 'blog_layout_type' ) );
	$suffix              = ( 'default' !== $blog_layout ) ? 'fullwidth' : $blog_featured_image;

	$css_model['link'] .= ' post-thumbnail--' . $suffix;

	return $css_model;
}

/**
 * Enqueue misc js script.
 *
 * @param  array $depends Default dependencies.
 * @return array
 */
function galwalking_enqueue_misc( $depends ) {
	global $is_IE;

	if ( $is_IE ) {
		$depends[] = 'object-fit-images';
	}

	return $depends;
}

/**
 * Add to toTop and stickUp properties if required.
 *
 * @param  array $vars Default variables.
 *
 * @return array
 */
function galwalking_js_vars( $vars ) {
	$header_menu_sticky = get_theme_mod( 'header_menu_sticky', galwalking_theme()->customizer->get_default( 'header_menu_sticky' ) );

	if ( $header_menu_sticky && ! wp_is_mobile() ) {
		$vars['stickUp'] = true;
	}

	$totop_visibility = get_theme_mod( 'totop_visibility', galwalking_theme()->customizer->get_default( 'totop_visibility' ) );

	if ( $totop_visibility ) {
		$vars['toTop'] = true;
	}

	return $vars;
}

/**
 * Add has/no thumbnail classes for posts
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function galwalking_post_thumb_classes( $classes ) {
	$thumb = 'no-thumb';

	if ( has_post_thumbnail() ) {
		$thumb = 'has-thumb';
	}

	$classes[] = $thumb;

	return $classes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Arguments for comment form.
 *
 * @return array
 */
function galwalking_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Leave a reply', 'galwalking' );

	$args['fields']['author'] = '<p class="comment-form-author"><input id="author" class="comment-form__field" name="author" type="text" placeholder="' . esc_html__( 'Your Name', 'galwalking' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_html__( 'Your Email', 'galwalking' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['url'] = '<p class="comment-form-url"><input id="url" class="comment-form__field" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . esc_html__( 'Your Website', 'galwalking' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	$args['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . esc_html__( 'Your Message', 'galwalking' ) . '" cols="45" rows="8" aria-required="true" required="required"></textarea></p>';

	$args['title_reply_before'] = '<h5 id="reply-title" class="comment-reply-title">';

	$args['title_reply_after'] = '</h5>';

	$args['title_reply'] = esc_html__( 'Leave a reply', 'galwalking' );

	$args['class_submit'] = 'submit btn btn-primary';

	return $args;
}

/**
 * Reorder comment fields
 *
 * @param  array $fields Comment fields.
 *
 * @return array
 */
function galwalking_reorder_comment_fields( $fields ) {

	if ( is_singular( 'product' ) ) {
		return $fields;
	}

	$new_fields_order = array();
	$new_order        = array( 'author', 'email', 'url', 'comment' );

	foreach ( $new_order as $key ) {
		$new_fields_order[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	return $new_fields_order;
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function galwalking_extra_body_classes( $classes ) {
	global $is_IE;

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of ie to browsers IE.
	if ( $is_IE ) {
		$classes[] = 'ie';
	}

	// Adds a options-based classes.
	$page_layout    = get_theme_mod( 'page_container_type', galwalking_theme()->customizer->get_default( 'page_container_type' ) );
	$header_layout  = get_theme_mod( 'header_container_type', galwalking_theme()->customizer->get_default( 'header_container_type' ) );
	$content_layout = get_theme_mod( 'content_container_type', galwalking_theme()->customizer->get_default( 'content_container_type' ) );
	$footer_layout  = get_theme_mod( 'footer_container_type', galwalking_theme()->customizer->get_default( 'footer_container_type' ) );
	$blog_layout    = get_theme_mod( 'blog_layout_type', galwalking_theme()->customizer->get_default( 'blog_layout_type' ) );
	$sb_position    = get_theme_mod( 'sidebar_position', galwalking_theme()->customizer->get_default( 'sidebar_position' ) );
	$sidebar        = get_theme_mod( 'sidebar_width', galwalking_theme()->customizer->get_default( 'sidebar_width' ) );
	$header_type    = get_theme_mod( 'header_layout_type', galwalking_theme()->customizer->get_default( 'header_layout_type' ) );
	$footer_type    = get_theme_mod( 'footer_layout_type', galwalking_theme()->customizer->get_default( 'footer_layout_type' ) );
	$word_wrap      = ( get_theme_mod( 'word_wrap', galwalking_theme()->customizer->get_default( 'word_wrap' ) ) ) ? 'wordwrap' : '';

	return array_merge( $classes, array(
		'page-layout-' . $page_layout,
		'header-layout-' . $header_layout,
		'content-layout-' . $content_layout,
		'footer-layout-' . $footer_layout,
		'blog-' . $blog_layout,
		'position-' . $sb_position,
		'sidebar-' . str_replace( '/', '-', $sidebar ),
		'header-' . $header_type,
		'footer-' . $footer_type,
		$word_wrap,
	) );
}

/**
 * Replace macroses in text widget.
 *
 * @param  string         $widget_text The widget content.
 * @param  array          $instance    Array of settings for the current widget.
 * @param  WP_Widget_Text $widget      Current Text widget instance.
 * @return string
 */
function galwalking_render_widget_macros( $widget_text = null, $instance = array(), $widget = null ) {

	$uploads = wp_upload_dir();

	$data = array(
		'/%%uploads_url%%/' => $uploads['baseurl'],
		'/%%home_url%%/'    => esc_url( home_url( '/' ) ),
		'/%%theme_url%%/'   => get_template_directory_uri(),
	);

	return preg_replace( array_keys( $data ), array_values( $data ), $widget_text );
}

/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.1
 */
function galwalking_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />' . "\n";
}

/**
 * Customization for `Tag Cloud` widget.
 *
 * @since  1.0.1
 *
 * @param  array $args Widget arguments.
 *
 * @return array
 */
function galwalking_customize_tag_cloud( $args ) {
	$args['smallest'] = 14;
	$args['largest']  = 14;
	$args['unit']     = 'px';

	return $args;
}

/**
 * Replaces `[...]` (appended to automatically generated excerpts) with `...`.
 *
 * @since  1.0.1
 *
 * @param  string $more The string shown within the more link.
 *
 * @return string
 */
function galwalking_excerpt_more( $more ) {

	if ( is_admin() ) {
		return $more;
	}

	return ' &hellip;';
}

/**
 * Creating wrappers for audio shortcode.
 */
function galwalking_audio_shortcode( $html, $atts, $audio, $post_id, $library ) {

	$html = sprintf( '<div class="mejs-audio-container-wrapper">%s</div>', $html );

	return $html;
}

/**
 * Creating wrappers for audio post featured content.
 */
function galwalking_cherry_get_the_post_audio( $result ) {

	$result = sprintf( '<div class="post-format-audio">%s</div>', $result );

	return $result;
}


/**
 * Set specific sidebar position.
 */
function galwalking_specific_sidebar_position( $value ) {

	if ( is_404() || is_singular( 'tm_pg_album' ) || is_singular( 'tm_pg_set' ) ) {
		return 'fullwidth';
	}

	if ( is_home() || ( is_archive() && ! is_tax() && ! is_post_type_archive() ) ) {
		return get_theme_mod( 'sidebar_position_post_listing', galwalking_theme()->customizer->get_default( 'sidebar_position_post_listing' ) );
	}

	if ( is_singular( 'post' ) ) {
		return get_theme_mod( 'sidebar_position_post', galwalking_theme()->customizer->get_default( 'sidebar_position_post' ) );
	}

	if ( is_singular( 'product' ) ) {
		return get_theme_mod( 'sidebar_position_product', galwalking_theme()->customizer->get_default( 'sidebar_position_product' ) );
	}

	return $value;
}

/**
 * Set specific content_container_type.
 */
function galwalking_specific_content_container_type( $value ) {

	if ( is_singular( 'tm_pg_album' ) || is_singular( 'tm_pg_set' ) ) {
		return 'fullwidth';
	}

	return $value;
}

/**
 * Change gallery image size into single post and non-sidebar layout.
 *
 * @param $args
 * @param $post_id
 * @param $post_type
 *
 * @return mixed
 */
function galwalking_post_gallery_img_size( $args, $post_id, $post_type ) {
	$sidebar_position = get_theme_mod( 'sidebar_position', galwalking_theme()->customizer->get_default( 'sidebar_position' ) );

	if ( 'fullwidth' == $sidebar_position && is_singular() ) {
		$args['size'] = 'galwalking-thumb-xl';
	}

	return $args;
}

/**
 *  Add invert classes if breadcrumbs sections is darken.
 *
 * @param array $wrapper_classes Classes array.
 *
 * @return array
 */
function galwalking_cherry_breadcrumbs_wrapper_classes( $wrapper_classes = array() ) {
	$breadcrumbs_color = get_theme_mod( 'breadcrumbs_text_color', galwalking_theme()->customizer->get_default( 'breadcrumbs_text_color' ) );

	if ( 'light' === $breadcrumbs_color ) {
		$wrapper_classes[] = 'invert';
	}

	return $wrapper_classes;
}

/**
 * Add dynamic css function.
 *
 * @param array $func_list Function list.
 *
 * @return array
 */
function galwalking_add_dynamic_css_function( $func_list = array() ) {

	$func_list['background_position'] = 'galwalking_dynamic_css_background_position';

	return $func_list;
}

/**
 * Callback function for dynamic css function `background_position`.
 *
 * @param string $position Background position.
 *
 * @return bool|string
 */
function galwalking_dynamic_css_background_position( $position = '' ) {

	if ( empty( $position ) ) {
		return;
	}

	$result = 'background-position: ' . str_replace( '-', ' ', $position );

	return $result;
}

/**
 * Disable requests to wp.org repository for this theme.
 *
 * @link  https://wptheming.com/2014/06/disable-theme-update-checks/
 * @since 1.0.0
 *
 * @param  array  $r An array of HTTP request arguments.
 * @param  string $url     The request URL.
 *
 * @return array
 */
function galwalking_disable_wporg_request( $r, $url ) {

	// If it's not a theme update request, bail.
	if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
		return $r;
	}

	// Decode the JSON response.
	$themes = json_decode( $r['body']['themes'] );

	// Remove the active parent and child themes from the check.
	$parent = get_option( 'template' );
	$child  = get_option( 'stylesheet' );

	unset( $themes->themes->$parent );
	unset( $themes->themes->$child );

	// Encode the updated JSON response.
	$r['body']['themes'] = json_encode( $themes );

	return $r;
}

// TODO: refact
/**
 * Add dynamic css plugins files.
 *
 * @param array $args Dynamic css arguments.
 *
 * @return array
 */
function galwalking_add_dynamic_css_plugins_files( $args= array() ) {

	$plugins_config = array(
		array(
			'class'            => 'Tm_Timeline',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/timeline.css',
		),
		array(
			'class'            => 'Cherry_Team_Members',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/cherry-team-members.css',
		),
		array(
			'class'            => 'Cherry_Services_List',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/cherry-services-list.css',
		),
		array(
			'class'            => 'TM_Testimonials_Plugin',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/cherry-testimonials.css',
		),
		array(
			'class'            => 'Cherry_Projects',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/cherry-project.css',
		),
		array(
			'class'            => 'TM_Photo_Gallery',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/tm-photo-gallery.css',
		),
		array(
			'class'            => 'Polylang',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/polylang.css',
		),
		array(
			'class'            => 'Elementor\Plugin',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/elementor.css',
		),
		array(
			'class'            => 'Tribe__Events__Main',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/the-events-calendar.css',
		),
		array(
			'class'            => 'Cherry_Trending_Posts',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/cherry-trending-posts.css',
		),
		array(
			'class'            => 'Cherry_Socialize',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/cherry-socialize.css',
		),
		array(
			'class'            => 'Cherry_Popups',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/cherry-popups.css',
		),
		array(
			'class'            => 'Cherry_Search',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/cherry-search.css',
		),
	);

	foreach ( $plugins_config as $plugin ) {

		if ( class_exists( $plugin['class'] ) ) {
			$args['css_files'][] = galwalking_get_locate_template( $plugin['dynamic_css_path'] );
		}

	}

	return $args;
}

/**
 * Add dynamic css variables.
 *
 * @param array $variables CSS variables.
 * @param array $args      Module arguments.
 *
 * @return array
 */
function galwalking_dynamic_css_variables( $variables = array(), $args = array() ) {

	$mobile_max_heading_size = array(
		'h1' => 40,
		'h2' => 36,
		'h3' => 32,
	);

	foreach ( $mobile_max_heading_size as $heading => $max_heading_size ) {
		$heading_size = (int) get_theme_mod( $heading . '_font_size', galwalking_theme()->customizer->get_default( $heading . '_font_size' ) );

		$variables[ $heading . '_mobile_multiple' ] = ( $heading_size > $max_heading_size ) ? (string) ( $max_heading_size / $heading_size ) : '1';
	}

	return $variables;
}

/**
 * Modify background-image dynamic css variables.
 *
 * @param array $variables CSS variables.
 * @param array $args      Module arguments.
 *
 * @return array
 */
function galwalking_modify_bg_img_variables( $variables = array(), $args = array() ) {

	$bg_img_variables = array(
		'header_bg_image',
		'breadcrumbs_bg_image',
		'page_404_bg_image',
	);

	foreach ( $bg_img_variables as $var ) {
		$variables[ $var ] = esc_url( galwalking_render_theme_url( $variables[ $var ] ) );
	}

	return $variables;
}

/**
 * Modify cherry sidebar post types list.
 *
 * @param array $allowed_post_types Allowed post types list.
 *
 * @return array
 */
function galwalking_modify_cherry_sidebar_post_types_list( $allowed_post_types = array() ) {
	$allowed_post_types[] = 'cherry-services';
	$allowed_post_types[] = 'projects';

	return $allowed_post_types;
}

/**
 * Modify tm-pg-gallery list css class.
 *
 * @param string $class Css class.
 *
 * @return string
 */
function galwalking_modify_tm_pg_gallery_list_class( $class ) {

	$class .= ' tm-pg_front_gallery_container';

	return $class;
}

/**
 * Add additional options to jet menu.
 *
 * @param object $builder
 * @param object $option_page
 */
function galwalking_jet_menu_additional_options( $builder, $option_page ) {

	$builder->register_control(
		array(
			'jet-menu-mega-margin' => array(
				'type'        => 'dimensions',
				'parent'      => 'styles_tab',
				'title'       => esc_html__( 'Menu container margin', 'galwalking' ),
				'range'       => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'value' => $option_page->get_option( 'jet-menu-mega-margin' ),
			),
		)
	);
}

/**
 * Modify jet-menu css-scheme.
 *
 * @param array $css_scheme
 *
 * @return array
 */
function galwalking_modify_jet_menu_css_scheme( $css_scheme = array() ) {

	$css_scheme['jet-menu-mega-margin'] = array(
		'selector'  => '',
		'rule'      => 'margin-%s',
		'value'     => '',
		'important' => true,
	);

	return $css_scheme;
}

/**
 * Modify cherry-search thumbnail size.
 *
 * @param string $size Thumbnail size.
 *
 * @return string
 */
function galwalking_modify_cherry_search_thumbnail_size( $size ) {
	return 'medium';
}