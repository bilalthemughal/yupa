<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Galwalking
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>

	<?php $blog_layout_type = get_theme_mod( 'blog_layout_type', galwalking_theme()->customizer->get_default( 'blog_layout_type' ) );
	$size = galwalking_post_thumbnail_size( array(
		'class_prefix' => 'post-thumbnail--',
	) ); ?>

	<?php if ( 'default' === $blog_layout_type ) : ?>

		<div class="post-featured-content"><?php
			do_action( 'cherry_post_format_gallery', array(
				'size' => $size['size'],
			) );
		?></div><!-- .post-featured-content -->

		<div class="posts-list__item-content">

			<header class="entry-header">
				<div class="entry-meta"><?php
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-date' );
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-categories' );
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-comments' );
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-author' );
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-view' );
				?></div>
				<?php galwalking_get_template_part( 'template-parts/post/post-components/post-title' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content"><?php
				galwalking_get_template_part( 'template-parts/post/post-components/post-content' );
			?></div><!-- .entry-content -->

			<footer class="entry-footer">
				<div class="entry-footer-container"><?php
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-tags' );
					galwalking_share_buttons( 'loop' );
					galwalking_get_template_part( 'template-parts/post/post-components/post-button' );
				?></div>
			</footer><!-- .entry-footer -->
		</div><!-- .posts-list__item-content -->

	<?php else: ?>

		<div class="post-featured-content"><?php
			do_action( 'cherry_post_format_gallery', array(
				'size' => $size['size'],
			) );
		?></div><!-- .post-featured-content -->

		<div class="posts-list__item-content">

			<header class="entry-header">
				<?php galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-tags' ); ?>
				<?php galwalking_get_template_part( 'template-parts/post/post-components/post-title' ); ?>
				<div class="entry-meta"><?php
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-date' );
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-categories' );
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-comments' );
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-view' );
				?></div>
			</header><!-- .entry-header -->

			<div class="entry-content"><?php
				galwalking_get_template_part( 'template-parts/post/post-components/post-content' );
			?></div><!-- .entry-content -->

			<footer class="entry-footer">
				<div class="entry-meta"><?php
					galwalking_get_template_part( 'template-parts/post/post-meta/content-meta-author' );
				?></div>
				<div class="entry-footer-container"><?php
					galwalking_share_buttons( 'loop' );
					galwalking_get_template_part( 'template-parts/post/post-components/post-button' );
				?></div>
			</footer><!-- .entry-footer -->
		</div><!-- .posts-list__item-content -->

	<?php endif; ?>

</article><!-- #post-## -->
