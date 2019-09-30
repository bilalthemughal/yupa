<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Galwalking
 */

/**
 * Show top panel message.
 *
 * @since  1.0.0
 * @param  string $format Output formatting.
 * @return void
 */
function galwalking_top_message( $format = '%s' ) {
	$message = get_theme_mod( 'top_panel_text', galwalking_theme()->customizer->get_default( 'top_panel_text' ) );

	if ( ! $message ) {
		return;
	}

	printf( $format, wp_kses( wp_unslash( $message ), wp_kses_allowed_html( 'post' ) ) );
}

/**
 * Show header search.
 *
 * @since  1.0.0
 * @param  string $format Output formatting.
 * @return void
 */
function galwalking_header_search( $format = '%s' ) {
	$is_enabled = get_theme_mod( 'header_search', galwalking_theme()->customizer->get_default( 'header_search' ) );

	if ( ! $is_enabled ) {
		return;
	}

	printf( $format, get_search_form( false ) );
}

/**
 * Show header search toggle.
 * @return void
 */
function galwalking_header_search_toggle() {
	$is_enabled = get_theme_mod( 'header_search', galwalking_theme()->customizer->get_default( 'header_search' ) );

	if ( ! $is_enabled ) {
		return;
	}

	echo apply_filters( 'galwalking_header_search_toggle', '<button class="search-form__toggle"></button>' );
}

/**
 * Show footer logo, uploaded from customizer.
 *
 * @since  1.0.0
 * @return void
 */
function galwalking_footer_logo() {
	if ( ! get_theme_mod( 'footer_logo_visibility', galwalking_theme()->customizer->get_default( 'footer_logo_visibility' ) ) ) {
		return;
	}

	$logo_url = get_theme_mod( 'footer_logo_url', galwalking_theme()->customizer->get_default( 'footer_logo_url' ) );

	if ( ! $logo_url ) {
		return;
	}

	$url      = esc_url( home_url( '/' ) );
	$alt      = esc_attr( get_bloginfo( 'name' ) );
	$logo_url = esc_url( galwalking_render_theme_url( $logo_url ) );
	$logo_id  = galwalking_get_image_id_by_url( galwalking_render_theme_url( $logo_url ) );
	$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo_id && $logo_src ) {
		$atts = ' width="' . esc_attr( $logo_src[1] ) . '" height="' . esc_attr( $logo_src[2] ) . '"';
	} else {
		$atts = '';
	}

	$logo_format = apply_filters(
		'galwalking_footer_logo_format',
		'<div class="footer-logo"><a href="%2$s" class="footer-logo_link"><img src="%1$s" alt="%3$s" class="footer-logo_img" %4$s></a></div>'
	);

	printf( $logo_format, $logo_url, $url, $alt, $atts );
}

/**
 * Show footer copyright text.
 *
 * @since  1.0.0
 * @return void
 */
function galwalking_footer_copyright() {
	$copyright = get_theme_mod( 'footer_copyright', galwalking_theme()->customizer->get_default( 'footer_copyright' ) );
	$format    = '<div class="footer-copyright">%s</div>';

	if ( empty( $copyright ) ) {
		return;
	}

	printf( $format, wp_kses( galwalking_render_macros( wp_unslash( $copyright ) ), wp_kses_allowed_html( 'post' ) ) );
}

/**
 * Show contact block.
 *
 * @since  1.0.0
 * @param string $target Current block position: header, footer.
 */
