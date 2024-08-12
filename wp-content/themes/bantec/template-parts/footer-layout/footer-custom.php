<?php
if (is_page() || is_singular('post') || bantec_custom_post_metas() && get_post_meta($post->ID, 'bantec_meta_options', true)) {
    $bantec_meta = get_post_meta($post->ID, 'bantec_meta_options', true);
} else {
    $bantec_meta = array();
}
if (is_array($bantec_meta) && array_key_exists('bantec_builder_deta', $bantec_meta) && $bantec_meta['meta_footer_layout'] != 'no') {
    $bantec_builder = $bantec_meta['bantec_builder_deta'];
} else {
    $bantec_builder = bantec_option('bantec_builder_deta');
}

if (true == post_type_exists('bantec_builder')):
    $footer_args = array(
        'p' => $bantec_builder,
        'post_type' => 'bantec_builder',
    );
    $footer_has_style = new WP_Query($footer_args);
    if ($footer_has_style->have_posts()):
        while ($footer_has_style->have_posts()):
            $footer_has_style->the_post(); ?>
            <div class="bantec-builder-footer">
                <?php the_content(); ?>
            </div>
        <?php endwhile;
        wp_reset_postdata();

    endif;

endif;
?>