<?php
    /**
     * WPCore functions and definitions
     */

/* Theme Setup */
require get_template_directory() . '/inc/theme-setup.php';

/* Customizer additions. */
// require get_template_directory() . '/inc/customizer.php';

/* Register widget areas. */
require get_template_directory() . '/inc/register-widgets.php';

/* Accessibility Stuff */
require get_template_directory() . '/inc/accessibility.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Enqueue scripts and styles. */
require get_template_directory() . '/inc/enqueue-scripts.php';


/* =========== Modules =========== */
/* Banners Module */
require_once get_template_directory() . '/inc/banners-custom-post-type.php';

/* Testimonials Module */
require_once get_template_directory() . '/inc/testimonials-custom-post-type.php';

/* Case Studies Module */
require_once get_template_directory() . '/inc/casestudies-custom-post-type.php';

/**
 * ACF Fields - Error Message
 */
function acf_admin_notice() {?>
    <div class="error"><p><?php _e( 'Error! Please install the "Advanced Custom Fields" &amp; the "ACF: Repeater Field" plugins.', 'my-text-domain' ); ?></p></div>
<?php }