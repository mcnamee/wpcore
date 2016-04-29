<?php
/**
 * wpcore functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpcore
 */

/**
 * Theme Setup.
 */
require get_template_directory() . '/inc/theme-setup.php';

/**
 * Register shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Register widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
