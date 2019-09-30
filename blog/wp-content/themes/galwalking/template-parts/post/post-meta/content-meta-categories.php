<?php
/**
 * Template part for displaying post categories.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Galwalking
 */

$utility = galwalking_utility()->utility;

if ( 'post' === get_post_type() ) :

	$cats_visible = ( is_single() ) ? galwalking_is_meta_visible( 'single_post_categories', 'single' ) : galwalking_is_meta_visible( 'blog_post_categories', 'loop' );

	$utility->meta_data->get_terms( array(
		'visible'   => $cats_visible,
		'type'      => 'category',
		'delimiter' => ', ',
		'before'    => '<span class="post__cats">',
		'after'     => '</span>',
		'prefix'    => esc_html__( 'in ', 'galwalking' ),
		'echo'      => true,
	) );

endif;
