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
			while ( have_posts() ) : the_post();

				get_template_part( 'content', get_post_type() );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile;
		?>

		</div> <!-- /.col -->

        <?php require 'parts/sidebar.php'; ?>

	</main>
</div> <!-- /.container -->

<?php get_footer(); ?>
