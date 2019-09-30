<?php
/**
 * Extends basic functionality for better Cherry_Trending_Posts compatibility
 *
 * @package Galwalking
 */

/**
 * Check if Cherry_Trending_Posts plugin is activated.
 */
function galwalking_is_cherry_trending_posts_activated() {
	return class_exists( 'Cherry_Trending_Posts' );
}
