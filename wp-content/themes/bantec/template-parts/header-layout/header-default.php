<?php
$site_logo      = bantec_option('default_logo');

?>
 
<!-- Header Area Start -->
<div class="theme_header__area default_header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="theme_header__area-menubar">
                    <div class="theme_header__area-menubar-left">
                        <div class="theme_header__area-menubar-left-logo">
                            <?php
                            if (has_custom_logo()) {
                                the_custom_logo();
                            } else {
                                if (!empty($site_logo['url'])) { ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo esc_url($site_logo['url']); ?>" alt="<?php bloginfo('name'); ?>">
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo get_theme_file_uri(); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>">
                                    </a>
                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                    <?php if (has_nav_menu('header-menu')) : ?>
                        <div class="theme_header__area-menubar-center">
							<div class="responsive-menu"></div>
                            <div class="theme_header__area-menubar-center-menu menu-responsive">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'header-menu',
                                        'menu_id' => 'mobilemenu',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Area End -->