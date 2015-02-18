<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *

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

        <?php $sidebar_type = 'page-sidebar'; require 'parts/sidebar.php'; ?>

	</main>
</div> <!-- /.container -->

<?php get_footer(); ?>
