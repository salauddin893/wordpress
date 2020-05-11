<article <?php post_class('c-post u-margin-bottom-20') ?>>
    <div class="c-post__inner">
        <?php if(get_the_post_thumbnail() !== '') { ?>
        <div class="c-post__thumbnail">
            <?php the_post_thumbnail('themename-bolog-images') ?>
        </div>
        <?php } ?>

            <?php get_template_part( 'template-part/post/header'); ?>

        <?php if(is_single()) { ?>
            <div class="c-post__content">
                <?php
                 the_content();
                 wp_link_pages();
                ?>
            </div>
        <?php }else{ ?>
            <div class="c-post__excerpt">
                <?php the_excerpt( ) ?>
            </div>
        <?php } ?>


        <?php if(is_single()) { ?>
            <?php get_template_part( 'template-part/post/footer'); ?>
        <?php } ?>

        <?php if(!is_single()) themename_readmore_link(); ?>

        <?php if(!is_single()) { ?>
        <?php if(current_user_can( 'delete_posts', get_the_ID())) { ?>
            <?php echo themename_delete_post() ?>
        <?php } } ?>
    </div>
</article>