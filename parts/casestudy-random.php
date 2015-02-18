<?php
    /**
     *  Case Study Widget
     *  - Shows 1 post at random
     */
?>
<div class="col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            Case Studies
            <small><a href="/casestudies">View All &gt;&gt;</a></small>
        </div>
        <div class="panel-body container-fluid">

            <?php
                $casestudyLoop = new WP_Query( array( 'post_type' => 'casestudies', 'posts_per_page' => 1, 'orderby' => 'rand' ) );
                if ($casestudyLoop->have_posts()) :
                    while ( $casestudyLoop->have_posts() ) : $casestudyLoop->the_post(); ?>

                        <div class="row">
                            <div class="col-ms-5 col-sm-6 col-md-5 col-lg-6 text-center">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive') ); ?>
                                </a>
                            </div> <!-- /.col -->

                            <div class="col-ms-7 col-sm-6 col-md-7 col-lg-6">
                                <h4 class="font-display"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
                                <a href="<?php the_permalink(); ?>">View Post &gt;&gt;</a>
                            </div> <!-- /.col -->
                        </div> <!-- /.row -->

                <?php endwhile; ?>
            <?php endif; ?>

        </div> <!-- /.panel-body -->
    </div> <!-- /.panel -->
</div> <!-- /.col -->