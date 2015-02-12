<?php
/**
 * The template for displaying search results pages.
 *

 */

get_header(); ?>

<div class="container">
	<main role="main" class="row">
		<div class="col-md-12">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'wpcore' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );

			// End the loop.
			endwhile;


			/* Include Pager */
			include('parts/pager.php');

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>
		</div> <!-- /.col -->
	</main>
</div> <!-- /.container -->
<?php get_footer(); ?>
