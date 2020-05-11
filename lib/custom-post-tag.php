<?php


function themename_custom_tag() {
    $labels = array(
        'name'                       => _x( 'Projact', 'Taxonomy General Name', 'firsttheme_plugin' ),
		'singular_name'              => _x( 'Projact', 'Taxonomy Singular Name', 'firsttheme_plugin' ),
		'menu_name'                  => __( 'Projact', 'firsttheme_plugin' ),
		'all_items'                  => __( 'All Items', 'firsttheme_plugin' ),
		'parent_item'                => __( 'Parent Item', 'firsttheme_plugin' ),
		'parent_item_colon'          => __( 'Parent Item:', 'firsttheme_plugin' ),
		'new_item_name'              => __( 'New Item Name', 'firsttheme_plugin' ),
		'add_new_item'               => __( 'Add New Item', 'firsttheme_plugin' ),
		'edit_item'                  => __( 'Edit Item', 'firsttheme_plugin' ),
		'update_item'                => __( 'Update Item', 'firsttheme_plugin' ),
		'view_item'                  => __( 'View Item', 'firsttheme_plugin' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'firsttheme_plugin' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'firsttheme_plugin' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'firsttheme_plugin' ),
		'popular_items'              => __( 'Popular Items', 'firsttheme_plugin' ),
		'search_items'               => __( 'Search Items', 'firsttheme_plugin' ),
		'not_found'                  => __( 'Not Found', 'firsttheme_plugin' ),
		'no_terms'                   => __( 'No items', 'firsttheme_plugin' ),
		'items_list'                 => __( 'Items list', 'firsttheme_plugin' ),
		'items_list_navigation'      => __( 'Items list navigation', 'firsttheme_plugin' ),
    );
    $arrgs = array(
        'labels' => $labels,
        'hierarchical' => false,
        'show_admin_culomn' => true,
        'rewrite' => ['slug' => 'tag']
    );


    register_taxonomy( 'themenaem_custom_tag', ['themename_custom'], $arrgs);
}

add_action( 'init', 'themename_custom_tag');