<?php
    $footer_bg = get_theme_mod( 'themename_footer_bg', 'dark');
    $site_info = get_theme_mod( 'themenaem_footer_info_text', '' );
?>

<?php if($site_info) { ?>
<div class="c-site-info c-site-info--<?php echo $footer_bg ?>">
    <div class="o-container">
        <div class="o-row">
            <div class="o-row__column o-row__column--span-12 c-site-info__text">
                    <?php 
                        $allowad = array( 'a' => array(
                            'href' => array()
                        ));
                        wp_kses(_e( $site_info, 'themenaem' ), $allowad);
                    ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>