function galwalking_contact_block( $target = 'header' ) {
	$contact_block_visibility = get_theme_mod( $target . '_contact_block_visibility', galwalking_theme()->customizer->get_default( $target . '_contact_block_visibility' ) );

	if ( ! $contact_block_visibility ) {
		return;
	}

	$contact_item_count = apply_filters( 'galwalking_contact_item_count', array(
		'header' => 3,
		'footer' => 3,
	) );

	$contact_info = array();

	for ( $i = 1; $i <= $contact_item_count[ $target ]; $i ++ ) {
		$icon  = get_theme_mod( $target . '_contact_icon_' . $i, galwalking_theme()->customizer->get_default( $target . '_contact_icon_' . $i ) );
		$label = get_theme_mod( $target . '_contact_label_' . $i, galwalking_theme()->customizer->get_default( $target . '_contact_label_' . $i ) );
		$value = get_theme_mod( $target . '_contact_text_' . $i, galwalking_theme()->customizer->get_default( $target . '_contact_text_' . $i ) );
		if ( ! $icon && ! $value && ! $label ) {
			continue;
		}
		$contact_info [ 'item_' . $i ] = array(
			'icon'  => $icon,
			'label' => $label,
			'value' => $value,
		);
	}

	if ( ! $contact_info ) {
		return;
	}

	$icon_format = apply_filters( 'galwalking_contact_block_icon_format', '<i class="contact-block__icon fa %1$s"></i>' );

	$html = '<div class="contact-block contact-block--' . $target . '"><div class="contact-block__inner">';

	foreach ( $contact_info as $key => $value ) {
		$icon           = ( $value['icon'] ) ? sprintf( $icon_format, $value['icon'] ) : '';
		$label          = ( $value['label'] ) ? sprintf( '<span class="contact-block__label">%1$s</span>', wp_unslash( $value['label'] ) ) : '';
		$text           = ( $value['value'] ) ? sprintf( '<span class="contact-block__text">%1$s</span>', wp_kses( wp_unslash( $value['value'] ), wp_kses_allowed_html( 'post' ) ) ) : '';
		$item_mod_class = ( $value['icon'] ) ? 'contact-block__item--icon' : '';

		$html .= sprintf( '<div class="contact-block__item %1$s">%2$s<div class="contact-block__value-wrap">%3$s%4$s</div></div>', $item_mod_class, $icon, $label, $text );
	}

	$html .= '</div></div>';

	echo $html;
}

/**
 * Show Social list.
 *
 * @since  1.0.0
 * @since  1.0.1 Added new param - $type.
 * @return void
 */
function galwalking_social_list( $context = '', $type = 'icon' ) {
	$visibility_in_header = get_theme_mod( 'header_social_links', galwalking_theme()->customizer->get_default( 'header_social_links' ) );
	$visibility_in_footer = get_theme_mod( 'footer_social_links', galwalking_theme()->customizer->get_default( 'footer_social_links' ) );

	if ( ! $visibility_in_header && ( 'header' === $context ) ) {
		return;
	}

	if ( ! $visibility_in_footer && ( 'footer' === $context ) ) {
		return;
	}

	echo galwalking_get_social_list( $context, $type );
}

/**
 * Show sticky menu label grabbed from options.
 *
 * @param bool $echo Print or return sticky label html.
 *
 * @since  1.0.0
 * @return string|void
 */
function galwalking_sticky_label( $echo = true ) {

	if ( ! is_sticky() || ! is_home() || is_paged() ) {
		return;
	}

	$sticky_type = get_theme_mod(
		'blog_sticky_type',
		galwalking_theme()->customizer->get_default( 'blog_sticky_type' )
	);

	$content = '';
	$icon    = get_theme_mod( 'blog_sticky_icon', galwalking_theme()->customizer->get_default( 'blog_sticky_icon' ) );
	$label   = get_theme_mod( 'blog_sticky_label', galwalking_theme()->customizer->get_default( 'blog_sticky_label' ) );

	$icon_format = apply_filters( 'galwalking_sticky_icon_format', '<i class="fa %1$s"></i>' );
	$icon_html   = sprintf( $icon_format, $icon );

	$label_format = apply_filters( 'galwalking_sticky_label_text_format', '<span class="sticky__label-text">%s</span>' );
	$label_html   = sprintf( $label_format, galwalking_render_icons( $label ) );

	switch ( $sticky_type ) {

		case 'icon':
			$content = $icon_html;
			break;

		case 'label':
			$content = $label_html;
			break;

		case 'both':
			$content = $icon_html . $label_html;
			break;
	}

	if ( empty( $content ) ) {
		return;
	}

	$sticky_format = apply_filters( 'galwalking_sticky_label_format', '<span class="sticky__label type-%2$s">%1$s</span>' );

	if ( ! wp_validate_boolean( $echo ) ) {
		return sprintf( $sticky_format, $content, $sticky_type );
	} else {
		printf( $sticky_format, $content, $sticky_type );
	}
}

/**
 * Display the header logo.
 *
 * @since  1.0.0
 * @return void
 */
function galwalking_header_logo() {
	$type = get_theme_mod( 'header_logo_type', galwalking_theme()->customizer->get_default( 'header_logo_type' ) );
	$logo = galwalking_get_site_title_by_type( $type );

	if ( is_front_page() && is_home() ) {
		$tag = 'h1';
	} else {
		$tag = 'div';
	}

	$format = apply_filters(
		'galwalking_header_logo_format',
		'<%1$s class="site-logo site-logo--%4$s"><a class="site-logo__link" href="%2$s" rel="home">%3$s</a></%1$s>'
	);

	printf( $format, $tag, esc_url( home_url( '/' ) ), $logo, $type );
}

/**
 * Display preloader with logo
 *
 * @since  1.0.0
 * @return void
 */
