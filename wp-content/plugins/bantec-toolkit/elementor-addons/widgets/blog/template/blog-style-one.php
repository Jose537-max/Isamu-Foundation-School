<?php if ('design-1' === $settings['select_design']): ?>
    <div class="blog_one">
        <div class="blog_one-area <?php echo esc_attr($grid_columns); ?>">
            <?php while ($post_query->have_posts()):
                $post_query->the_post(); ?>
                    <div class="blog_one-item">
                        <div class="blog_one-item-img">
                            <div class="blog_one-item-image">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                                </a>
                                <?php if ('yes' === $settings['blog_date_meta']): ?>
                                    <div class="blog_one-item-image-date <?php echo esc_attr( $settings['vertical_icon_align'] ); ?> <?php echo esc_attr( $settings['horizontal_icon_align'] ); ?> <?php echo esc_attr( $settings['blog_date_view'] ); ?>">
                                        <h6><?php echo get_the_date('d') ?></h6>
                                        <span><?php echo get_the_date('M') ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="blog_one-item-content">
                            <?php if ('yes' === $settings['blog_username_meta'] || 'yes' === $settings['blog_comment_meta']): ?>
                                <div class="blog_one-item-content-meta <?php echo esc_attr( $settings['meta_view'] ); ?>">
                                    <ul>
                                        <?php if ('yes' === $settings['blog_username_meta']): ?>
                                            <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i
                                                        class="far fa-user"></i>
                                                    <?php the_author(); ?>
                                                </a></li>
                                        <?php endif; ?>

                                        <?php if ('yes' === $settings['blog_comment_meta']): ?>
                                            <li><a href="<?php the_permalink(); ?>"><i class="far fa-comment-dots"></i>
                                                    <?php
                                                    // Make sure bantec_comments_count function exists before calling it
                                                    if (function_exists('bantec_comments_count')) {
                                                        bantec_comments_count();
                                                    }
                                                    ?>
                                                </a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <?php if (!empty($settings['blog_btn_text'])): ?>
                                <a class="blog_btn <?php echo esc_attr( $settings['icon_align'] ); ?>" href="<?php the_permalink(); ?>">
                                    <?php echo esc_html($settings['blog_btn_text']); ?>
                                    <?php if (!empty($settings['btn_icon']['value'])):?><i class="<?php echo esc_attr($settings['btn_icon']['value']); ?>"></i><?php endif;?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
            endwhile;
            ?>
            </div>
            <?php if ('yes' === $settings['blog_pagination']) {
            bantec_pagination($post_query); 
            }
            wp_reset_query();
            ?>
     
    </div>
<?php endif; ?>