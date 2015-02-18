<?php
    /**
     *  Footer Testimonials Widget
     *  - Shows 1 post at random
     */
?>
<?php if ( get_theme_mod( 'wpcore_testimonial_image' ) ) : ?>
<div class="footer_testimonial section border_top" style="background-image: url(<?=esc_attr(get_theme_mod( 'wpcore_testimonial_image' ));?>);">
    <?php else : ?>
    <div class="footer_testimonial section border_top">
        <?php endif; ?>
    <div class="container">
        <div class="row">
        <?php
            $testimonialLoop = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => 1, 'orderby' => 'rand' ) );
            if ($testimonialLoop->have_posts()) :
                while ( $testimonialLoop->have_posts() ) : $testimonialLoop->the_post(); ?>

                    <div class="testimonial_image col-ms-4 col-sm-3 col-md-2">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive') ); ?>
                    </div> <!-- /.testimonial_image -->

                    <div class="testimonial_content col-ms-8 col-sm-9 col-md-10">
                        <blockquote>
                            <p><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
                            <small><?php the_title(); ?></small>
                        </blockquote>
                    </div> <!-- /.testimonial_content -->

            <?php endwhile; ?>
        <?php endif; ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.footer_testimonial -->