<?php
if (is_page() || is_singular('post') || bantec_custom_post_metas() && get_post_meta($post->ID, 'bantec_meta_options', true)) {
    $bantec_meta = get_post_meta($post->ID, 'bantec_meta_options', true);
} else {
    $bantec_meta = array();
}
if (is_array($bantec_meta) && array_key_exists('bantec_builder_id', $bantec_meta) && $bantec_meta['meta_header_layout'] != 'no') {
    $bantec_builder = $bantec_meta['bantec_builder_id'];
} else {
    $bantec_builder = bantec_option('bantec_builder_id');
}

if (is_array($bantec_meta) && array_key_exists('transparent_header', $bantec_meta)) {
    $transparent_header = $bantec_meta['transparent_header'];
} else {
    $transparent_header = 'no-bantec-transparent-header';
}


if (true == post_type_exists('bantec_builder')):
    $header_args = array(
        'p' => $bantec_builder,
        'post_type' => 'bantec_builder',
    );
    $header_has_style = new WP_Query($header_args);
    if ($header_has_style->have_posts()):
        while ($header_has_style->have_posts()):
            $header_has_style->the_post(); ?>
            <div class="bantec-builder-header <?php echo esc_attr($transparent_header); ?>">
                <?php the_content(); ?>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    endif;
endif;
?>