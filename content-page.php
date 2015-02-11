<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since WPCore 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		wpcore_post_thumbnail();
	?>

	<header class="page-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .entry_header -->

	<div class="entry_content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit Page', 'twentyfifteen' ), '<span class="btn btn-default">', '</span>' ); ?>

</article><!-- #post-## -->
