<?php
/**
 * Template part for displaying post publish date.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Galwalking
 */

$utility = galwalking_utility()->utility;

if ( 'post' === get_post_type() ) :

	$date_visible = ( is_single() ) ? galwalking_is_meta_visible( 'single_post_publish_date', 'single' ) : galwalking_is_meta_visible( 'blog_post_publish_date', 'loop' );

	$utility->meta_data->get_date( array(
		'visible' => $date_visible,
		'html'    => '<span class="post__date"><a href="%2$s" %3$s %4$s ><time datetime="%5$s">%6$s%7$s</time></a></span>',
		'class'   => 'post__date-link',
		'echo'    => true,
	) );

endif;
