<?php
/*
Plugin Name: HH Homepage Slider
Plugin URI: http://towermarketing.net/
Description: HH homepage slider plugin
Author: John Harris
Version: 0.1
Author URI: http://towermarketing.net/
*/

define("HOMEPAGE_SLIDER_PLUGIN_PATH", plugin_dir_path(__FILE__));

include HOMEPAGE_SLIDER_PLUGIN_PATH . 'lib/functions/create_homepage_slide_cpt.php';
include HOMEPAGE_SLIDER_PLUGIN_PATH . 'lib/functions/add_homepage_slide_metaboxes.php';

//include RECIPE_PLUGIN_PATH . 'lib/shortcodes/homepage_slider_list.php';