<?php
/**
 * The template for displaying search form.
 *
 * @package Galwalking
 */

$btn_classes = apply_filters( 'galwalking_search_form_btn_classes', 'btn btn-primary btn-sm' );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-form__input-wrap">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'galwalking' ) ?></span>
		<input type="search" class="search-form__field" placeholder="<?php echo esc_attr_x( 'Enter Keyword', 'placeholder', 'galwalking' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'galwalking' ) ?>" />
	</div>
	<button type="submit" class="search-form__submit <?php echo esc_attr( $btn_classes ); ?>"><?php esc_html_e( 'Search', 'galwalking' ); ?></button>
</form>
