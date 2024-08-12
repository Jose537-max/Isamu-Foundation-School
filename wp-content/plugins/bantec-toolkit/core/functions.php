<?php

// contact form remove auto p tag and space 
add_filter('wpcf7_autop_or_not', '__return_false');

/*
disable Custom Post Types from Search Results
*/

function exclude_cpt_from_search($query)
{
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $exclude_post_type = 'bantec_builder'; 
        $query->set('post_type', array_diff(get_post_types(), array($exclude_post_type)));
    }
}
add_action('pre_get_posts', 'exclude_cpt_from_search');

