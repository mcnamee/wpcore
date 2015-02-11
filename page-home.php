<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="http://placehold.it/1920x500" alt="...">
			<div class="carousel-caption">
			This is the Carousel Caption
			</div>
		</div>
		<div class="item">
			<img src="http://placehold.it/1920x500/333333/CCCCCC" alt="...">
			<div class="carousel-caption">
			This is the other Carousel Caption
			</div>
		</div>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

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
