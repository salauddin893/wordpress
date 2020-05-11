<?php

function themename_assets(){

    wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), '1.0.0', 'all');
    
    include( get_template_directory() . '/lib/inline-style.php');
    wp_add_inline_style( 'main-style',  $inline_css);

    wp_enqueue_script( 'themename-script', get_template_directory_uri() . '/dist/assets/js/bundle.js', array('jquery'), '1.0.0', true );

    if(is_singular() && comments_open( ) && get_option('thread_comments')) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action('wp_enqueue_scripts', 'themename_assets');


function themename_admin_assets() {

    wp_enqueue_style( 'main-admin-style', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), '1.0.0', 'all');
    wp_enqueue_script( 'themename-admin-script', get_template_directory_uri() . '/dist/assets/js/admin.js', array('jquery'), '1.0,0', true);
}

add_action('admin_enqueue_scripts', 'themename_admin_assets');



function themename_customize_preview_js() {

    wp_enqueue_script( 'themenaem-cutomize-preview', get_template_directory_uri() . '/dist/assets/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0', true);

    include( get_template_directory() . '/lib/inline-style.php');
    wp_localize_script( 'themenaem-cutomize-preview', 'themename', array('inline-css' => $inline_style_selectors));
}


add_action('customize_preview_init', 'themename_customize_preview_js');