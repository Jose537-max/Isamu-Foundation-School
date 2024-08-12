<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

CSF::createWidget('csf_menu_list_widget', array(
    'title'       => esc_html__('Menu Lists - Bantec', 'bantec-toolkit'),
    'classname'   => 'csf-menu-list-widget',
    'description' =>  esc_html__('This Widget for Menu List - bantec', 'bantec-toolkit'),
    'fields'      => array(


        array(
            'id'      => 'widget_title',
            'type'    => 'text',
            'title'   => esc_html__('Widget Title', 'bantec-toolkit'),
            'default' => esc_html__('Our Solution', 'bantec-toolkit'),
        ),

        // Select with categories
        array(
            'id'          => 'widget_two_menu',
            'type'        => 'select',
            'title'       =>  esc_html__('Select Menu', 'bantec-toolkit'),
            'placeholder' =>  esc_attr__('Select a Menu', 'bantec-toolkit'),
            'options'     => 'menus',
        ),

    )
));


if (!function_exists('csf_menu_list_widget')) {
    function csf_menu_list_widget($args, $instance)
    {

        echo $args['before_widget'];

        $widget_title = $instance['widget_title'];
        $selected_menu = $instance['widget_two_menu'];

?>
        <h2><?php echo esc_html($widget_title); ?></h2>
            <?php
            wp_nav_menu(array(
                'menu' => $selected_menu,
                'container_class'      => 'blog-category',
            ));
            ?>
        

<?php
        echo $args['after_widget'];
    }
}
