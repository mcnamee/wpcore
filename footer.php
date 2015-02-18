<?php
/**
 *
 * The template for displaying the footer
 *
 */
?>
    <?php include('parts/testimonials-footer.php'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<!-- Footer Top -->
		<div class="footer_top">
			<div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <?php if ( has_nav_menu( 'social' ) ) : ?>
                        <nav id="social-navigation" class="social-navigation" role="navigation">
                            <?php
                            // Social links navigation menu.
                            wp_nav_menu( array(
                                'theme_location' => 'social',
                                'depth'          => 1,
                                'link_before'    => '<span class="screen-reader-text hidden">',
                                'link_after'     => '</span>',
                            ) );
                            ?>
                        </nav><!-- .social-navigation -->
                    <?php endif; ?>
                    </div> <!-- /.col -->

                    <?php if ( get_theme_mod( 'wpcore_header_byline' ) ) : ?>
                        <div class="col-md-6 text-right">
                            <form action="http://mailhq.nbm.com.au/" method="post" class="form-inline">
                                <div class="form-group">
                                    <label for="subscribe_email">
                                        <?php echo esc_attr(get_theme_mod( 'wpcore_footer_signup' )); ?>
                                    </label>

                                    <div class="input-group">
                                        <input id="subscribe_email" name="cm-jldklr-jldklr" class="form-control" type="email" placeholder="Email Address" required/>
								<span class="input-group-btn">
									<button type="submit" class="btn">Join</button>
								</span>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- /.col -->
                    <?php endif; ?>
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
                    <div class="col-md-12">
	                    <div class="copyright_section">
							&copy; <?php echo date('Y'); ?>  <?=get_bloginfo( 'name' ); ?> | <a href="<?php echo esc_url( __( 'http://nbm.com.au/', 'wpcore' ) ); ?>" target="_blank" rel="nofollow"><?php printf( __( 'Web Design by %s', 'wpcore' ), 'NBM' ); ?></a>
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