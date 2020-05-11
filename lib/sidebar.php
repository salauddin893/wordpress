<?php

function themename_sidebar_creat() {
    register_sidebar( array(
        'id' => 'primary-sidebar',
        'name' => esc_html__( 'Primary sidebar', 'themename' ),
        'description' => esc_html__( 'this is primary sidebar', 'themenaem' ),
        'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

}

$footer_layout = get_theme_mod( 'themename_footer_layout', '3,3,3,3');
$columns = explode(',', $footer_layout);
$footer_bg = get_theme_mod( 'themename_footer_bg', 'dark');
$widget_them = '';

if($footer_bg == 'light') {
    $widget_them = 'c-footer-widget--dark';
}else{
    $widget_them = 'c-footer-widget--light';
}


foreach($columns as $i => $column) {
    register_sidebar( array(
        'id' => 'footer-sidebar-' . ($i + 1),
        'name' => sprintf(esc_html__( 'Footer sidebar %s', 'themenaem' ), $i + 1),
        'description' => sprintf(esc_html__( 'This is footer sidebar', 'themename')),
        'before_widget' => '<section id="%1$s" class="c-footer-widget' . $widget_them . ' %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));

}


add_action( 'widgets_init', 'themename_sidebar_creat' );