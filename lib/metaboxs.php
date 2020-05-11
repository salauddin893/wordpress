<?php

function themenaem_creat_metabox() {
    add_meta_box( 
        'themename_meta_box',
        esc_html__( 'Themename Meta Box', 'themename'),
        'themename_callback_meta_box',
        'post',
        'normal',
        'default');
}

add_action('add_meta_boxes', 'themenaem_creat_metabox');

function themename_callback_meta_box($post) {
    $subtile = get_post_meta( $post->ID, '_themename_post_subtile', true );
    $post_layout = get_post_meta( $post->ID, '_themename_post_layout', true );
    wp_nonce_field( 'themename_udpade_post_metabox', 'themename_udpade_post_metabox_nonce');
    ?>
    <p>
        <label for="themename_post_subtilte"><?php esc_html_e( 'Post Subtitle', 'themenaem' ) ?></label>
        <br>
        <input class='widefat' type="text" name="themename_post_subtitle_field" id="themename_post_subtilte" value="<?php echo esc_attr__( $subtile, 'themename'); ?>">
    </p>

    <p>
        <label for="themename_post_layout"><?php esc_html_e( 'Post Layout', 'themename' ) ?></label>
        <select class="widefat" name="themename_post_layout" id="themename_post_layout">
            <option <?php selected( $post_layout, 'full' ) ?> value="full"><?php esc_html_e( 'Full width', 'themename' ) ?></option>
            <option <?php selected( $post_layout, 'sidebar' ) ?> value="sidebar"><?php esc_html_e( 'Sidebar', 'themename' ) ?></option>
        </select>
    </p>

<?php }


function themename_save_post_metabox($post_id, $post) {

    $edit_capabality = get_post_type_object($post->post_type)->cap->edit_post;
    if(!current_user_can( $edit_capabality, $post_id )) {
        return;
    }

    if(!isset($_POST['themename_udpade_post_metabox_nonce']) || !wp_verify_nonce( $_POST['themename_udpade_post_metabox_nonce'], 'themename_udpade_post_metabox' )) {
        return;
    }

    if(array_key_exists('themename_post_subtitle_field', $_POST)) {
        update_post_meta( $post_id, '_themename_post_subtile', $_POST['themename_post_subtitle_field'] );
    }

    if(array_key_exists('themename_post_layout', $_POST)) {
        update_post_meta( $post_id, '_themename_post_layout', $_POST['themename_post_layout'] );
    }


}

add_action('save_post', 'themename_save_post_metabox', 10, 2);