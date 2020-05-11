<?php

    $prev = get_previous_post();
    $next = get_next_post();

?>

<?php if($prev || $next) { ?>
    <nav class="c-post-navigation">
        <h2 class="u-screen-reader-text"><?php esc_html_e( 'Post Navigation', 'themename'); ?></h2>
        <div class="c-post-navigation__links">
            <?php if($prev) { ?>
                <div class="c-post-navigation__post c-post-navigation__post--prev">
                    <a href="<?php the_permalink( $prev->ID ) ?>" class="c-post-navigation__link">
                        <?php if(has_post_thumbnail( $prev->ID )) { ?> 
                            <div class="c-post-navigation__thumbnail">
                                <?php echo get_the_post_thumbnail( $prev->ID, 'thumbnail'); ?>
                            </div>
                        <?php } ?>
                        <div class="c-post-navigation__content">
                            <span class="c-post-navigation__subtitle">
                                <?php esc_html_e( 'Previews Post', 'themename' ); ?>
                            </span>
                            <span class="c-post-navigation__title">
                                <?php echo esc_html__( get_the_title($prev->ID), 'themename' ); ?>
                            </span>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <?php if($next) { ?>
                <div class="c-post-navigation__post c-post-navigation__post--next">
                    <a href="<?php the_permalink($next->ID); ?>" class="c-post-navigation__link">
                        <?php if(has_post_thumbnail($next->ID)) { ?>
                            <div class="c-post-navigation__thumbnail">
                                <?php echo get_the_post_thumbnail( $next->ID, 'thumbnail'); ?>
                            </div>
                        <?php } ?>
                        <div class="c-post-navigation__content">
                            <span class="c-post-navigation__subtitle">
                                <?php echo esc_html__( 'Next Post', 'themenaem' ); ?>
                            </span>
                            <span class="c-post-navigation__title">
                                <?php echo get_the_title($next->ID); ?>
                            </span>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </nav>
<?php } ?>