<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xtrac-three
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<span class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></span>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				// xtrac_three_posted_on();
				// xtrac_three_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php // xtrac_three_post_thumbnail(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( is_singular() ) :
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'xtrac-three' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xtrac-three' ),
				'after'  => '</div>',
			) );
		endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php // xtrac_three_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
