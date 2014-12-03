<?php

if(!class_exists('CPT')){
    include_once HOMEPAGE_SLIDER_PLUGIN_PATH .'lib/include/CPT/CPT.php';
}

if (class_exists('CPT')) {
    create_homepage_slider_cpt();
}

//global $wpdb;
//$wpdb->get_results( "UPDATE wp_posts SET post_type = 'lcm_homepage_slider' WHERE post_type = 'homepage_slider';" );
//$wpdb->get_results( "UPDATE wp_term_taxonomy SET taxonomy = 'lcm_homepage_slider_category' WHERE taxonomy = 'homepage_slider_category';" );

function create_homepage_slider_cpt(){

    //$args = array('supports'=>array('title', 'editor', 'thumbnail', 'custom-fields', 'comments'));
    $args = array(
        'supports' => array('title', 'thumbnail'),
        'has_archive' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'hierarchical' => true,
    );

    $homepage_slider = new CPT(array(
        'post_type_name' => 'hh_homepage_slider',
        'singular' => 'Homepage Slide',
        'plural' => 'Homepage Slides',
        'slug' => 'homepage-slider'
    ), $args);

    $homepage_slider->columns(array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'lcm_issue' => __('Issue'),
        'date' => __('Date')
    ));

}

add_action('init', 'homepage_slider_flush_rewrite');
function homepage_slider_flush_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}