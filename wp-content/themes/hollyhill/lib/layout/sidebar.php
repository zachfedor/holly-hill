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

add_action('genesis_before_sidebar_widget_area', 'hh_sidebar_menu_subnav');
function hh_sidebar_menu_subnav(){

    // Get the global post object
    global $post;

    // Get the post ID from the post object
    $page_id = $post->ID;

    // The default menu is the adult campus
    $menu = 'Adult Campus Navigation';

    $menu_root_id = null;

    // if the page's color scheme is set to child campus
    if(get_campus_color_scheme($page_id) == 'child-campus'){
        $menu = 'Child Campus Navigation';
    }

    $args = array(
        'order'                  => 'ASC',
        'orderby'                => 'menu_order',
        'post_type'              => 'nav_menu_item',
        'post_status'            => 'publish',
        'output'                 => ARRAY_A,
        'output_key'             => 'menu_order',
        'nopaging'               => true,
        'update_post_term_cache' => false
    );
    $items = wp_get_nav_menu_items( $menu, $args );

    // Get the post's ancestors (ie. parents and grandparents)
    $page_ancestors = get_post_ancestors($page_id);

    // If the page has parents
    if (count($page_ancestors) > 0) {
        // Set the page ancestor to the deepest descendent
        $page_ancestor = reset($page_ancestors);
    } else {
        // The page doesn't have ancestor's (ie. root level or child homepage)
        $page_ancestor = $page_id;
    }

    // Loop through the menu items
    foreach($items as $item) {

        if($item->object_id == $page_ancestor){
            // If the menu_item is for the ancestor page
            // set the menu_root_id to the menu_item's ID
            $menu_root_id = $item->ID;
        }

        // If the page_ancestor is a child of children's campus homepage
        if($page_ancestor == get_child_campus_id()){
            // Set the page ancestor to the current page
            $page_ancestor = $page_id;

            // set the menu_root_id to the menu_item's ID
            $menu_root_id = $item->ID;
        }
    }

    // Get the ancestor page's children pages
    $children = get_pages('child_of='.$page_ancestor);

    // If the ancestor page has children
    if(count($children) > 0) {
        echo '<section class="page-navigation widget">';
        echo '<h3>' . get_the_title($page_ancestor) . '</h3>';
        echo '<ul>';
        foreach($items as $item){
            if($item->menu_item_parent == $menu_root_id){
                echo '<li><a href="'. $item->url .'">'. $item->title .'</a></li>';
            }
        }
        echo '</ul>';
        echo '</section>';
    }

}