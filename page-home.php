<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<?php include( 'parts/banner-home-page.php' ); ?>

<div class="section border_bottom">
    <div class="container">
        <main role="main" class="row">
            <div class="col-md-12">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <header>
                        <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
                    </header><!-- .entry_header -->

					<div class="entry-content">
                        <?php the_content(); ?>
					</div><!-- .entry-content -->

				<?php endwhile; endif; ?>

            </div> <!-- /.col -->
        </main>
    </div> <!-- /.container -->
</div><!-- .section -->

<div class="section border_bottom">
    <div class="container">
        <div class="row">
            <?php include('parts/recent-posts.php'); ?>
            <?php include('parts/casestudy-random.php'); ?>
        </div>
    </div><!-- .container -->
</div><!-- .section -->

<div class="section">
	<div class="container">
		<?php if ( is_active_sidebar( 'home-widgets' ) ) : ?>
			<div class="row">
				<?php dynamic_sidebar( 'home-widgets' ); ?>
			</div>
		<?php endif; ?>
	</div><!-- .container -->
</div><!-- .section -->

<?php get_footer(); ?>
