<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bantec
 */
$post_date = bantec_option('blog_list_date', true);
$post_author = bantec_option('blog_list_author', true);
$post_comment = bantec_option('blog_list_comment', true);
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="theme_blog_standard-item">
		<?php if (has_post_thumbnail()) : ?>
			<div class="theme_blog_standard-item-image">
				<?php bantec_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
		<div class="theme_blog_standard-item-content">
			<div class="theme_blog_standard-item-content-meta">
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
			<?php if (get_the_title()) : ?>
				<h3 class="mb-20"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php endif; ?>
			<?php the_excerpt(); ?>
			<a class="btn-one" href="<?php the_permalink(); ?>"><?php echo esc_html(bantec_option('blog-cta-btn')); ?> <i class="fa-regular fa-angle-right"></i></a>
		</div>
	</div>
</div><!-- #post-<?php the_ID(); ?> -->