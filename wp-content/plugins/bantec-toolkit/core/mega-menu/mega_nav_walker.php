<?php
// Check if Elementor\Plugin class exists to avoid errors if Elementor is not active

use Elementor\Plugin as Elementor;

class Bantec_Custom_Nav_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        // Check if the current menu item has the mega menu enabled
        $navmega = get_post_meta($item->ID, 'bantec_nav_options', true);
        $is_mega_menu_enabled = !empty($navmega['mega_menu']) && $navmega['mega_menu'] != 'no' && !empty($navmega['bantec_menu_id']);

        // Add 'mega-menu-enabled' class to parent menu item if mega menu is enabled
        $has_children_class = in_array('menu-item-has-children', $item->classes) ? 'menu-item-has-children' : '';
        $mega_menu_class = $is_mega_menu_enabled ? ' mega-menu-enabled' : ''; // Add this class if mega menu is enabled

        // Ensure all dynamic attributes are properly escaped
        $output .= "<li id='menu-item-" . esc_attr($item->ID) . "' class='menu-item menu-item-type-post_type menu-item-object-page " . esc_attr($has_children_class) . esc_attr($mega_menu_class) . "'>";
        $output .= "<a href='" . esc_url($item->url) . "' class='menu-link'>" . esc_html($item->title) . "</a>";

        if ($is_mega_menu_enabled) {
            $output .= $this->getBantecItemBuilderContent($navmega['bantec_menu_id']);
        }
    }

    private function getBantecItemBuilderContent($template_id)
    {
        static $elementor = null;
        if (null === $elementor) {
            $elementor = Elementor::instance();
        }
        // Wrap the Elementor builder content inside a 'mega-menu-wrap' div
        return "<div class='mega-menu-wrap'>" . $elementor->frontend->get_builder_content_for_display($template_id) . "</div>";
    }

}
