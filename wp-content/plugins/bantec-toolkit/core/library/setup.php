<?php
// templates
include( __DIR__ . '/templates/import.php');
include( __DIR__ . '/templates/init.php');
include( __DIR__ . '/templates/load.php');
include( __DIR__ . '/templates/api.php');

\Bantec_Toolkit\templates\Import::instance()->load();
\Bantec_Toolkit\templates\Load::instance()->load();
\Bantec_Toolkit\templates\Templates::instance()->init();

if (!defined('BANTEC_ICON_SRC')){
	define('BANTEC_ICON_SRC', plugin_dir_url( __FILE__ ) . 'templates/assets/img/icon.svg');
}


