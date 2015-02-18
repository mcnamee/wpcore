<?php
	/*
	Name: Custom Post Type - Case Studies
	Description: Setup Custom Post Types and their categories + add defaults
	Author: Matt Mcnamee
	Version: 1.0
	Author URI: http://www.mcnam.ee
	*/

	/**
	 * Create the new post types
	 */
	function create_post_type_casestudies() {
		register_post_type('casestudies',
			array(
				'labels'       => array(
					'name'         => __('Case Studies'),
					'singular_name'=> __('Case Study'),
					'all_items'    => __('View All'),
					'add_new_item' => __('New Case Study'),
					'add_new'      => __('Add Case Study'),
					'edit_item'    => __('Edit Case Study')
				),
				'public'         => true,
				'hierarchical'   => true,
				'menu_position'  => 4,
				'capability_type'=> 'page',
                'has_archive'    => true,
				'supports'       => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes')
			)
		);
	}
	add_action('init', 'create_post_type_casestudies');

    /**
     * Create the fields - generated via ACF
     */
    if(function_exists("register_field_group"))
    {
        register_field_group(array (
            'id' => 'acf_case-studies',
            'title' => 'Case Studies',
            'fields' => array (
                array (
                    'key' => 'field_54dd3734573fa',
                    'label' => 'Image Gallery',
                    'name' => 'image_gallery',
                    'type' => 'repeater',
                    'sub_fields' => array (
                        array (
                            'key' => 'field_54dd374d573fb',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                            'column_width' => '',
                            'save_format' => 'object',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                        ),
                        array (
                            'key' => 'field_54dd3759573fc',
                            'label' => 'Title/Caption',
                            'name' => 'title',
                            'type' => 'text',
                            'column_width' => '',
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'formatting' => 'html',
                            'maxlength' => '',
                        ),
                    ),
                    'row_min' => '',
                    'row_limit' => '',
                    'layout' => 'table',
                    'button_label' => 'Add Row',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'casestudies',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array (
                'position' => 'normal',
                'layout' => 'default',
                'hide_on_screen' => array (
                ),
            ),
            'menu_order' => 0,
        ));
    } else {
        acf_admin_notice();
    }