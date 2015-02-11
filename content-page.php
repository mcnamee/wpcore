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
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry_header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry_content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit Page', 'twentyfifteen' ), '<footer class="entry-footer"><span class="btn btn-default">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->
