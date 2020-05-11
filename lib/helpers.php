<?php


function themename_post_meta() {

    printf(esc_html__( 'posted by %s', 'themename'),
        '<a href="' . esc_url(get_permalink()) . '"> <time date="'. esc_attr( get_the_date("c")) . '">' . esc_html( get_the_date()) . '</time> </a>'
    );

    printf(esc_html__( 'By %s', 'themename' ),
        '<a href="' . esc_url( get_author_posts_url(get_the_author_meta("ID"))) . '">' . esc_html( get_the_author()) . '</a>'
    );

}

function themename_readmore_link() {

    echo '<a href="' . esc_url( get_permalink()) . '" title="' . esc_attr( the_title_attribute(['echo' => false])) . '">';
    printf(
        wp_kses(
        __( 'Read More <span class="u-screen-reader-text">About %s </span>', 'themename' ),
            [
                'span' => [
                    'class' => []
                ]
            ]
        ),
        esc_html(get_the_title())
    );
    echo '</a>';
}


function themename_delete_post() {

    $url = add_query_arg( array(
        'action' => 'themenaem_delete_post',
        'post' => get_the_ID(),
        'nonce' => wp_create_nonce('themename_delete_post_' . get_the_ID())
    ), home_url( '/'));

    // var_dump(current_user_can( 'delete_posts', get_the_ID()));

    return '<a href="'. $url .'">'. esc_html__( 'Delete Post', 'themename' ) .'</a>';
}

function themename_single_post_layout($id, $key, $default) {
    $allowd = get_post_meta( $id, $key, true );
    if(!$allowd && $default) {
        return $default;
    }
    return $allowd;
}