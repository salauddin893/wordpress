<footer class="c-post__footer">
    <?php
        if(has_category()) {
            echo '<div class="c-post__cats">';
            $cat_list = get_the_category_list(esc_html__( ', ', 'themename' ));
            printf(esc_html__( 'Post in %s', 'themename' ), $cat_list);
            echo '</div>';
        }

        if(has_tag()) {
            echo '<div class="c-post__tags">';
            $tag_list = get_the_tag_list( '<ul><li>', '</li><li>',  '</li></ul>' );
            echo $tag_list;
            echo '</div>';
        }
    ?>
</footer>