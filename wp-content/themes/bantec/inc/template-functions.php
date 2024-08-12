<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package bantec
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bantec_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'bantec_body_classes');


// WP kses allowed tags
function bantech_kses($raw){

	$allowed_tags = array(
	   'a'                         => array(
		  'class'   => array(),
		  'href'    => array(),
		  'rel'  => array(),
		  'title'   => array(),
		  'target' => array(),
	   ),
	   'abbr'                      => array(
		  'title' => array(),
	   ),
	   'b'                         => array(),
	   'blockquote'                => array(
		  'cite' => array(),
	   ),
	   'cite'                      => array(
		  'title' => array(),
	   ),
	   'code'                      => array(),
	   'del'                    => array(
		  'datetime'   => array(),
		  'title'      => array(),
	   ),
	   'dd'                     => array(),
	   'div'                    => array(
		  'class'   => array(),
		  'title'   => array(),
		  'style'   => array(),
	   ),
	   'dl'                     => array(),
	   'dt'                     => array(),
	   'em'                     => array(),
	   'h1'                     => array(),
	   'h2'                     => array(),
	   'h3'                     => array(),
	   'h4'                     => array(),
	   'h5'                     => array(),
	   'h6'                     => array(),
	   'i'                         => array(
		  'class' => array(),
	   ),
	   'img'                    => array(
		  'alt'  => array(),
		  'class'   => array(),
		  'height' => array(),
		  'src'  => array(),
		  'width'   => array(),
	   ),
	   'li'                     => array(
		  'class' => array(),
	   ),
	   'ol'                     => array(
		  'class' => array(),
	   ),
	   'p'                         => array(
		  'class' => array(),
	   ),
	   'q'                         => array(
		  'cite'    => array(),
		  'title'   => array(),
	   ),
	   'span'                      => array(
		  'class'   => array(),
		  'title'   => array(),
		  'style'   => array(),
	   ),
	   'iframe'                 => array(
		  'width'         => array(),
		  'height'     => array(),
		  'scrolling'     => array(),
		  'frameborder'   => array(),
		  'allow'         => array(),
		  'src'        => array(),
	   ),
	   'strike'                 => array(),
	   'br'                     => array(),
	   'strong'                 => array(),
	   'data-wow-duration'            => array(),
	   'data-wow-delay'            => array(),
	   'data-wallpaper-options'       => array(),
	   'data-stellar-background-ratio'   => array(),
	   'ul'                     => array(
		  'class' => array(),
	   ),
	   'svg' => array(
			'class' => true,
			'aria-hidden' => true,
			'aria-labelledby' => true,
			'role' => true,
			'xmlns' => true,
			'width' => true,
			'height' => true,
			'viewbox' => true, // <= Must be lower case!
		),
		'g'     => array( 'fill' => true ),
		'title' => array( 'title' => true ),
		'path'  => array( 'd' => true, 'fill' => true,  ),
	   );
 
	if (function_exists('wp_kses')) { // WP is here
	   $allowed = wp_kses($raw, $allowed_tags);
	} else {
	   $allowed = $raw;
	}
 
	return $allowed;
 }


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bantec_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'bantec_pingback_header');

// check if any custom post 

function bantec_custom_post_metas( $post = null ) {
	$custom_post_list = get_post_types( array( '_builtin' => false ) );

	// there are no custom post types
	if ( empty ( $custom_post_list ) ) {
		return false;
	}

	$custom_types     = array_keys( $custom_post_list );
	$current_post_type = get_post_type( $post );

	// could not detect current type
	if ( ! $current_post_type ) {
		return false;
	}

	return in_array( $current_post_type, $custom_types );
}

// Comment list
function bantec_custom_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment; ?>

	<div class="theme_blog_details-left-comment-item" id="comment-<?php comment_ID(); ?>">
		<div class="theme_blog_details-left-comment-item-comment">
			<div class="theme_blog_details-left-comment-item-comment-image">
				<?php if ($avarta = get_avatar($comment)) :
					printf($avarta);
				endif; ?>
			</div>
			<div class="theme_blog_details-left-comment-item-comment-content">
				<?php
				if ($comment->user_id != '0') {
					printf('<h6>%1$s</h6>', get_user_meta($comment->user_id, 'nickname', true));
				} else {
					printf('<h6>%1$s</h6>', get_comment_author_link());
				}
				?>
				<?php 
				comment_reply_link(array_merge($args, array(
					'depth' => $depth, 
					'max_depth' => $args['max_depth'], 
					'reply_text' => '<i class="fal fa-reply-all"></i>' . esc_html__('Reply', 'bantec'),
				)));
				?>
				<span><?php echo get_comment_date('j M, Y'); ?></span>
				<span><?php edit_comment_link(esc_html__('Edit', 'bantec'), '', ''); ?></span>
				<?php comment_text() ?>
			</div>

			<?php if ($comment->comment_approved == '0') : ?>
				<div class='comments-notify'>
					<span class="unapproved"><?php esc_html_e('Your comment is awaiting moderation.', 'bantec'); ?></span>
				</div>
			<?php endif; ?>

		</div>
	</div>
				
<?php }
