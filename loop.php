<?php if(have_posts()) { ?>

    <?php while(have_posts()) { the_post() ?>

        <?php get_template_part( 'template-part/post/content', get_post_format()) ?>

    <?php } ?>

    <?php the_posts_pagination(); ?>

<?php }else{ ?>

    <?php get_template_part( 'template-part/post/content', 'none' ) ?>

<?php } ?>