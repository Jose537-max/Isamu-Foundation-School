<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

CSF::createWidget('csf_download_widget', array(
    'title'       => esc_html__('Download Info - Bantec', 'bantec-toolkit'),
    'classname'   => 'csf-download-widget',
    'description' =>  esc_html__('This Widget for Download Info - Bantec', 'bantec-toolkit'),
    'fields'      => array(

        array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'bantec-toolkit'),
            'default' => esc_html__('Download', 'bantec-toolkit'),
        ),
        array(
            'id'      => 'btn_text_one',
            'type'    => 'text',
            'title'   => esc_html__('PDF Button', 'bantec-toolkit'),
            'default' => esc_html__('Our Brochures', 'bantec-toolkit'),
        ),
        array(
            'id'      => 'btn_url_one',
            'type'    => 'text',
            'title'   => esc_html__('PDF URL', 'bantec-toolkit'),
            'default' => esc_attr__('http://google.com', 'bantec-toolkit'),
        ),
        array(
            'id'      => 'btn_text_two',
            'type'    => 'text',
            'title'   => esc_html__('Company Button', 'bantec-toolkit'),
            'default' => esc_html__('Company Details', 'bantec-toolkit'),
        ),
        array(
            'id'      => 'btn_url_two',
            'type'    => 'text',
            'title'   => esc_html__('Company File URL', 'bantec-toolkit'),
            'default' => esc_attr__('http://google.com', 'bantec-toolkit'),
        ),
    )
));


if (!function_exists('csf_download_widget')) {
    function csf_download_widget($args, $instance)
    {
        echo $args['before_widget'];
        $widget_title = $instance['title'];
    ?>
        <h2><?php echo esc_html($widget_title); ?></h2>
        <div class="sidebar_download">
            <ul>
                <li>
                    <a href="<?php echo esc_url($instance['btn_url_one']); ?>">
                        <div>
                            <i class="fa-light fa-file-word"></i>
                            <?php echo esc_html($instance['btn_text_one']); ?>
                        </div>
                        <span class="fal fa-arrow-to-bottom"></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url($instance['btn_url_two']); ?>">
                        <div>
                            <i class="fa-light fa-file-pdf"></i>
                            <?php echo esc_html($instance['btn_text_two']); ?>
                        </div>
                        <span class="fal fa-arrow-to-bottom"></span>
                    </a>
                </li>
            </ul>
        </div>
    <?php
        echo $args['after_widget'];
    }
}
