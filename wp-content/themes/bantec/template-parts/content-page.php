<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bantec
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php bantec_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'bantec') . '</span>',
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</div><!-- #post-<?php the_ID(); ?> -->