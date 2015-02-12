<?php
/**
 * WPCore back compat functionality
 *
 * Prevents WPCore from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 */

/**
 * Prevent switching to WPCore on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 */
function wpcore_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'wpcore_upgrade_notice' );
}
add_action( 'after_switch_theme', 'wpcore_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * WPCore on WordPress versions prior to 4.1.
 *
 */
function wpcore_upgrade_notice() {
	$message = sprintf( __( 'WPCore requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'wpcore' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 */
function wpcore_customize() {
	wp_die( sprintf( __( 'WPCore requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'wpcore' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'wpcore_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 */
function wpcore_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'WPCore requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'wpcore' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'wpcore_preview' );
