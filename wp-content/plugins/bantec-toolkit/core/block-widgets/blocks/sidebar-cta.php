<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

CSF::createWidget('csf_sidebar_cta_widget', array(
    'title'       => esc_html__('CTA Sidebar - Bantec', 'bantec-toolkit'),
    'classname'   => 'csf-cta-widget',
    'description' =>  esc_html__('This Widget for CTA Info - bantec', 'bantec-toolkit'),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'bantec-toolkit'),
            'default' => esc_html__('Get Touch', 'bantec-toolkit'),
        ),

        array(
            'id'      => 'sub_title',
            'type'    => 'text',
            'title'   => esc_html__('Sub Title', 'bantec-toolkit'),
            'default' => esc_html__('Quick Help', 'bantec-toolkit'),
        ),

        array(
            'id'      => 'phone_number',
            'type'    => 'text',
            'title'   => esc_html__('Number', 'bantec-toolkit'),
            'default' => esc_html__('+125 (895) 658 568', 'bantec-toolkit'),
        ),

        array(
            'id'      => 'phone_number_url',
            'type'    => 'text',
            'title'   => esc_html__('Number Url', 'bantec-toolkit'),
            'default' => esc_html__('tel:+125 (895) 658 568', 'bantec-toolkit'),
        ),
    )
));

if (!function_exists('csf_sidebar_cta_widget')) {
    function csf_sidebar_cta_widget($args, $instance)
    {
        echo $args['before_widget'];

    ?>
        <div class="sidebar_cta-help mt-35">
            <div class="sidebar_cta-help-contact">
                <h5><?php echo esc_html($instance['title']); ?></h5>
                <span><?php echo esc_html($instance['sub_title']); ?></span>
                <div class="sidebar_cta-help-icon">
                    <i class="fal fa-phone-alt"></i>
                </div>
                <h5><a href="<?php echo esc_url($instance['phone_number_url']); ?>"><?php echo esc_html($instance['phone_number']); ?></a></h5>
            </div>
        </div>
    <?php
        echo $args['after_widget'];
    }
}
