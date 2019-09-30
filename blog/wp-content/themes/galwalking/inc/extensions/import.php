<?php
/**
 * Import remap hooks
 */

add_filter( 'cherry_data_import_home_regex_replace', 'galwalking_remap_shortcodes' );

/**
 * Remap terms in shortocdes
 *
 * @param  array $regex Shortcode data for regex.
 * @return array
 */
function galwalking_remap_shortcodes( $regex ) {

	return $regex;
}
