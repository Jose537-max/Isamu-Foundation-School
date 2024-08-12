<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bantec
 */
get_header();
$site_layout      = bantec_option('blog_layout', 'right-sidebar');
$selected_sidebar = bantec_option('blog_sidebar', 'sidebar-1');

if ($site_layout == 'left-sidebar' && is_active_sidebar($selected_sidebar) || $site_layout == 'right-sidebar' && is_active_sidebar($selected_sidebar)) {
	$content_layout = 'col-lg-8 lg-mb-40';
} else {
	$content_layout = 'col-lg-12';
}

?>

<main id="primary" class="site-main">
	<?php
	get_template_part('template-parts/default-options/' . 'breadcrumb');
	?>
	<div class="section-padding news__standard">
		<div class="container">
			<div class="row">
				<?php
				if ($site_layout == 'left-sidebar' && is_active_sidebar($selected_sidebar)) : ?>
					<div class="col-lg-4 order-last order-lg-first">
						<?php get_sidebar(); ?>
					</div>
				<?php endif; ?>
				<div class="<?php echo esc_attr($content_layout); ?>">
					<div class="news__standard-left">
						<?php
						if (have_posts()) :

							while (have_posts()) :
								the_post();
								get_template_part('template-parts/content', get_post_type());

							endwhile;

						else :
							get_template_part('template-parts/content', 'none');

						endif;
						?>
					</div>
					<?php get_template_part('template-parts/default-options/' . 'pagination'); ?>
				</div>

				<?php
				if ($site_layout == 'right-sidebar' && is_active_sidebar($selected_sidebar)) : ?>
					<div class="col-lg-4">
						<?php get_sidebar(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
