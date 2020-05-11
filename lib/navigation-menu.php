<?php

function themename_creat_nav_menu() {
    register_nav_menus( array(
        'main-menu' => esc_html__( 'Main Menu', 'themename' ),
        'footer-menu' => esc_html__( 'Footer Menu', 'themename' )
    ));
}

add_action('init', 'themename_creat_nav_menu');


function themename_aria_hasdropdown($atts, $item, $args) {
    if($args->theme_location == 'main-menu') {
        if(in_array('menu-item-has-children', $item->classes)) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }
    }

    return $atts;
}

add_filter('nav_menu_link_attributes', 'themename_aria_hasdropdown', 10, 3);

function themename_nav_link_attbute($attr, $item, $args) {
    $attr['aria-haspopup'] = 'ture';
    $attr['aria-expanded'] = 'false';
    return $attr;
}

add_action('nav_menu_link_attributes', 'themename_nav_link_attbute', 10, 3);

function themenaem_hasdropdown_button($dir, $title) {
    $button = '<button class="menu-button">';
    $button .= '<span class="u-screen-reader-text menu-button-show">'. sprintf(esc_html__( 'show %s submenu', 'themename'), $title) .'</span>';
    $button .= '<span aria-hidden="true" class="u-screen-reader-text menu-button-hide">'. sprintf(esc_html__( 'hide %s submenu', 'themename'), $title) .'</span>';
    $button .= '<i class="fa fa-arrow-'. $dir .'" aria-hidden="true"></i>';
    $button .= '</button>';
    return $button;
}

function themenaem_doropdoen_meno_icon($title, $item, $args, $depth) {
    if($args->theme_location == 'main-menu') {
        if(in_array('menu-item-has-children', $item->classes)) {
            if($depth == 0) {
                $title .= themenaem_hasdropdown_button('down', $title);
            }else{
                $title .= themenaem_hasdropdown_button('right', $title);
            }
        }
    }
    return $title;
}

add_filter('nav_menu_item_title', 'themenaem_doropdoen_meno_icon', 10, 4);