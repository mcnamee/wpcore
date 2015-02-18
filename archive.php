<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div class="container">
	<main role="main" class="row">
		<div class="col-md-8">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
                <h1><?= str_replace( array('Archives: ', "Category: ", "Month: "), '', get_the_archive_title()) ?></h1>
			</header><!-- .entry_header -->

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;
		
			/* Include Pager */
			include('parts/pager.php');

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>
        </div> <!-- /.col -->

        <?php require 'parts/sidebar.php'; ?>

    </main>
</div> <!-- /.container -->


<?php get_footer(); ?>