function galwalking_preloader_logo() {

	$preloader_url = get_theme_mod( 'page_preloader_url', galwalking_theme()->customizer->get_default( 'page_preloader_url' ) );

	if ( ! $preloader_url ) {
		return;
	}

	$alt           = esc_attr( get_bloginfo( 'name' ) );
	$preloader_url = esc_url( galwalking_render_theme_url( $preloader_url ) );
	$preloader_id  = galwalking_get_image_id_by_url( galwalking_render_theme_url( $preloader_url ) );
	$preloader_src = wp_get_attachment_image_src( $preloader_id, 'full' );

	if ( $preloader_id && $preloader_src ) {
		$atts = ' width="' . esc_attr( $preloader_src[1] ) . '" height="' . esc_attr( $preloader_src[2] ) . '"';
	} else {
		$atts = '';
	}

	$preloader_format = apply_filters(
		'galwalking_preloader_logo_format',
		'<div class="preloader-image-wrap"><img src="%1$s" alt="%2$s" class="preloader-image" %3$s></div>'
	);

	printf( $preloader_format, $preloader_url, $alt, $atts );
}

/**
 * Retrieve the site title (image or text).
 *
 * @since  1.0.0
 * @return string
 */
function galwalking_get_site_title_by_type( $type ) {

	if ( ! in_array( $type, array( 'text', 'image' ) ) ) {
		$type = 'text';
	}

	$logo = get_bloginfo( 'name' );

	if ( 'text' === $type ) {
		return $logo;
	}

	$logo_url        = get_theme_mod( 'header_logo_url', galwalking_theme()->customizer->get_default( 'header_logo_url' ) );
	$invert_logo_url = get_theme_mod( 'invert_header_logo_url', galwalking_theme()->customizer->get_default( 'invert_header_logo_url' ) );
	$header_invert   = get_theme_mod( 'header_invert_color_scheme', galwalking_theme()->customizer->get_default( 'header_invert_color_scheme' ) );

	if ( $header_invert && $invert_logo_url ) {
		$logo_url = $invert_logo_url;
	}

	if ( ! $logo_url ) {
		return $logo;
	}

	$logo_url               = galwalking_render_theme_url( $logo_url );
	$retina_logo            = '';
	$retina_logo_url        = get_theme_mod( 'retina_header_logo_url', galwalking_theme()->customizer->get_default( 'retina_header_logo_url' ) );
	$invert_retina_logo_url = get_theme_mod( 'invert_retina_header_logo_url', galwalking_theme()->customizer->get_default( 'invert_retina_header_logo_url' ) );

	if ( $header_invert && $invert_retina_logo_url ) {
		$retina_logo_url = $invert_retina_logo_url;
	}

	$retina_logo_url = galwalking_render_theme_url( $retina_logo_url );
	$logo_id         = galwalking_get_image_id_by_url( $logo_url );

	if ( $retina_logo_url ) {
		$retina_logo = sprintf( 'srcset="%s 2x"', esc_url( $retina_logo_url ) );
	}

	$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo_id && $logo_src ) {
		$atts = ' width="' . $logo_src[1] . '" height="' . $logo_src[2] . '"';
	} else {
		$atts = '';
	}

	$format_image = apply_filters( 'galwalking_header_logo_image_format',
		'<img src="%1$s" alt="%2$s" class="site-link__img" %3$s%4$s>'
	);

	return sprintf( $format_image, esc_url( $logo_url ), esc_attr( $logo ), $retina_logo, $atts );
}

/**
 * Display the site description.
 *
 * @since  1.0.0
 * @return void
 */
function galwalking_site_description() {
	$show_desc = get_theme_mod( 'show_tagline', galwalking_theme()->customizer->get_default( 'show_tagline' ) );

	if ( ! $show_desc ) {
		return;
	}

	$description = get_bloginfo( 'description', 'display' );

	if ( ! ( $description || is_customize_preview() ) ) {
		return;
	}

	$format = apply_filters( 'galwalking_site_description_format', '<div class="site-description">%s</div>' );

	printf( $format, $description );
}

/**
 * Display box with information about author.
 *
 * @since  1.0.0
 * @return void
 */
function galwalking_post_author_bio() {
	$is_enabled = get_theme_mod( 'single_author_block', galwalking_theme()->customizer->get_default( 'single_author_block' ) );

	if ( ! $is_enabled ) {
		return;
	}

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	galwalking_get_template_part( 'template-parts/content', 'author-bio' );
}

/**
 * Display a link to all posts by an author.
 *
 * @since  1.0.0
 * @return string An HTML link to the author page.
 */
