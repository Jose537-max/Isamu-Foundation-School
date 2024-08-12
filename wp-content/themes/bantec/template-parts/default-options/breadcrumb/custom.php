<?php
if (is_page() || is_singular('post') || bantec_custom_post_metas() && get_post_meta($post->ID, 'bantec_meta_options', true)) {
    $bantec_meta = get_post_meta($post->ID, 'bantec_meta_options', true);
} else {
    $bantec_meta = array();
}
if (is_array($bantec_meta) && array_key_exists('breadcrumb_post_id', $bantec_meta) && $bantec_meta['breadcrumb_layout'] != 'default') {
    $bantec_builder = $bantec_meta['breadcrumb_post_id'];
} else {
    $bantec_builder = bantec_option('breadcrumb_post_id');
}

if (true == post_type_exists('bantec_builder')):
    $breadcrumb_args = array(
        'p' => $bantec_builder,
        'post_type' => 'bantec_builder',
    );
    $breadcrumb_has_style = new WP_Query($breadcrumb_args);
    if ($breadcrumb_has_style->have_posts()):
        while ($breadcrumb_has_style->have_posts()):
            $breadcrumb_has_style->the_post(); ?>
            <div class="bantec-builder-breadcrumb">
                <?php the_content(); ?>
            </div>
        <?php endwhile;
        wp_reset_postdata();

    endif;

endif;
?>