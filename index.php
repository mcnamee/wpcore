<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *

 */

get_header(); ?>

<div class="container">
	<main role="main" class="row">
		<div class="col-md-8">

		<?php if ( have_posts() ) : ?>

            <?php
                $page_id = get_option( 'page_for_posts' );
                echo get_the_post_thumbnail( $page_id, 'full', array('class' => 'img-responsive') );
            ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class="page-header">
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

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
