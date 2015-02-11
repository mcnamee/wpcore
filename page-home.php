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
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<div class="grid_24 inner">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<header class="entry-header">
						<?php
							if ( is_single() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
							endif;
						?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php
							/* translators: %s: Name of current post */
							the_content( sprintf(
								__( 'Continue reading %s', 'twentyfifteen' ),
								the_title( '<span class="screen-reader-text">', '</span>', false )
							) );

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
						?>
					</div><!-- .entry-content -->
				<?php endwhile; endif; ?>
			</div><!-- /.grid -->

			</main><!-- .site-main -->
		</div><!-- .content-area -->
	</div><!-- .container -->
</div><!-- .section -->

<div class="section">
	<div class="container">
		<?php if ( is_active_sidebar( 'home-widgets' ) ) : ?>
			<h2>WP Widgets</h2>
			<div class="row">
				<?php dynamic_sidebar( 'home-widgets' ); ?>
			</div>
			<div class="clear"></div>
		<?php endif; ?>

		<h2>HTML Content</h2>
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Our Services
					</div>
					<div class="list-group">
						<a href="#" class="list-group-item">Cras justo odio</a>
						<a href="#" class="list-group-item">Dapibus ac facilisis in</a>
						<a href="#" class="list-group-item">Morbi leo risus</a>
						<a href="#" class="list-group-item">Porta ac consectetur ac</a>
						<a href="#" class="list-group-item">Vestibulum at eros</a>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Quick Quote
					</div>
					<div class="panel-body">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>

						<form class="form-horizontal">
							<div class="form-group">
								<label for="form-name" class="control-label col-md-3">Name</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="form-name" />
								</div>
							</div>

							<div class="form-group">
								<label for="form-email" class="control-label col-md-3">Email</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="form-email" />
								</div>
							</div>

							<div class="text-right">
								<button class="btn btn-default">Continue</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .container -->
</div><!-- .section -->

<?php get_footer(); ?>
