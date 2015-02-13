<?php
    /**
     * WPCore only works in WordPress 4.1 or later.
     */
    if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
        require get_template_directory() . '/inc/back-compat.php';
    }

    /**
     * Add a `screen-reader-text` class to the search form's submit button.
     */
    function wpcore_search_form_modify( $html ) {
        return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
    }
    add_filter( 'get_search_form', 'wpcore_search_form_modify' );


    /**
     * A Walker for Bootstrap Navs.
     */
    require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

    /**
     * Display descriptions in main navigation.
     */
    function wpcore_nav_description( $item_output, $item, $depth, $args ) {
        if ( 'primary' == $args->theme_location && $item->description ) {
            $item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
        }

        return $item_output;
    }
    add_filter( 'walker_nav_menu_start_el', 'wpcore_nav_description', 10, 4 );