<?php

if (!defined('ABSPATH'))
    exit; // No access of directly access
// Update Post Support
$cpt_support = get_option('elementor_cpt_support');

//check if option DOESN'T exist in db
if (!$cpt_support) {
    $cpt_support = ['page', 'post', 'service', 'portfolio', 'bantec_builder'];
    update_option('elementor_cpt_support', $cpt_support);
}

// Disable default colors & default fonts
$disable_default_colors = 'yes';
$disable_default_fonts = 'yes';
update_option('elementor_disable_color_schemes', $disable_default_colors);
update_option('elementor_disable_typography_schemes', $disable_default_fonts);

// Register categories
function bantec_toolkit_widget_categories($elements_manager)
{

    $elements_manager->add_category(
        'bantec-toolkit',
        [
            'title' => esc_html__('Bantec Toolkit', 'bantec-toolkit'),
            'icon' => 'fa fa-plug',
        ]
    );

    $elements_manager->add_category(
        'custom-design',
        [
            'title' => esc_html__('Custom Design', 'bantec-toolkit'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'bantec_toolkit_widget_categories');

// Number of Comments
function bantec_comments_count()
{
    $comments_number = get_comments_number();
    if ($comments_number == 0) {
        echo esc_html__('Comment', 'bantec-toolkit') . ' (0)';
    } elseif ($comments_number == 1) {
        echo esc_html__('Comment', 'bantec-toolkit') . ' (1)';
    } else {
        echo esc_html__('Comments', 'bantec-toolkit') . ' (' . $comments_number . ')';
    }
}


// Post Category
function bantec_post_categories()
{
    $options = array();
    $post_categories_terms = get_terms(
        array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        )
    );

    if (!empty($post_categories_terms) && !is_wp_error($post_categories_terms)) {
        foreach ($post_categories_terms as $term) {
            $options[$term->slug] = $term->name;
        }
    }

    return $options;
}

// Portfolio Category
function bantec_portfolio_categories()
{
    $options = array();
    $portfolio_categories_terms = get_terms(
        array(
            'taxonomy' => 'portfolio_category',
            'hide_empty' => true,
        )
    );

    if (!empty($portfolio_categories_terms) && !is_wp_error($portfolio_categories_terms)) {
        foreach ($portfolio_categories_terms as $term) {
            $options[$term->slug] = $term->name;
        }
    }

    return $options;
}

// Display Menu
function bantec_nav_menu()
{
    $menu_list = get_terms(
        array(
            'taxonomy' => 'nav_menu',
            'hide_empty' => true,
        )
    );
    $options = [];
    if (!empty($menu_list) && !is_wp_error($menu_list)) {
        foreach ($menu_list as $menu) {
            $options[$menu->term_id] = $menu->name;
        }
        return $options;
    }
}

// Display Template Builders 
function bantec_template_builder()
{

    $template_list = array(
        'post_type' => 'bantec_builder',
        'posts_per_page' => -1,
    );

    $templates = get_posts($template_list);

    $options = [];

    if (!empty($templates) && !is_wp_error($templates)) {
        foreach ($templates as $template) {
            $options[$template->ID] = $template->post_title;
        }
        return $options;
    }
}

// Daynamic Paginations for all Post Type

if ( !function_exists( 'bantec_pagination' ) ) {

    function bantec_pagination( $query = null ) {
        if ( empty( $query ) ):
            $query = $GLOBALS['wp_query'];
        endif;
     
        if ( $query->max_num_pages < 2 ) {
            return;
        }       
        if(is_front_page()) {
            $paged = get_query_var('page') ? intval( get_query_var('page')) : 1;
        }else {
            $paged = get_query_var('paged') ? intval( get_query_var('paged')) : 1;
        }
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args = array();
        $url_parts = explode( '?', $pagenum_link );
        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }
        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
        $format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
  
        $links = paginate_links( array(
            'base'      => $pagenum_link,
            'format'    => $format,
            'total'     => $query->max_num_pages,
            'current'   => $paged,
            'add_args'  => array_map( 'urlencode', $query_args ),
            'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
            'type'      => 'array',
        ) );
        if ( $links ) {
        ?>
		<div class="theme__pagination">
			<ul>
                <?php foreach ( $links as $key => $page_link ): ?>
                    <li><?php echo $page_link ?></li>
                <?php endforeach?>
			</ul>
		</div>
		<?php
}
}
}


function bantec_toolkit_editor_styles() {

	wp_enqueue_style( 'bantec-toolkit-editor-css' , BANTEC_ASSETS . 'elementor-addons/assets/css/editor.css', array(), '1.0.0');

}
add_action( 'elementor/editor/after_enqueue_styles', 'bantec_toolkit_editor_styles' );