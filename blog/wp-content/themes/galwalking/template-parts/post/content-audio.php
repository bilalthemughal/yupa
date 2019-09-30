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

	<?php $blog_layout_type = get_theme_mod( 'blog_layout_type', galwalking_theme()->customizer->get_default( 'blog_layout_type' ) ); ?>

	<?php if ( 'default' === $blog_layout_type ) : ?>

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

			<div class="post-featured-content"><?php
					do_action( 'cherry_post_format_audio' );
				?></div><!-- .post-featured-content -->

			<div class="entry-content">
			<?php
				$embed_args = array(
					'fields' => array( 'soundcloud' ),
					'height' => 350,
					'width'  => 350,
				);

				$embed_content = apply_filters( 'cherry_get_embed_post_formats', false, $embed_args );

				if ( false === $embed_content ) {
					galwalking_get_template_part( 'template-parts/post/post-components/post-content' );
				} else {
					printf( '<div class="embed-wrapper">%s</div>', $embed_content );
				}

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

			<div class="post-featured-content"><?php
				do_action( 'cherry_post_format_audio' );
				?></div><!-- .post-featured-content -->

			<div class="entry-content">
				<?php
				$embed_args = array(
					'fields' => array( 'soundcloud' ),
					'height' => 350,
					'width'  => 350,
				);

				$embed_content = apply_filters( 'cherry_get_embed_post_formats', false, $embed_args );

				if ( false === $embed_content ) {
					galwalking_get_template_part( 'template-parts/post/post-components/post-content' );
				} else {
					printf( '<div class="embed-wrapper">%s</div>', $embed_content );
				}

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
