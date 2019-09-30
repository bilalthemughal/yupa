<?php
/**
 * Template part for displaying single posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Galwalking
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php galwalking_ads_post_before_content() ?>

	<figure class="post-thumbnail"><?php
		galwalking_get_template_part( 'template-parts/post/post-components/post-image' );
	?></figure><!-- .post-thumbnail -->

	<header class="entry-header">
		<div class="entry-meta"><?php
			galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-date' );
			galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-categories' );
			galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-comments' );
			galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-author' );
			galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-view' );
		?></div>
		<?php galwalking_get_template_part( 'template-parts/post/post-components/post-title' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links__title">' . esc_html__( 'Pages:', 'galwalking' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span class="page-links__item">',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'galwalking' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-footer-container"><?php
			galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-tags' );
			galwalking_share_buttons( 'single' );
		?></div>
		<?php galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-rating' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
