<?php

require_once(CHILD_DIR.'/lib/admin/plugin_activation.php');
require_once(CHILD_DIR.'/lib/admin/theme_options.php');
require_once(CHILD_DIR.'/lib/admin/theme_metaboxes.php');
//require_once(CHILD_DIR.'/lib/admin/redux-framework/redux-framework.php');
//require_once(CHILD_DIR.'/lib/admin/redux-framework/sample/sample-config.php');

	// TGM Plugin Activation Class
add_action( 'admin_print_styles', 'jst_admin_enqueue_scripts', 99);
function jst_admin_enqueue_scripts(){
	wp_enqueue_style('admincss', get_bloginfo('stylesheet_directory') . '/lib/admin/admin_style.css');
}

	
