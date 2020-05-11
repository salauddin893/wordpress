<?php if(have_posts()) { ?>
    <?php while(have_posts()) { the_post() ?>

        <?php get_template_part( 'template-part/post/content', get_post_format() ) ?>

        <?php
            $author_check = get_theme_mod( 'themename_single_author_info', true );
            if($author_check) {
                get_template_part( 'template-part/single/author'); 
            }
        ?>

        <?php get_template_part('template-part/single/navigation'); ?>

        <?php 
            if(comments_open() || get_comments_number()) {
                comments_template();
            } 
        ?>

    <?php } ?>

    <?php }else{ ?>

    <?php get_template_part( 'template-part/post/content', 'none' ) ?>

<?php } ?>