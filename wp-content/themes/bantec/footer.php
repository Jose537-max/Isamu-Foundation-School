<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bantec
 */

if (is_page() || is_singular('post') || bantec_custom_post_metas() && get_post_meta($post->ID, 'bantec_meta_options', true)) {
    $bantec_meta = get_post_meta($post->ID, 'bantec_meta_options', true);
} else {
    $bantec_meta = array();
}

$footer_custom = bantec_option('footer_layout_style');

if ((is_array($bantec_meta) && array_key_exists('meta_footer_layout', $bantec_meta) && $bantec_meta['meta_footer_layout'] != 'no') || ($footer_custom != 'footer-default' && class_exists('CSF'))) { 
    $footer_layout = 'footer-custom';
} else {
    $footer_layout = 'footer-default';
}
?>


<?php get_template_part('template-parts/footer-layout/' .  $footer_layout . ''); ?>


<?php get_template_part('template-parts/default-options/' . 'scroll-up'); ?>
</div> <!-- site content -->
</div><!-- body class : dark -->


<?php wp_footer(); ?>
</body>

</html>