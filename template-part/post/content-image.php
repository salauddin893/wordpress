<article <?php post_class('c-post u-margin-bottom-20') ?>>
    <div class="c-post__inner">

            <div class="c-post__excerpt">
                <?php
                 the_content();
                ?>
            </div>

            <div class="c-post__meta">
        `      <?php themename_post_meta(); ?>
            </div>

        <?php if(is_single()) { ?>
            <?php get_template_part( 'template-part/post/footer'); ?>
        <?php } ?>

    </div>
</article>