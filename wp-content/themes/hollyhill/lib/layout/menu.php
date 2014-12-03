<?php

//remove_action( 'genesis_after_header', 'genesis_do_nav' );
//add_action( 'genesis_after_header', 'jst_primary_navigation', 11 );
function jst_primary_navigation(){
	wp_nav_menu( array(
		'menu'              => 'primary',
		'theme_location'    => 'primary',
		'depth'             => 2,
		'container'         => 'div',
		'container_class'   => 'collapse navbar-collapse navbar-inverse container-fluid',
		'container_id'      => 'bs-example-navbar-collapse-1',
		'menu_class'        => 'nav navbar-nav container',
		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		'walker'            => new wp_bootstrap_navwalker())
	);
}

/*
 * Add classes to Genesis Navigation
 * Tested with Genesis 1.9 (Beta)
 * 29.12.2012
 */
add_filter( 'genesis_do_nav', 'override_do_nav', 10, 3 );
function override_do_nav($nav_output, $nav, $args) {

    $args['menu_id'] = 'menu-primary-navigation';
    $args['menu_class'] = 'menu genesis-nav-menu menu-primary'; // replace what was there
    $args['menu_class'] .= ' container'; // or append to it

    $nav = wp_nav_menu( $args );

    if ( genesis_get_option( 'nav' ) ) {
        if ( has_nav_menu( 'primary' ) ) {
            $nav = wp_nav_menu( $args );
        } elseif ( 'nav-menu' != genesis_get_option( 'nav_type', 'genesis-vestige' ) ) {
            $nav = genesis_nav( $args );
        }
    }

    return sprintf( '<div id="nav" class="nav-primary">%2$s%1$s%3$s</div>', $nav, genesis_structural_wrap( 'nav', 'open', 0 ), genesis_structural_wrap( 'nav', 'close', 0 ) );
}