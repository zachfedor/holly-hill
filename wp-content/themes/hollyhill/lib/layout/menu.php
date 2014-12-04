<?php

add_filter( 'genesis_superfish_enabled', '__return_true' );

function hh_register_child_campus_nav_menu() {
    register_nav_menu('child-campus-navigation',__( 'Child Campus Navigation' ));
}
add_action( 'init', 'hh_register_child_campus_nav_menu' );

/*
 * Add classes to Genesis Navigation
 */
add_filter( 'genesis_do_nav', 'override_do_nav', 10, 3 );
function override_do_nav($nav_output, $nav, $args) {

    $args['menu_id'] = 'menu-primary-navigation';
    $args['menu_class'] = 'menu genesis-nav-menu menu-primary'; // replace what was there
    //$args['menu_class'] .= ' container'; // or append to it

    $nav = wp_nav_menu( $args );

    if ( genesis_get_option( 'nav' ) ) {
        if ( has_nav_menu( 'primary' ) ) {
            $nav = wp_nav_menu( $args );
        } elseif ( 'nav-menu' != genesis_get_option( 'nav_type', 'genesis-vestige' ) ) {
            $nav = genesis_nav( $args );
        }
    }
    $search_form = '<a class="search-toggle" href="javascript:void(0);">Search <span class="icon icon-search"></span></a>';
    $search_form .= get_search_form(false);

    return sprintf( '<div id="nav" class="nav-primary"><div class="container">%2$s%1$s%4$s%3$s</div></div>', $nav, genesis_structural_wrap( 'nav', 'open', 0 ), genesis_structural_wrap( 'nav', 'close', 0 ), $search_form );
}