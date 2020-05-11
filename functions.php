<?php

include_once('lib/helpers.php');
include_once('lib/enqueue-assets.php');
include_once('lib/sidebar.php');
include_once('lib/theme-support.php');
include_once('lib/navigation-menu.php');
include_once('lib/customize.php');
include_once('lib/metaboxs.php');
include_once('lib/comments-callback.php');
include_once('lib/custom-post-type.php');
include_once('lib/custom-texonomi.php');
include_once('lib/custom-post-tag.php');
include_once('lib/most-resent-widget.php');


function themename_shotcode_creat_button($atts, $content) {
    extract(shortcode_atts( array(
        'title' => ''
    ), $atts));

    return '<button type="submit" title="'. $title .'">'. do_shortcode($content) .'</button>';
};

add_shortcode( 'themename_button', 'themename_shotcode_creat_button' );


function themenaem_shortcode_icon_creat($atts) {
    extract(shortcode_atts( array(
        'icon' => ''
    ), $atts));
    return '<i class="'.$icon.'"></i>';
}


add_shortcode( 'themename_shortcode_icon', 'themenaem_shortcode_icon_creat' );


// add_action('pre_get_posts', 'themename_get_post');


// function themename_get_post($query) {
//     if($query->is_main_query()) {
//         $query->set('posts_per_page', 2);
//     }
// }


function themename_delete_post_action() {
    if(isset($_GET['action']) && $_GET['action'] === 'themenaem_delete_post') {

    if(!isset($_GET['nonce']) || !wp_verify_nonce( $_GET['nonce'], 'themename_delete_post_' . $_GET['post'])) {
        return;
    }

    $post_id = isset($_GET['post']) ? $_GET['post'] : null;
    $post = get_post((int) $post_id);

    if(empty($post)) {
        return;
    }


    if(!current_user_can( 'delete_post', $post_id )) {
        return;
    }



    wp_trash_post( $post_id );
    wp_safe_redirect(home_url());

    die;

    }
}


add_action('init', 'themename_delete_post_action');