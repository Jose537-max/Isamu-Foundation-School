<?php
/* Filter the single_template with our custom function*/
add_filter('single_template', 'custom_template');

function custom_template($single_template)
{

    global $post;
    $post_type = $post->post_type;
    /* Checks for single template by post type */
    if ($post_type == 'bantec_builder') {
        if (file_exists(plugin_dir_path(__FILE__) . 'builder-editor.php')) {
            return plugin_dir_path(__FILE__) . 'builder-editor.php';
        }
    }

    return $single_template;
}
