<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Galwalking
 */
?>

<div <?php galwalking_footer_container_class(); ?>>
	<div <?php echo galwalking_get_container_classes( array(), 'footer' ) ?>>
		<div class="site-info">
			<div class="site-info-wrap"><?php
				galwalking_footer_logo();
				galwalking_footer_copyright();
				galwalking_footer_menu();
				galwalking_contact_block( 'footer' );
				galwalking_social_list( 'footer' );
			?></div>
		</div><!-- .site-info -->
	</div>
</div><!-- .footer-container -->
