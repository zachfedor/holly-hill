<?php

function get_child_campus_id()
{
    global $hh_theme_options;
    $child_campus_id = intval($hh_theme_options['child_campus_homepage_id']);

    return $child_campus_id;
}

function get_campus_color_scheme($post_id){

    if(is_ancestor(get_child_campus_id()) || is_page(get_child_campus_id())){
        update_post_meta($post_id, '_hh_color_scheme', 'child-campus');
    } else{
        update_post_meta($post_id, '_hh_color_scheme', 'adult-campus');
    }

    $color_scheme = get_post_meta($post_id, '_hh_color_scheme', true);
    return $color_scheme;

}

add_filter( 'body_class','hh_color_scheme_class' );
function hh_color_scheme_class( $classes ) {
    global $post;
    //var_dump(is_search());
    if(!is_search()) {
        $classes[] = get_post_meta($post->ID, '_hh_color_scheme', true);
    }
    return $classes;
}