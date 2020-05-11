<?php

function themename_custom_post_type() {

    $labels = array(
        'name'                  => _x( 'Custom', 'Post Type General Name', 'firsttheme_plugin' ),
		'singular_name'         => _x( 'Custom Item', 'Post Type Singular Name', 'firsttheme_plugin' ),
		'menu_name'             => __( 'Custom', 'firsttheme_plugin' ),
		'name_admin_bar'        => __( 'Custom Item', 'firsttheme_plugin' ),
		'archives'              => __( 'Custom Item Archives', 'firsttheme_plugin' ),
		'attributes'            => __( 'Protfolio Item Attributes', 'firsttheme_plugin' ),
		'parent_item_colon'     => __( 'Custom Parent Item:', 'firsttheme_plugin' ),
		'all_items'             => __( 'All Items', 'firsttheme_plugin' ),
		'add_new_item'          => __( 'Add New Custom Items', 'firsttheme_plugin' ),
		'add_new'               => __( 'Add New', 'firsttheme_plugin' ),
		'new_item'              => __( 'New Item', 'firsttheme_plugin' ),
		'edit_item'             => __( 'Edit Item', 'firsttheme_plugin' ),
		'update_item'           => __( 'Update Item', 'firsttheme_plugin' ),
		'view_item'             => __( 'View Item', 'firsttheme_plugin' ),
		'view_items'            => __( 'View Items', 'firsttheme_plugin' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Custom Item Not found', 'firsttheme_plugin' ),
		'not_found_in_trash'    => __( 'Custom Item Not found in Trash', 'firsttheme_plugin' ),
		'featured_image'        => __( 'Featured Image', 'firsttheme_plugin' ),
		'set_featured_image'    => __( 'Set featured image', 'firsttheme_plugin' ),
		'remove_featured_image' => __( 'Remove featured image', 'firsttheme_plugin' ),
		'use_featured_image'    => __( 'Use as featured image', 'firsttheme_plugin' ),
		'insert_into_item'      => __( 'Insert into item', 'firsttheme_plugin' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'firsttheme_plugin' ),
		'items_list'            => __( 'Items list', 'firsttheme_plugin' ),
		'items_list_navigation' => __( 'Items list navigation', 'firsttheme_plugin' ),
		'filter_items_list'     => __( 'Filter items list', 'firsttheme_plugin' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'rewrite' => ['slug' => 'custome']
    );

    register_post_type( 'themename_custom', $args );

}


add_action('init', 'themename_custom_post_type');