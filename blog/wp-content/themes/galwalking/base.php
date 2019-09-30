<?php
/**
 * The base template.
 *
 * @package Galwalking
 */
?>
<?php get_header( galwalking_template_base() ); ?>

	<?php galwalking_site_breadcrumbs(); ?>

	<?php do_action( 'galwalking_render_widget_area', 'full-width-header-area' ); ?>

	<div <?php galwalking_content_wrap_class(); ?>>

		<div class="row">

			<div id="primary" <?php galwalking_primary_content_class(); ?>>

				<main id="main" class="site-main" role="main">

					<?php include galwalking_template_path(); ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php get_sidebar(); // Loads the sidebar.php. ?>

		</div><!-- .row -->

	</div><!-- .site-content_wrap -->

	<?php do_action( 'galwalking_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( galwalking_template_base() ); ?>
