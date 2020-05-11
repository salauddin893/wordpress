<?php get_header(); ?>

<?php
    $post_layout = themename_single_post_layout(get_the_ID(), '_themename_post_layout', 'sidebar');
    $sidebar_active = is_active_sidebar( 'primary-sidebar' );

    if($post_layout == 'sidebar' && !$sidebar_active) {
        $post_layout = 'full';
    }
?>

    <div class="o-container u-margin-bottom-40">
        <div class="o-row">
            <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $post_layout == 'sidebar' ? '8' : '12'; ?>@medium">
                <main role="main">
                    <?php get_template_part('loop', 'single'); ?>
                </main>
            </div>
            <?php if($post_layout == 'sidebar') { ?>
                <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
                    <?php get_sidebar( ); ?>
                </div>
            <?php } ?>
        </div>
    </div>

<?php get_footer(); ?>
