<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since WPCore 1.0
 */
?>

	<div class="footer_testimonial border_top">
		<div class="container">
			<div class="row">
				<div class="testimonial_image col-ms-4 col-sm-3 col-md-2">
					<img src="http://placehold.it/300x300/333333/CCCCCC" class="img-responsive" />
				</div>
				<div class="testimonial_content col-ms-8 col-sm-9 col-md-10">
					<blockquote>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis sodales lorem. Etiam in sodales orci. Vestibulum vestibulum arcu ut orci sollicitudin posuere. Vestibulum non efficitur nulla, ac consequat augue. Suspendisse porttitor, nibh nec iaculis suscipit, leo nisi congue tortor, nec bibendum orci ex nec lorem. Curabitur nibh urna, hendrerit non quam eget, semper tristique orci. Suspendisse iaculis ultrices neque eu laoreet. Nulla convallis eget risus id fringilla.</p>
						<small>Someone who said Something</small>
					</blockquote>
				</div>
			</div>
		</div>
	</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<!-- Footer Top -->
		<div class="footer_top">
			<div class="container">
				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<div class="footer_social">
						<nav id="social-navigation" class="social-navigation" role="navigation">
							<?php
								// Social links navigation menu.
								wp_nav_menu( array(
									'theme_location' => 'social',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
								) );
							?>
						</nav><!-- .social-navigation -->
					</div>
				<?php endif; ?>

				<div class="footer_subscribe">
					<form class="form-inline">
						<div class="form-group">
							<label for="subscribe_email">Join our newsletter &amp; get the latest news, tips &amp; special offers</label>
								<div class="input-group">
								<input id="subscribe_email" name="subscribe_email" class="form-control" type="email" placeholder="Email Address" />
								<span class="input-group-btn">
									<button type="submit" class="btn">Join</button>
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<div id="footer">
		    <div class="container">
	        	<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<?php
						// Social links navigation menu.
						wp_nav_menu( array(
							'menu_class'     => 'footer-menu clearfix',
							'theme_location' => 'footer',
							'depth'          => 2,
						) );
					?>
               	<?php endif; ?>
		    </div>
		</div> <!-- #footer -->

		<div class="site-info">
			<div class="container">
	            <div class="row">
		            <?php if ( has_nav_menu( 'social' ) ) : ?>
		                <div class="col-md-6">
			                <nav id="social-navigation" class="social-navigation" role="navigation">
								<?php
									// Social links navigation menu.
									wp_nav_menu( array(
										'theme_location' => 'social',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>',
									) );
								?>
							</nav><!-- .social-navigation -->

		                    <a href="#" target="_blank" class="social_ic"><i class="fa fa-twitter"></i></a>
		                    <a href="#" target="_blank" class="social_ic"><i class="fa fa-youtube"></i></a>
		                    <a href="#" target="_blank" class="social_ic"><i class="fa fa-instagram"></i></a>
		                    <a href="#" target="_blank" class="social_ic"><i class="fa fa-google-plus"></i></a>
		                    <a href="#" target="_blank" class="social_ic"><i class="fa fa-facebook"></i></a>
		                    <a href="#" target="_blank" class="social_ic"><i class="fa fa-linkedin"></i></a>
		                </div>

	               		<div class="col-md-6">
	               	<?php else: ?>
	               		<div class="col-md-12">
	               	<?php endif; ?>

	                    <div class="copyright_section">

	                    	<?php
								/**
								 * Fires before the WPCore footer text for footer customization.
								 *
								 * @since WPCore 1.0
								 */
								do_action( 'twentyfifteen_credits' );
							?>
							&copy; <?php echo date('Y'); ?> Company Name | <a href="<?php echo esc_url( __( 'http://nbm.com.au/', 'twentyfifteen' ) ); ?>" target="_blank" rel="nofollow"><?php printf( __( 'Web Design by %s', 'twentyfifteen' ), 'NBM' ); ?></a>
	                    </div>
	                </div>
	            </div>
	        </div>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>