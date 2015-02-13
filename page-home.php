<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'parts/banner', 'home-page' ); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="section border_bottom">
        <div class="container">
            <main role="main" class="row">
                <div class="col-md-12">
                        <header>
                            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
                        </header><!-- .entry_header -->

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->
                </div> <!-- /.col -->
            </main>
        </div> <!-- /.container -->
    </div><!-- .section -->
<?php endwhile; endif; ?>

<div class="section border_bottom">
    <div class="container">
        <div class="row">
            <?php get_template_part('parts/recent', 'posts'); ?>
            <?php get_template_part('parts/casestudy', 'random'); ?>
        </div>
    </div><!-- .container -->
</div><!-- .section -->

<?php if ( is_active_sidebar( 'home-widgets' ) ) : ?>
    <div class="section">
        <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'home-widgets' ); ?>
                </div>
        </div><!-- .container -->
    </div><!-- .section -->
<?php endif; ?>

<?php get_footer(); ?>
