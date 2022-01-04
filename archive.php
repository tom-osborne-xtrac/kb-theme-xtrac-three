<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xtrac-three
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
		<?php custom_breadcrumbs(); ?>

		<?php the_archive_title('<h2>' ,'</h2>'); ?>

		<?php get_template_part( 'template-parts/content', 'table-all' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
