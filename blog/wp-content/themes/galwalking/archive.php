<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Galwalking
 */

if ( have_posts() ) : ?>

	<header class="page-header">
		<?php
			the_archive_title( '<h1 class="page-title screen-reader-text">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
	</header><!-- .page-header -->

	<div <?php galwalking_posts_list_class(); ?>>

	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		galwalking_get_template_part( 'template-parts/post/content', get_post_format() );

	endwhile; ?>

	</div><!-- .posts-list -->

	<?php galwalking_get_template_part( 'template-parts/content', 'pagination' );

else :

	galwalking_get_template_part( 'template-parts/content', 'none' );

endif; ?>
