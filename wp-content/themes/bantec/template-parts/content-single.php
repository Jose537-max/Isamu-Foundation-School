<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bantec
 */
$post_date = bantec_option('blog_single_date', true);
$post_author = bantec_option('blog_single_author', true);
$post_comment = bantec_option('blog_single_comment', true);
?>

<?php bantec_post_thumbnail(); ?>
<div class="theme_blog_details-left-meta">
	<ul>
		<?php if ($post_author == 'yes') : ?>
			<li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
					<i class="fal fa-user"></i> <?php the_author(); ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($post_date == 'yes') : ?>
		<li><i class="fal fa-calendar-alt"></i><?php the_time(get_option('date_format')) ?></li>
		<?php endif; ?>
		<?php if (get_comments_number() != 0 && $post_comment == 'yes') : ?>
			<li><span><?php bantec_comment_number(); ?></span> </li>
		<?php endif; ?>
	</ul>

</div>


<div class="entry-content">
	<?php
	the_content();
	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'bantec'),
			'after'  => '</div>',
		)
	);
	?>
</div>
<?php if (has_tag()) : ?>

	<div class="theme_blog_details-left-tag align-items-baseline">
		<?php bantec_entry_footer(); ?>
	</div>

<?php endif; ?>