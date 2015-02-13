<?php
    /**
     *  Recent Posts
     *  - Shows 4 most recent posts
     */
?>
<div class="col-sm-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Blog
            <small><a href="<?php echo get_permalink(get_option("page_for_posts")); ?>">View All &gt;&gt;</a></small>
        </div>
        <div class="list-group striped list-group-flush">

            <?php
                $blogLoop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4) );
                if ($blogLoop->have_posts()) :
                    while ( $blogLoop->have_posts() ) : $blogLoop->the_post(); ?>

                        <div class="list-group-item container-fluid">
                            <div class="row no-gutters">
                                <div class="col-xs-2">
                                    <div class="date_box">
                                        <div class="date_box_month"><?php echo get_the_date('M'); ?></div>
                                        <?php echo get_the_date('j'); ?>
                                    </div> <!-- /.date_box -->
                                </div> <!-- /.col -->

                                <div class="col-xs-10">
                                    <div class="blog_listing">
                                        <h5 class="font-display"><a href="<?php the_permalink(); ?>" class="inherit-color"><?php the_title(); ?></a></h5>
                                        <p><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
                                        <a href="<?php the_permalink(); ?>">View Post &gt;&gt;</a>
                                    </div> <!-- /.blog_listing -->
                                </div> <!-- /.col -->
                            </div> <!-- /.row -->
                        </div> <!-- /.list-group-item -->

                <?php endwhile; ?>
            <?php endif; ?>

        </div> <!-- /.list-group -->
    </div> <!-- /.panel -->
</div> <!-- /.col -->