<?php

/** Remove default sidebar */
//remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

/** Remove secondary sidebar */
//unregister_sidebar( 'header-right' );
//unregister_sidebar( 'sidebar' );
//unregister_sidebar( 'sidebar-alt' );

/** Add custom sidebar */
/*genesis_register_sidebar(array(
	'name'=>'Alternative Sidebar',
	'id' => 'sidebar-alternative',
	'description' => 'This is an alternative sidebar',
	'before_widget' => '<div id="%1$s"><div class="widget %2$s">',
	'after_widget'  => "</div></div>\n",
	'before_title'  => '<h4><span>',
	'after_title'   => "</span></h4>\n"
));*/

//add_action( 'genesis_sidebar', 'child_do_sidebar' );
/**
 * Add a widget/sidebar area.
 *
 * @author Greg Rickaby
 * @since 1.0.0
 */
function child_do_sidebar() {
	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Alternative Sidebar' ) ) {
}}
