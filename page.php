<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since WPCore 1.0
 */

get_header(); ?>

<div class="container">
	<main role="main" class="row">
		<div class="col-md-8">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

			// End the loop.
			endwhile;
			?>
		</div> <!-- /.col -->

		<div id="sidebar" class="col-md-4 sidebar">
			<?php dynamic_sidebar('Page Sidebar'); ?>
		</div> <!-- /.col -->

	</main>
</div> <!-- /.container -->

<?php get_footer(); ?>
