<?php

/************************************************************
 * Change the location of the stylesheet reference
 ************************************************************/
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'genesis_meta', 'child_stylesheet_cdn' );
function child_stylesheet_cdn() {
	//echo '<link rel="stylesheet" href="'. get_bloginfo('stylesheet_directory') .'/assets/css/theme.min.css" type="text/css" media="screen" />'."\n";
	echo '<link rel="stylesheet" href="'. get_bloginfo('stylesheet_directory') .'/assets/css/theme.css" type="text/css" media="screen" />'."\n";
}


/************************************************************
 * Cache bust the style.css reference
 ************************************************************/
add_filter( 'stylesheet_uri', 'child_stylesheet_uri' );
function child_stylesheet_uri( $stylesheet_uri ) {
    return add_query_arg( 'v', filemtime( get_stylesheet_directory() . '/style.css' ), $stylesheet_uri ); 
}


/************************************************************
 * Enque Custom Scripts
 ************************************************************/
//add_action( 'wp_enqueue_scripts', 'minified_enqueue_scripts', 99);
function minified_enqueue_scripts(){
	wp_enqueue_style('bootstrap-css', get_bloginfo('stylesheet_directory') . '/assets/css/bootstrap.min.css');

	//wp_enqueue_script('js-plugins', get_bloginfo('stylesheet_directory') . '/assets/js/includes/plugins.js', array('jquery'), '1', true);
	wp_enqueue_script('bootstrap-js', get_bloginfo('stylesheet_directory') . '/assets/js/bootstrap.min.js', array('jquery'), '1', true);
	wp_enqueue_script('main-js', get_bloginfo('stylesheet_directory') . '/assets/js/javascript.min.js', array('jquery'), '1', true);

	// Add CSS3 psuedo selectors to IE 6-8
	if(preg_match('/(?i)msie [6-8]/',$_SERVER['HTTP_USER_AGENT']))
	{
		wp_enqueue_script('selectivizr-js', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/selectivizr-min.js', array( ), '', true);
	    //exit;
	}
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts', 99);
function enqueue_scripts(){
    wp_enqueue_style('bootstrap-css', get_bloginfo('stylesheet_directory') . '/assets/css/bootstrap.css');
    wp_enqueue_style('slicknav-css', get_bloginfo('stylesheet_directory') . '/assets/css/slicknav.css');

    //wp_enqueue_script('js-plugins', get_bloginfo('stylesheet_directory') . '/assets/js/includes/plugins.js', array('jquery'), '1', true);
    //wp_enqueue_script('bootstrap-js', get_bloginfo('stylesheet_directory') . '/assets/js/bootstrap.js', array('jquery'), '1', true);
    wp_enqueue_script('plugins-js', get_bloginfo('stylesheet_directory') . '/assets/js/plugins.min.js', array('jquery'), '1', true);
    wp_enqueue_script('main-js', get_bloginfo('stylesheet_directory') . '/assets/js/javascript.js', array('jquery'), '1', true);

    // Add CSS3 psuedo selectors to IE 6-8
    if(preg_match('/(?i)msie [6-8]/',$_SERVER['HTTP_USER_AGENT']))
    {
        wp_enqueue_script('selectivizr-js', get_bloginfo('stylesheet_directory') . '/assets/js/plugins/selectivizr-min.js', array( ), '', true);
        //exit;
    }
}