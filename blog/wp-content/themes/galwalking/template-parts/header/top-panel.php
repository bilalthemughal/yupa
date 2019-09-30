<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Galwalking
 */

// Don't show top panel if all elements are disabled.
if ( ! galwalking_is_top_panel_visible() ) {
	return;
}
?>

<div <?php echo galwalking_get_html_attr_class( array( 'top-panel' ), 'top_panel_bg' ); ?>>
	<div <?php echo galwalking_get_container_classes( array(), 'header' ) ?>>
		<div class="top-panel__inner">
			<div class="top-panel__container">
				<?php galwalking_top_message( '<div class="top-panel__message">%s</div>' ); ?>
				<?php galwalking_contact_block( 'header' ); ?>

				<div class="top-panel__wrap-items">
					<div class="top-panel__menus">
						<?php galwalking_social_login_links(); ?>
						<?php galwalking_top_menu(); ?>
						<?php galwalking_social_list( 'header' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- .top-panel -->
