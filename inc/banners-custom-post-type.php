<?php
	/*
	Name: Custom Post Type - Banners
	Description: Setup Custom Post Types and their categories + add defaults
	Author: Matt Mcnamee
	Version: 1.0
	Author URI: http://www.mcnam.ee
	*/

	/**
	 * Create the new post types
	 */
	function create_post_type_banners() {
		register_post_type('banners',
			array(
				'labels'       => array(
					'name'         => __('Banners'),
					'singular_name'=> __('Banner'),
					'all_items'    => __('View All'),
					'add_new_item' => __('New Banner'),
					'add_new'      => __('Add Banner'),
					'edit_item'    => __('Edit Banner')
				),
				'public'         => true,
				'hierarchical'   => true,
				'menu_position'  => 4,
				'capability_type'=> 'page',
				'supports'       => array('title', 'page-attributes')
			)
		);
	}
	add_action('init', 'create_post_type_banners');

	/**
	 * Create the fields - generated via ACF
	 */
    if(function_exists("register_field_group"))
    {
        register_field_group(array (
            'id' => 'acf_banners-2',
            'title' => 'Banners',
            'fields' => array (
                array (
                    'key' => 'field_54dc4de7a274d',
                    'label' => 'Banners',
                    'name' => 'banners',
                    'type' => 'repeater',
                    'sub_fields' => array (
                        array (
                            'key' => 'field_54dc4e6ba274f',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                            'required' => 1,
                            'column_width' => '',
                            'save_format' => 'object',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                        ),
                        array (
                            'key' => 'field_54dc4df4a274e',
                            'label' => 'Title',
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
                        array (
                            'key' => 'field_54dc4e7ea2750',
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'wysiwyg',
                            'column_width' => '',
                            'default_value' => '',
                            'toolbar' => 'basic',
                            'media_upload' => 'no',
                        ),
                        array (
                            'key' => 'field_54dd2ed0cde6c',
                            'label' => 'Add Link to Image?',
                            'name' => 'add_link_to_image',
                            'type' => 'true_false',
                            'column_width' => '',
                            'message' => '',
                            'default_value' => 0,
                        ),
                        array (
                            'key' => 'field_54dc4e91a2751',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'text',
                            'conditional_logic' => array (
                                'status' => 1,
                                'rules' => array (
                                    array (
                                        'field' => 'field_54dd2ed0cde6c',
                                        'operator' => '==',
                                        'value' => '1',
                                    ),
                                ),
                                'allorany' => 'all',
                            ),
                            'column_width' => '',
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'formatting' => 'html',
                            'maxlength' => '',
                        ),
                        array (
                            'key' => 'field_54dc4ea4a2752',
                            'label' => 'Button Title',
                            'name' => 'button_title',
                            'type' => 'text',
                            'conditional_logic' => array (
                                'status' => 1,
                                'rules' => array (
                                    array (
                                        'field' => 'field_54dd2ed0cde6c',
                                        'operator' => '==',
                                        'value' => '1',
                                    ),
                                ),
                                'allorany' => 'all',
                            ),
                            'column_width' => '',
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'formatting' => 'html',
                            'maxlength' => '',
                        ),
                        array (
                            'key' => 'field_54dc4ecea2753',
                            'label' => 'Open in new window',
                            'name' => 'open_in_new_window',
                            'type' => 'true_false',
                            'conditional_logic' => array (
                                'status' => 1,
                                'rules' => array (
                                    array (
                                        'field' => 'field_54dd2ed0cde6c',
                                        'operator' => '==',
                                        'value' => '1',
                                    ),
                                ),
                                'allorany' => 'all',
                            ),
                            'column_width' => '',
                            'message' => '',
                            'default_value' => 0,
                        ),
                    ),
                    'row_min' => 1,
                    'row_limit' => '',
                    'layout' => 'row',
                    'button_label' => 'Add Banner',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'banners',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array (
                'position' => 'acf_after_title',
                'layout' => 'default',
                'hide_on_screen' => array (
                ),
            ),
            'menu_order' => 0,
        ));
    } else {
		acf_admin_notice();
	}
