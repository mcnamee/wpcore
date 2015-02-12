<?php
/**
 * The template for displaying all single posts and attachments
 *

 */

get_header(); ?>

<div class="container">
	<main role="main" class="row">
		<div class="col-md-8">

		<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			// End the loop.
			endwhile;
		?>

		</div> <!-- /.col -->

		<div id="sidebar" class="col-md-4 sidebar">
            <div class="row">
			    <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div> <!-- /.row -->
		</div> <!-- /.col -->

	</main>
</div> <!-- /.container -->

<?php get_footer(); ?>
