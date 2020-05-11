<?php get_header();
    $autho_id = get_query_var( 'author');
    $author_posts = count_user_posts($autho_id);
    $author_display = get_the_author_meta('display_name', $autho_id);
    $author_description = get_the_author_meta( 'user_description', $autho_id);
    $author_website = get_the_author_meta( 'user_url', $autho_id);
?>

    <div class="o-container u-margin-bottom-40">
        <div class="o-row">
            <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
               <header>
                    <?php echo get_avatar( $autho_id, 200 ) ?>
                    <h3 class="u-margin-bottom-20"><b><?php echo esc_html__( $author_display, 'themename' ); ?></b></h3>
                    <?php 
                        printf(esc_html(_n( '%s post', '%s posts', $author_posts, 'themename')), $author_posts);
                    ?>
                    <br>
                    <?php  if($author_website) { ?>
                        <a target="_blank" href="<?php echo esc_url($author_website); ?>"> <?php echo esc_html__( $author_website, 'themename'); ?> </a>
                    <?php } ?>
                    <p class="c-post-atuthor__desc"><?php echo esc_html__( $author_description, 'themename' ); ?></p>
               </header>
            </div>
            <div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium">
                <main role="main">
                    <?php get_template_part('loop', 'author') ?>
                </main>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
