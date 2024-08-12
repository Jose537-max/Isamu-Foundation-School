<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bantec
 */
$error_page_btn = bantec_option('error_page_btn', true);
$error_page_404 = bantec_option('error_page_404');
$bantec_htmls = array(
    'span'   => array(),
);

get_header();
get_template_part('template-parts/default-options/' . 'breadcrumb');
?>

<div class="theme_error section-padding-three">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="theme_error-page">
				    <h1><?php echo wp_kses($error_page_404, $bantec_htmls); ?></h1>
					<h2><?php echo esc_html(bantec_option('error_page_title')); ?></h2>
					<p><?php echo esc_html(bantec_option('error_page_content')); ?></p>
					<?php if ($error_page_btn  == 'yes') : ?>
						<a class="btn-one" href="<?php echo esc_url(home_url('/')); ?>"><i class="fa-regular fa-angle-left"></i><?php echo esc_html(bantec_option('error_page_btn_text')); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
