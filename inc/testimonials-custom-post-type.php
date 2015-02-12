<?php
	/*
	Name: Custom Post Type - Testimonials
	Description: Setup Custom Post Types and their categories + add defaults
	Author: Matt Mcnamee
	Version: 1.0
	Author URI: http://www.mcnam.ee
	*/

	/**
	 * Create the new post types
	 */
	function create_post_type_testimonials() {
		register_post_type('testimonials',
			array(
				'labels'       => array(
					'name'         => __('Testimonials'),
					'singular_name'=> __('Testimonial'),
					'all_items'    => __('View All'),
					'add_new_item' => __('New Testimonial'),
					'add_new'      => __('Add Testimonial'),
					'edit_item'    => __('Edit Testimonial')
				),
				'public'         => true,
				'hierarchical'   => true,
				'menu_position'  => 4,
				'capability_type'=> 'page',
				'supports'       => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes')
			)
		);
	}
	add_action('init', 'create_post_type_testimonials');