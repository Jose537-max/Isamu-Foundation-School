<?php
if (!defined('ABSPATH')) exit;

CSF::createWidget('csf_recent_post_widget', array(
  'title'       => esc_html__('Recent Post - Bantec', 'bantec-toolkit'),
  'classname'   => 'csf-recent-post-widget',
  'description' =>  esc_html__('This Widget Make Recent Post', 'bantec-toolkit'),
  'fields'      => array(
    array(
      'id'      => 'post_widget_title',
      'type'    => 'text',
      'title'   => esc_html__('Title', 'bantec-toolkit'),
    ),
    array(
      'id'      => 'post_per_page',
      'type'    => 'number',
      'title'   => esc_html__('Post Per Page', 'bantec-toolkit'),
    ),

  )
));

if (!function_exists('csf_recent_post_widget')) {
  function csf_recent_post_widget($args, $instance)
  {
    echo $args['before_widget'];

    if (!empty($instance['title'])) {
      echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
    }

    $post_count = $instance['post_per_page'];

    $post_type = array(
      'post_type'           => 'post',
      'posts_per_page'      => $post_count,
      'ignore_sticky_posts' => true,
    );

    $resent_post = new WP_Query($post_type);
?>
    <?php if ($resent_post->have_posts()) : ?>
      <?php if (!empty($instance['post_widget_title'])) : ?>
        <h2><?php echo esc_html($instance['post_widget_title']); ?></h2>
      <?php endif; ?>
      <div class="block-recent-post">
        <?php while ($resent_post->have_posts()) : $resent_post->the_post(); ?>
          <div class="block-recent-post_item">
            <?php if (has_post_thumbnail()) : ?>
              <div class="post_item-image">
                <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php the_post_thumbnail_url('thumbnail') ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>"></a>
              </div>
            <?php endif; ?>
            <div class="post_item-title">
              <h6><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h6>
              <span><i class="far fa-calendar-alt"></i><?php the_time(get_option('date_format')) ?></span>
            </div>
          </div>

        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>

    <?php else :  ?>
      <p><?php echo esc_html('Sorry, no posts matched your criteria.', 'bantec-toolkit'); ?></p>
    <?php endif; ?>
<?php
    echo $args['after_widget'];
  }
}
