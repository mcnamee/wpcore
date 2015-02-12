<?php
/**
 * WPCore functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since WPCore 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since WPCore 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * WPCore only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'wpcore_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since WPCore 1.0
 */
function wpcore_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
		'footer'  => __( 'Footer Menu',       'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/* WPCORE Customizer */
	/*$color_scheme  = wpcore_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wpcore_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );*/

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css' ) );
}
endif; // wpcore_setup
add_action( 'after_setup_theme', 'wpcore_setup' );

/**
 * Register widget area.
 *
 * @since WPCore 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */

function wpcore_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<div class="col-md-12"><div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'twentyfifteen' ),
		'id'            => 'page-sidebar',
		'description'   => __( 'Add widgets here to appear on the page sidebar.', 'twentyfifteen' ),
		'before_widget' => '<div class="col-md-12"><div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Home Widget Area', 'twentyfifteen' ),
		'id'            => 'home-widgets',
		'description'   => __( 'Add widgets here to appear on your Homepage.', 'twentyfifteen' ),
		'before_widget' => '<div class="col-md-4"><div class="panel panel-default">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="panel-heading">',
		'after_title'   => '</div>',
	) );

}
add_action( 'widgets_init', 'wpcore_widgets_init' );

/**
 * Enqueue scripts and styles.
 *
 * @since WPCore 1.0
 */
function wpcore_scripts() {

	// Add Font Awesome Icons
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '4.2.0' );

	// Load our main stylesheet.
	wp_enqueue_style( 'wpcore-style', get_stylesheet_uri() );

	// Load the Bootstrap Files.
	wp_enqueue_style( 'bootstrap-main', get_template_directory_uri() . '/css/main.min.css', array(), 'v3.3.1' );
	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), 'v3.3.1' );
	wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), 'v1', true );
	wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/js/scripts.js', array( 'jquery', 'plugins-js' ), 'v1', true );
}
add_action( 'wp_enqueue_scripts', 'wpcore_scripts' );

/**
 * Display descriptions in main navigation.
 *
 * @since WPCore 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function wpcore_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'wpcore_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since WPCore 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function wpcore_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'wpcore_search_form_modify' );

/**
 * Custom template tags for this theme.
 *
 * @since WPCore 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since WPCore 1.0
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * A Walker for Bootstrap Navs.
 *
 * @since Core 2
 */
require_once get_template_directory() . '/wp_bootstrap_navwalker.php';

/**
 * Banners Module
 *
 */
require_once get_template_directory() . '/inc/banners-custom-post-type.php';

/**
 * ACF Fields - Error Message
 *
 */
function acf_admin_notice() {?>
    <div class="error"><p><?php _e( 'Error! Please install the "Advanced Custom Fields" &amp; the "ACF: Repeater Field" plugins.', 'my-text-domain' ); ?></p></div>
<?php }