function galwalking_get_the_author_posts_link() {
	ob_start();
	the_author_posts_link();
	$author = ob_get_clean();

	return $author;
}

/**
 * Display the breadcrumbs.
 *
 * @since  1.0.0
 * @return void
 */
function galwalking_site_breadcrumbs() {
	$breadcrumbs_visibillity       = get_theme_mod( 'breadcrumbs_visibillity', galwalking_theme()->customizer->get_default( 'breadcrumbs_visibillity' ) );
	$breadcrumbs_page_title        = get_theme_mod( 'breadcrumbs_page_title', galwalking_theme()->customizer->get_default( 'breadcrumbs_page_title' ) );
	$breadcrumbs_path_type         = get_theme_mod( 'breadcrumbs_path_type', galwalking_theme()->customizer->get_default( 'breadcrumbs_path_type' ) );
	$breadcrumbs_front_visibillity = get_theme_mod( 'breadcrumbs_front_visibillity', galwalking_theme()->customizer->get_default( 'breadcrumbs_front_visibillity' ) );
	$breadcrumbs_container_class   = galwalking_get_container_classes( array(), 'breadcrumbs' );

	$breadcrumbs_settings = apply_filters( 'galwalking_breadcrumbs_settings', array(
		'wrapper_format'    => '<div ' . $breadcrumbs_container_class . '><div class="row">%1$s<div class="breadcrumbs__items">%2$s</div></div></div>',
		'page_title_format' => '<div class="breadcrumbs__title"><h5 class="page-title">%s</h5></div>',
		'separator'         => '&#62;',
		'show_title'        => $breadcrumbs_page_title,
		'path_type'         => $breadcrumbs_path_type,
		'show_on_front'     => $breadcrumbs_front_visibillity,
		'labels'            => array(
			'browse'         => '',
			'error_404'      => esc_html__( '404 Not Found', 'galwalking' ),
			'archives'       => esc_html__( 'Archives', 'galwalking' ),
			/* Translators: %s is the search query. The HTML entities are opening and closing curly quotes. */
			'search'         => esc_html__( 'Search results for &#8220;%s&#8221;', 'galwalking' ),
			/* Translators: %s is the page number. */
			'paged'          => esc_html__( 'Page %s', 'galwalking' ),
			/* Translators: Minute archive title. %s is the minute time format. */
			'archive_minute' => esc_html__( 'Minute %s', 'galwalking' ),
			/* Translators: Weekly archive title. %s is the week date format. */
			'archive_week'   => esc_html__( 'Week %s', 'galwalking' ),
		),
		'date_labels' => array(
			'archive_minute_hour' => esc_html_x( 'g:i a', 'minute and hour archives time format', 'galwalking' ),
			'archive_minute'      => esc_html_x( 'i', 'minute archives time format', 'galwalking' ),
			'archive_hour'        => esc_html_x( 'g a', 'hour archives time format', 'galwalking' ),
			'archive_year'        => esc_html_x( 'Y', 'yearly archives date format', 'galwalking' ),
			'archive_month'       => esc_html_x( 'F', 'monthly archives date format', 'galwalking' ),
			'archive_day'         => esc_html_x( 'j', 'daily archives date format', 'galwalking' ),
			'archive_week'        => esc_html_x( 'W', 'weekly archives date format', 'galwalking' ),
		),
		'css_namespace' => array(
			'module'    => 'breadcrumbs',
			'content'   => 'breadcrumbs__content',
			'wrap'      => 'breadcrumbs__wrap',
			'browse'    => 'breadcrumbs__browse',
			'item'      => 'breadcrumbs__item',
			'separator' => 'breadcrumbs__item-sep',
			'link'      => 'breadcrumbs__item-link',
			'target'    => 'breadcrumbs__item-target',
		),
	) );

	if ( $breadcrumbs_visibillity ) {
		galwalking_theme()->get_core()->init_module( 'cherry-breadcrumbs', $breadcrumbs_settings );
		do_action( 'cherry_breadcrumbs_render' );
	}
}

/**
 * Display the page preloader.
 *
 * @since  1.0.0
 * @return void
 */
function galwalking_get_page_preloader() {
	$page_preloader = get_theme_mod( 'page_preloader', galwalking_theme()->customizer->get_default( 'page_preloader' ) );

	if ( $page_preloader ) {
		galwalking_get_template_part( 'template-parts/page-preloader' );
	}
}

/**
 * Check if top panel visible or not
 *
 * @return bool
 */
