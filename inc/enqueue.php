<?php
/**
 * Enqueue scripts and styles.
 */
function wpcore_scripts() {
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), '4.4.0' );
	wp_enqueue_style( 'wpcore-style', get_template_directory_uri() . '/assets/css/main.css', array(), '20151215', true );

	wp_enqueue_script( 'wpcore-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), '20151215', true );
	wp_enqueue_script( 'wpcore-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpcore_scripts' );