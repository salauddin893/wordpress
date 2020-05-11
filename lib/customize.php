<?php

function themename_customize_creat($wp_customize) {

    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial('blogname', array(
        'selector' => '.c-header__blogname',
        'container_inclusive' => false,
        'render_callback' => function() {
            bloginfo( 'name' );
        }
    ));

    // footer selectiove refresh
    $wp_customize->selective_refresh->add_partial('themename_add_partial', array(
        'settings' => ['themenaem_footer_info_text', 'themename_footer_bg', 'themename_footer_layout'],
        'selector' => '#footeer',
        'container_inclusive' => false,
        'render_callback' => function() {
            get_template_part( 'template-part/footer/widget');
            get_template_part( 'template-part/footer/info');
        }
    ));

    // footer option secton
    $wp_customize->add_section('themename_footer_option', array(
        'title' => esc_html__( 'Footer Option', 'themename' ),
        'description' => esc_html__( 'this is footer option', 'themename' )
    ));
    
    // footer text info
    $wp_customize->add_setting('themenaem_footer_info_text', array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'themename_sanitize_footer_info'
    ));

    $wp_customize->add_control('themenaem_footer_info_text', array(
        'label' => esc_html__( 'Footer Info', 'themename'),
        'type' => 'text',
        'section' => 'themename_footer_option'
    ));

    // Footer option background color
    $wp_customize->add_setting('themename_footer_bg', array(
        'default' => 'dark',
        'transport' => 'postMessage',
        'sanitize_callback' => 'themename_sanitize_footer_bg'
    ));

    $wp_customize->add_control('themename_footer_bg', array(
        'label' => esc_html__( 'Footer Bg', 'themename'),
        'type' => 'select',
        'choices' => array(
            'dark' => esc_html__( 'Dark', 'themenaem' ),
            'light' => esc_html__( 'Light', 'themename' )
        ),
        'section' => 'themename_footer_option'
    ));

    // footer column layout
    $wp_customize->add_setting('themename_footer_layout', array(
        'default' => '3,3,3,3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('themename_footer_layout', array(
        'label' => esc_html__('Footer layout', 'themename'),
        'type' => 'text',
        'section' => 'themename_footer_option'
    ));

    // theme color picker
    $wp_customize->add_section('themename_genaral_section', array(
        'title' => esc_html__( 'Genaral', 'themename' ),
        'description' => esc_html__( 'this is genaral option', 'themenaem' )
    ));

    $wp_customize->add_setting('themename_color_picker', array(
        'default' => 'red',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_color_control( $wp_customize, 'themename_color_picker', array(
        'label' => esc_html__('Color Picker', 'themename'),
        'section' => 'themename_genaral_section'
    )));


    // single blog section
    $wp_customize->add_section('themename_single_section', array(
        'title' => esc_html__( 'Single Option', 'themename' ),
        'discription' => esc_html__( 'This is single option', 'themename'),
        'active_callback' => 'themename_single_blog_show_section'
    ));

    $wp_customize->add_setting('themename_single_author_info', array(
        'default' => true,
        'transport' => 'postMessage',
        'sanitize_callback' => 'themename_asnitize_author_info'
    ));

    $wp_customize->add_control('themename_single_author_info', array(
        'label' => esc_html__( 'Author info hide', 'themename' ),
        'type' => 'checkbox',
        'section' => 'themename_single_section'
    ));

}

add_action('customize_register', 'themename_customize_creat');

function themename_single_blog_show_section() {
    global $post;
    return is_single() && $post->post_type === 'post';
}

function themename_asnitize_author_info($checkbox) {
    return (isset($checkbox) && $checkbox === true) ? true : false;
}


function themename_sanitize_footer_info( $input ) {

    $allowad = array( 'a' => array(
            'href' => array()
    ));

    return wp_kses($input, $allowad);

}


function themename_sanitize_footer_bg($value) {
    $select = array('dark', 'light');
    if(in_array($value, $select, true)) {
        return $value;
    }
    return 'dark';
}
