<?php 

function bantec_toolkit_widgets_assets() {
    
/* Widget Style */
wp_register_style( 'bantec-swiper-style', BANTEC_ASSETS . 'elementor-addons/assets/css/swiper-bundle.min.css');
wp_register_style( 'bantec-magnific-style', BANTEC_ASSETS . 'elementor-addons/widgets/video/css/magnific-popup.css');

/* Widget Script */

wp_register_script( 'bantec-skills-script', BANTEC_ASSETS . 'elementor-addons/widgets/skills/js/progressbar.min.js');
wp_register_script( 'bantec-magnific-script', BANTEC_ASSETS . 'elementor-addons/widgets/video/js/jquery.magnific-popup.min.js');
wp_register_script( 'bantec-swiper-script', BANTEC_ASSETS . 'elementor-addons/assets/js/swiper-bundle.min.js');


}

add_action( 'wp_enqueue_scripts', 'bantec_toolkit_widgets_assets' );