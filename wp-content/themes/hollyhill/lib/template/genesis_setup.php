<?php

add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

add_action( 'genesis_setup', 'jst_genesis_setup', 15 );
function jst_genesis_setup() {

	#http://thomasgriffinmedia.com/blog/2012/11/remove-metaboxes-genesis-theme-seo-settings-pages/
    add_action( 'genesis_admin_before_metaboxes', 'jst_remove_genesis_theme_metaboxes' );
	add_action('genesis_setup', 'jst_genesis_unregister_layouts', 15);
}

/**
 * Remove selected Genesis metaboxes from the Theme Settings and SEO Settings pages. 
 * Just comment out the metaboxes that you want to keep active.
 *
 * @param string $hook The unique pagehook for the Genesis settings page
 */
function jst_remove_genesis_theme_metaboxes( $hook ) {
    /** Theme Settings metaboxes */
    //remove_meta_box( 'genesis-theme-settings-version',  $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-feeds',    $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-layout',   $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-header',   $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-nav',      $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-breadcrumb', $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-comments', $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-posts',    $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-blogpage', $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-scripts',  $hook, 'main' );

    /** SEO Settings metaboxes */
    //remove_meta_box( 'genesis-seo-settings-doctitle',   $hook, 'main' );
    //remove_meta_box( 'genesis-seo-settings-homepage',   $hook, 'main' );
    //remove_meta_box( 'genesis-seo-settings-dochead',    $hook, 'main' );
    //remove_meta_box( 'genesis-seo-settings-robots',     $hook, 'main' );
    //remove_meta_box( 'genesis-seo-settings-archives',   $hook, 'main' );
}

/************************************************************
 * Unregister site layouts
 ************************************************************/
function jst_genesis_unregister_layouts(){
	//genesis_unregister_layout( 'sidebar-content' );
	//genesis_unregister_layout( 'full-width' );
	//genesis_unregister_layout( 'content-sidebar-sidebar' );
	//genesis_unregister_layout( 'sidebar-sidebar-content' );
	//genesis_unregister_layout( 'sidebar-content-sidebar' );
}
