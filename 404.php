<?php get_header(); ?>

    <div class="o-container u-margin-bottom-40">
        <div class="o-row">
            <div class="o-row__column o-row__column--span-12">
                <main role="main">
                    <h3><?php esc_attr_e( 'Search result not found', 'themenaem' ); ?></h3>
                    <?php get_search_form( ); ?>
                </main>
            </div>
        </div>
    </div>

<?php get_footer(); ?>