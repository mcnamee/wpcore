<?php
/**
 * WPCore Customizer functionality
 *
 */

function wpcore_customize_register( $wp_customize ) {

    /*
     * Blogname and description
     */
    $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    /*
     * Add an image uploader for the logo
     */
    $wp_customize->add_section( 'wpcore_header_header_section' , array(
        'title'       => __( 'Header', 'wpcore' ),
        'priority'    => 30
    ) );
    $wp_customize->add_setting( 'wpcore_header_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpcore_header_logo', array(
        'label'    => __( 'Logo', 'wpcore' ),
        'section'  => 'wpcore_header_header_section',
        'settings' => 'wpcore_header_logo'
    ) ) );

    /*
     * Add a text field for a header by-line
     */
    $wp_customize->add_setting( 'wpcore_header_byline' );
    $wp_customize->add_control( 'wpcore_header_byline',
        array(
            'label'    => __( 'By Line', 'wpcore' ),
            'section'  => 'wpcore_header_header_section',
            'settings' => 'wpcore_header_byline',
            'type'     => 'text'
    ) );

    /*
     * Add Footer Testimonial Image
     */
    $wp_customize->add_section( 'wpcore_footer_section' , array(
        'title'       => __( 'Footer', 'wpcore' ),
        'priority'    => 30
   ) );
    $wp_customize->add_setting( 'wpcore_testimonial_image' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpcore_testimonial_image', array(
        'label'    => __( 'Background Image', 'wpcore' ),
        'section'  => 'wpcore_footer_section',
        'settings' => 'wpcore_testimonial_image',
   ) ) );

    /*
     * Add a text field for footer newsletter signup
     */
    $wp_customize->add_setting( 'wpcore_footer_signup' );
    $wp_customize->add_control( 'wpcore_footer_signup',
        array(
            'label'    => __( 'Signup Text', 'wpcore' ),
            'section'  => 'wpcore_footer_section',
            'settings' => 'wpcore_footer_signup',
            'type'     => 'text'
        ) );
}

add_action( 'customize_register', 'wpcore_customize_register', 11 );
