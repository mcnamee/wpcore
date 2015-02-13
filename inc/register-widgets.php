<?php
    /*
     * Register Widget Areas
     * */
    if ( ! function_exists( 'wpcore_widgets_init' ) ) :
        function wpcore_widgets_init() {
            register_sidebar( array(
                'name'          => __( 'Blog Sidebar', 'wpcore' ),
                'id'            => 'sidebar-1',
                'description'   => __( 'Add widgets here to appear in your sidebar.', 'wpcore' ),
                'before_widget' => '<div class="col-md-12"><div class="panel panel-default">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<div class="panel-heading">',
                'after_title'   => '</div>',
            ) );

            register_sidebar( array(
                'name'          => __( 'Page Sidebar', 'wpcore' ),
                'id'            => 'page-sidebar',
                'description'   => __( 'Add widgets here to appear on the page sidebar.', 'wpcore' ),
                'before_widget' => '<div class="col-md-12"><div class="panel panel-default">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<div class="panel-heading">',
                'after_title'   => '</div>',
            ) );

            register_sidebar( array(
                'name'          => __( 'Home Widget Area', 'wpcore' ),
                'id'            => 'home-widgets',
                'description'   => __( 'Add widgets here to appear on your Homepage.', 'wpcore' ),
                'before_widget' => '<div class="col-md-4"><div class="panel panel-default">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<div class="panel-heading">',
                'after_title'   => '</div>',
            ) );
        }
        add_action( 'widgets_init', 'wpcore_widgets_init' );
    endif;