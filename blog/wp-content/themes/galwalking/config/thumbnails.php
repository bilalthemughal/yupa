<?php
/**
 * Thumbnails configuration.
 *
 * @package Galwalking
 */

add_action( 'after_setup_theme', 'galwalking_register_image_sizes', 5 );
/**
 * Register image sizes.
 */
function galwalking_register_image_sizes() {
	set_post_thumbnail_size( 370, 260, true );

	// Registers a new image sizes.
	add_image_size( 'galwalking-thumb-l', 770, 460, true );   // default listing
	add_image_size( 'galwalking-thumb-l-2', 770, 260, true ); // justify listing
	add_image_size( 'galwalking-thumb-xl', 1170, 500, true ); // default listing + full-width

	add_image_size( 'galwalking-thumb-masonry', 370, 9999 );      // masonry listing
	add_image_size( 'galwalking-author-avatar', 512, 512, true ); // Widget Author bio

	add_image_size( 'galwalking-thumb-72-62', 72, 62, true );     // Custom post widget
	add_image_size( 'galwalking-thumb-130-125', 130, 125, true ); // Custom post widget
	add_image_size( 'galwalking-thumb-250-222', 250, 222, true ); // Cherry Team
	add_image_size( 'galwalking-thumb-266-250', 266, 250, true ); // Cherry Team
	add_image_size( 'galwalking-thumb-270-200', 270, 200, true ); // Cherry Services List
	add_image_size( 'galwalking-thumb-370-200', 370, 200, true ); // Cherry Services List
	add_image_size( 'galwalking-thumb-370-300', 370, 300, true ); // Cherry Projects
	add_image_size( 'galwalking-thumb-370-340', 370, 340, true ); // Cherry Team
	add_image_size( 'galwalking-thumb-390-380', 390, 380, true ); // Cherry Team
	add_image_size( 'galwalking-thumb-425-415', 425, 415, true ); // Cherry Projects
	add_image_size( 'galwalking-thumb-770-750', 770, 750, true ); // Image widget

}
