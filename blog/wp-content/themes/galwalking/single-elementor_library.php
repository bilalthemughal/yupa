<?php
/**
 * The template for displaying elementor library single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Galwalking
 */
while ( have_posts() ) : the_post();

	galwalking_get_template_part( 'template-parts/page/content', 'page' );

endwhile; // End of the loop.
