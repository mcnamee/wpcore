<?php
/**
 * WPCore Customizer functionality
 *
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function wpcore_customize_register( $wp_customize ) {

    // Blogname and description
    $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    // Add an image uploader for the logo
    $wp_customize->add_section( 'wpcore_header_logo_section' , array(
        'title'       => __( 'Logo', 'wpcore' ),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
    ) );
    $wp_customize->add_setting( 'wpcore_header_logo' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpcore_header_logo', array(
        'label'    => __( 'Logo', 'wpcore' ),
        'section'  => 'wpcore_header_logo_section',
        'settings' => 'wpcore_header_logo'
    ) ) );

    // Add an additional description to the header image section.
    $wp_customize->add_section( 'wpcore_testimonial_section' , array(
        'title'       => __( 'Testimonial Background Image', 'wpcore' ),
        'priority'    => 30,
        'description' => 'Upload an image to replace the testimonial background image',
   ) );

    $wp_customize->add_setting( 'wpcore_testimonial_image' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpcore_testimonial_image', array(
        'label'    => __( 'Background Image', 'wpcore' ),
        'section'  => 'wpcore_testimonial_section',
        'settings' => 'wpcore_testimonial_image',
   ) ) );
}
add_action( 'customize_register', 'wpcore_customize_register', 11 );
