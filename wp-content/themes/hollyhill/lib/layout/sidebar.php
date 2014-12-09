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

add_action('genesis_before_sidebar_widget_area', 'hh_page_children_nav');
function hh_page_children_nav()
{
    // If this is a page AND it isn't search
    if (is_page() && !is_search() ) {

            // Get the global post object
            global $post;

            // Get the post ID from the post object
            $page_id = $post->ID;

            // Get the post's ancestors (ie. parents and grandparents)
            $page_ancestors = get_post_ancestors($page_id);

            // Get the post's children
            $children = get_pages('child_of='.$page_id);



            if (count($page_ancestors) > 0) {
                $page_ancestor = reset($page_ancestors);
            } else {
                $page_ancestor = $page_id;
            }

            //var_dump(get_child_campus_id());
            //var_dump($page_ancestors);
            //var_dump($page_ancestor);
            //var_dump(count($children));

            // If the ancestor is child_campus homepage
            if($page_ancestor == get_child_campus_id()){
                $page_ancestor = $page_id;
            }


            if($page_ancestor == $page_id && count($children) > 0) {
                echo '<section class="page-navigation widget">';
                echo '<h3>' . get_the_title($page_ancestor) . '</h3>';

                $args = array(
                    'authors' => '',
                    'child_of' => $page_ancestor,
                    'date_format' => get_option('date_format'),
                    'depth' => 1,
                    'echo' => 1,
                    'exclude' => '',
                    'include' => '',
                    'link_after' => '',
                    'link_before' => '',
                    'post_type' => 'page',
                    'post_status' => 'publish',
                    'show_date' => '',
                    'sort_column' => 'menu_order, post_title',
                    'sort_order' => '',
                    'title_li' => '',
                    'walker' => ''
                );

                echo '<ul>';
                wp_list_pages($args);
                echo '</ul>';
                echo '</section>';
            }
            /**/


            ?>
    <?php
    }

}