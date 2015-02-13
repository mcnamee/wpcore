<?php
    /*
     * Enqueue Scripts for this theme
     * */
    if ( ! function_exists( 'wpcore_scripts' ) ) :
        function wpcore_scripts() {
            /* Register CSS */
            wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '4.2.0' );
            wp_enqueue_style( 'wpcore-style', get_stylesheet_uri() );
            wp_enqueue_style( 'bootstrap-main', get_template_directory_uri() . '/css/main.min.css', array(), 'v3.3.1' );

            /* Register JS */
            wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), 'v3.3.1' );
            wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), 'v1', true );
            wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/js/scripts.js', array( 'jquery', 'plugins-js' ), 'v1', true );
        }
        add_action( 'wp_enqueue_scripts', 'wpcore_scripts' );
    endif;