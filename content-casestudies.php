<?php
/**
 * The template used for displaying Case Study content
 *
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

    <?php if( have_rows('image_gallery') ) : $count=0; ?>
        <div class="casestudy_gallery row">
            <?php while ( have_rows('image_gallery') ) : $count++;
                the_row();
                $image = get_sub_field('image');
                $title = get_sub_field('title');
            ?>

                <div class="casestudy_image_wrapper col-sm-4">
                    <a href="<?=$image['url']?>">
                        <img src="<?=$image['url']?>" class="img-responsive" alt="<?=$title?>">
                        <span class="casestudy_caption">
                            <?=$title?>
                        </span> <!-- /.casestudy_caption -->
                    </a>
                </div> <!-- /.casestudy_image_wrapper -->
            <?php endwhile; ?>
        </div> <!-- /.casestudy_gallery -->
    <?php endif; ?>

	<?php edit_post_link( __( 'Edit Page', 'wpcore' ), '<span class="btn btn-default">', '</span>' ); ?>

</article><!-- #post-## -->
