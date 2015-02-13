<?php
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    if ( ! function_exists( 'wpcore_setup' ) ) :
        function wpcore_setup() {

            /* Make theme available for translation. // Translations can be filed in the /languages/ directory. */
            load_theme_textdomain( 'wpcore', get_template_directory() . '/languages' );

            /* Add default posts and comments RSS feed links to head. */
            add_theme_support( 'automatic-feed-links' );

            /* Let WordPress manage the document <title/> */
            add_theme_support( 'title-tag' );

            /* Enable support for Post Thumbnails on posts and pages. */
            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 825, 510, true );

            /* This theme uses wp_nav_menu() */
            register_nav_menus( array(
                'primary' => __( 'Primary Menu',      'wpcore' ),
                'social'  => __( 'Social Links Menu', 'wpcore' ),
                'footer'  => __( 'Footer Menu',       'wpcore' ),
            ) );

            /* Switch default core markup for search form, comment form, and comments to output valid HTML5. */
            add_theme_support( 'html5', array(
                'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
            ) );

            /* Enable support for Post Formats. */
            /*add_theme_support( 'post-formats', array(
                'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
            ) );*/

            /* WPCORE Customizer */
            /*$color_scheme  = wpcore_get_color_scheme();
            $default_color = trim( $color_scheme[0], '#' );

            /* Setup the WordPress core custom background feature. */
            /* add_theme_support( 'custom-background', apply_filters( 'wpcore_custom_background_args', array(
                'default-color'      => $default_color,
                'default-attachment' => 'fixed',
            ) ) );*/

            /*
             * This theme styles the visual editor to resemble the theme style,
             * specifically font, colors, icons, and column width.
             */
            /*add_editor_style( array( 'css/editor-style.css' ) );*/
        }
    endif;
    add_action( 'after_setup_theme', 'wpcore_setup' );