function galwalking_is_top_panel_visible() {
	$message              = get_theme_mod( 'top_panel_text', galwalking_theme()->customizer->get_default( 'top_panel_text' ) );
	$menu                 = has_nav_menu( 'top' ) && get_theme_mod( 'top_menu_visibility', galwalking_theme()->customizer->get_default( 'top_menu_visibility' ) );
	$contact_block        = get_theme_mod( 'header_contact_block_visibility', galwalking_theme()->customizer->get_default( 'header_contact_block_visibility' ) );
	$social_menu          = get_theme_mod( 'header_social_links', galwalking_theme()->customizer->get_default( 'header_social_links' ) );
	$social_login_links   = galwalking_is_social_login_links_visible();
	$top_panel_visibility = get_theme_mod( 'top_panel_visibility', galwalking_theme()->customizer->get_default( 'top_panel_visibility' ) );

	$conditions = apply_filters( 'galwalking_top_panel_visibility_conditions', array( $message, $menu, $contact_block, $social_menu, $social_login_links ) );

	$is_visible = false;

	if ( ! $top_panel_visibility ) {
		return $is_visible;
	}

	foreach ( $conditions as $condition ) {

		if ( ! empty( $condition ) ) {
			$is_visible = true;
		}
	}

	return $is_visible;
}

/**
 * Display the ads.
 *
 * @since  1.0.0
 * @param  string $location location of ads in theme.
 * @return void
 */
function galwalking_ads( $location ) {
	$ads    = trim( get_theme_mod( 'ads_' . $location, galwalking_theme()->customizer->get_default( 'ads_' . $location ) ) );
	$format = '<div class="' . $location . '-ads">%s</div>';

	if ( empty( $ads ) ) {
		return;
	}

	printf( $format, wp_specialchars_decode( $ads, ENT_QUOTES ) );
}

/**
 * Display the header ads.
 */
function galwalking_ads_header() {
	galwalking_ads( 'header' );
}

/**
 * Display ads for before loop location.
 */
function galwalking_ads_home_before_loop() {
	galwalking_ads( 'home_before_loop' );
}

/**
 * Display ads for before loop content.
 */
function galwalking_ads_post_before_content() {
	galwalking_ads( 'post_before_content' );
}

/**
 * Display ads for before comments.
 */
function galwalking_ads_post_before_comments() {
	galwalking_ads( 'post_before_comments' );
}

/**
 * Display social login links.
 */
function galwalking_social_login_links() {

	$html      = apply_filters( 'galwalking_social_login_links_wrapper_html', '<div class="social-login-menu"><ul class="social-login-list inline-list">%s</ul></div>' );
	$item_html = apply_filters( 'galwalking_social_login_links_item_html', '<li class="social-login-list__item">%s</li>' );

	$actions = array(
		'cherry_popups_login_logout_link',
		'cherry_popups_sign_up_link',
	);

	$items = '';

	foreach ( $actions as $index => $action ) {
		ob_start();

		do_action( $action );

		$link = ob_get_clean();

		if ( $link ) {
			$items .= sprintf( $item_html, $link );
		}
	}

	if ( ! $items ) {
		return;
	}

	printf( $html, $items );
}

/**
 * Check is social login links visible.
 *
 * @return bool
 */
function galwalking_is_social_login_links_visible() {

	$is_visible = false;

	ob_start();

	galwalking_social_login_links();

	$result = ob_get_clean();

	if ( $result ) {
		$is_visible = true;
	}

	return $is_visible;
}

/**
 * Header call to action button.
 */
function galwalking_header_btn() {
	$btn_visibility = get_theme_mod( 'header_btn_visibility', galwalking_theme()->customizer->get_default( 'header_btn_visibility' ) );
	$btn_text       = get_theme_mod( 'header_btn_text', galwalking_theme()->customizer->get_default( 'header_btn_text' ) );
	$btn_url        = get_theme_mod( 'header_btn_url', galwalking_theme()->customizer->get_default( 'header_btn_url' ) );
	$btn_target     = get_theme_mod( 'header_btn_target', galwalking_theme()->customizer->get_default( 'header_btn_target' ) );
	$btn_style      = get_theme_mod( 'header_btn_style_preset', galwalking_theme()->customizer->get_default( 'header_btn_style_preset' ) );

	if ( ! $btn_visibility ) {
		return;
	}

	$target = $btn_target ? ' target="_blank"' : '';

	$format = apply_filters( 'galwalking_header_btn_html_format', '<div class="header-btn-wrapper"><a class="header-btn btn btn-%4$s" href="%2$s"%3$s>%1$s</a></div>' );

	printf( $format, wp_kses( wp_unslash( $btn_text ), wp_kses_allowed_html( 'post' ) ), esc_url( galwalking_render_macros( $btn_url ) ), $target, sanitize_html_class( $btn_style ) );
}
