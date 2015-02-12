<?php
    /**
     *  Home Page Carousel-Style Banner
     */
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Wrapper for slides -->
	<?php
		$bannerLoop = new WP_Query( array( 'post_type' => 'banners', 'name' => 'home-page-banner' ) );
		if ($bannerLoop->have_posts()) :
			while ( $bannerLoop->have_posts() ) : $bannerLoop->the_post();
				if( have_rows('banners') ) : $count=0; ?>

				<div class="carousel-inner" role="listbox">

				<?php while ( have_rows('banners') ) : $count++;
					the_row();
					$image = get_sub_field('image');
					$title = get_sub_field('title');
					$description = get_sub_field('description');
					$button_title = get_sub_field('button_title');
					$link = get_sub_field('link');
					$open_in_new_window = get_sub_field('open_in_new_window');
				?>

				<div class="item<?=($count==1)?' active':''?>">
					<img src="<?=$image['url']?>" alt="<?=$title?>">
					<div class="carousel-caption">
						<?=$title?><br />
						<?=$description?>
					</div>
				</div>

			<?php endwhile; ?>
			</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; rewind_posts(); ?>

	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php for( $x = 1; $count >= $x; $x++ ) : ?>
			<li data-target="#carousel-example-generic" data-slide-to="<?=$x-1?>"<?=( $x==1 )?' class="active"':''?>></li>
		<?php endfor; ?>
	</ol>

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