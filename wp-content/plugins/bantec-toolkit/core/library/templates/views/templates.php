<?php
if (!defined('ABSPATH')) {
    exit;
}
$logo = BANTEC_ICON_SRC;

?>

<!-- template-library-header -->
<script type="text/template" id="bantec-toolkit-liteTemplateLibrary_header-logo">
    <span class="liteTemplateLibrary_logo-wrap">
        <img src="<?php echo $logo; ?>" alt=" Template libery Logo" width="25">
    </span>
    <span class="liteTemplateLibrary_logo-title">{{{ title }}}</span>
</script>

<script type="text/template" id="bantec-toolkit-liteTemplateLibrary_header-back">
    <i class="eicon-" aria-hidden="true"></i>
    <span><?php echo __('Back to Library', 'bantec-toolkit'); ?></span>
</script>

<script type="text/template" id="bantec-toolkit-TemplateLibrary_header-menu">
    <# _.each( tabs, function( args, tab ) { var activeClass = args.active ? 'elementor-active' : ''; #>
        <div class="elementor-component-tab elementor-template-library-menu-item {{activeClass}}" data-tab="{{{ tab }}}">{{{ args.title }}}</div>
    <# } ); #>
</script>

<script type="text/template" id="bantec-toolkit-TemplateLibrary_header-menu-responsive">

</script>

<script type="text/template" id="bantec-toolkit-TemplateLibrary_header-actions">
    <div id="liteTemplateLibrary_header-sync" class="elementor-templates-modal__header__item">
        <i class="eicon-sync" aria-hidden="true" title="<?php esc_attr_e('Sync Library', 'bantec-toolkit'); ?>"></i>
        <span class="elementor-screen-only"><?php esc_html_e('Sync Library', 'bantec-toolkit'); ?></span>
    </div>
</script>

<!-- template-library-preview.php -->
<script type="text/template" id="bantec-toolkit-TemplateLibrary_preview">
    <img class="liteTemplateLibrary_template-preview-thumbnail">
</script>

<script type="text/template" id="bantec-toolkit-TemplateLibrary_header-insert">
    <div id="elementor-template-library-header-preview-insert-wrapper" class="elementor-templates-modal__header__item">
        {{{ bantec.library.getModal().getTemplateActionButton( obj ) }}}
    </div>
</script>

<!-- template-library-button -->
<script type="text/template" id="bantec-toolkit-TemplateLibrary_insert-button">
    <a class="elementor-template-library-template-action elementor-button bantecTemplateLibrary_insert-button footer-live-preview">
        <i class="eicon-file-download" aria-hidden="true"></i>
        <span class="elementor-button-title"><?php esc_html_e('Insert', 'bantec-toolkit'); ?></span>
    </a>
</script>

<!-- template-library-loader -->
<script type="text/template" id="bantec-toolkit-liteTemplateLibrary_loading">
    <div class="elementor-loader-wrapper">
        <div class="elementor-loader">
            <div class="elementor-loader-boxes">
                <div class="elementor-loader-box"></div>
                <div class="elementor-loader-box"></div>
                <div class="elementor-loader-box"></div>
                <div class="elementor-loader-box"></div>
            </div>
        </div>
        <div class="elementor-loading-title"><?php esc_html_e('Loading', 'bantec-toolkit'); ?></div>
    </div>
</script>

<!-- template-library-toolbar -->
<script type="text/template" id="bantec-toolkit-TemplateLibrary_template">
    <div class="liteTemplateLibrary_template-body" id="liteTemplate-{{ template_id }}">
        <div class="liteTemplateLibrary_template-preview">
            <i class="eicon-zoom-in-bold" aria-hidden="true"></i>
        </div>
        <img class="liteTemplateLibrary_template-thumbnail" src="{{ thumbnail }}">
        <# if ( obj.isPro ) { #>
        <span class="liteTemplateLibrary_template-badge"><?php esc_html_e('Pro', 'bantec-toolkit'); ?></span>
        <# } #>
        <div class="liteTemplateLibrary_template-name">{{{ title }}}</div>
    </div>
    <div class="liteTemplateLibrary_template-footer">
        {{{ bantec.library.getModal().getTemplateActionButton( obj ) }}}

    </div>
</script>

<!-- template-library-badge -->
<script type="text/template" id="bantec_toolkit_TemplateLibrary_templates">
    <div id="liteTemplateLibrary_toolbar">		
        <div id="liteTemplateLibrary_toolbar-filter" class="liteTemplateLibrary_toolbar-filter">
            <# if (bantec.library.getTypeTags()) { var selectedTag = bantec.library.getFilter( 'tags' ); #>
                <# if ( selectedTag ) { #>
                <span class="liteTemplateLibrary_filter-btn">{{{ bantec.library.getTags()[selectedTag] }}} <i class="eicon-caret-right"></i></span>
                <# } else { #>
                <span class="liteTemplateLibrary_filter-btn"><?php esc_html_e('Filter', 'bantec-toolkit'); ?> <i class="eicon-caret-right"></i></span>
                <# } #>
                <ul id="liteTemplateLibrary_filter-tags" class="liteTemplateLibrary_filter-tags">
                    <li data-tag="">All</li>
                    <# _.each(bantec.library.getTypeTags(), function(slug) {
                        var selected = selectedTag === slug ? 'active' : '';
                        #>
                        <li data-tag="{{ slug }}" class="{{ selected }}">{{{ bantec.library.getTags()[slug] }}}</li>
                    <# } ); #>
                </ul>
            <# } #>
        </div>
        <div id="liteTemplateLibrary_toolbar-counter"></div>
        <div id="liteTemplateLibrary_toolbar-search">
            <label for="liteTemplateLibrary_search" class="elementor-screen-only"><?php esc_html_e('Search Templates:', 'bantec-toolkit'); ?></label>
            <input id="liteTemplateLibrary_search" placeholder="<?php esc_attr_e('Search', 'bantec-toolkit'); ?>">
            <i class="eicon-search"></i>
        </div>
    </div>

    <div class="liteTemplateLibrary_templates-window">
        <div id="liteTemplateLibrary_templates-list"></div>
    </div>
</script>

<!-- template-library-search -->
<script type="text/template" id="bantec-toolkit-liteTemplateLibrary_empty">
    <div class="elementor-template-library-blank-icon">
        <img src="<?php echo ELEMENTOR_ASSETS_URL . 'images/no-search-results.svg'; ?>" class="elementor-template-library-no-results" />
    </div>
    <div class="elementor-template-library-blank-title"></div>
    <div class="elementor-template-library-blank-message"></div>
</script>