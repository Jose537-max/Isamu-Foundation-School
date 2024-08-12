<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bantec
 */

get_header();

if (get_post_meta($post->ID, 'bantec_meta_options', true)) {
    $bantec_meta = get_post_meta($post->ID, 'bantec_meta_options', true);
} else {
    $bantec_meta = array();
}

if (array_key_exists('section_padding', $bantec_meta)) {
    $section_padding = $bantec_meta['section_padding'];
} else {
    $section_padding = 'section-padding';
}
?>
<main id="primary" class="site-main">
<?php get_template_part('template-parts/default-options/' . 'breadcrumb'); ?>
    <div class="<?php echo esc_attr($section_padding); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-single">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php

get_footer();
