<?php

#http://notes.catherinemobrien.com/bootstrapping-genesis/
#http://www.rfmeier.net/using-genesis_markup-with-html5-in-genesis-2-0/


add_filter( 'genesis_attr_site-header', 'jst_append_structural_class', 10, 2);
add_filter( 'genesis_attr_site-inner', 'jst_append_structural_class', 10, 2);
add_filter( 'genesis_attr_site-footer', 'jst_append_structural_class', 10, 2);

function jst_append_structural_class( $attributes, $context ){

	 // default classes to add
    $classes_to_add = array(
            //'site-header'       => 'container',
            'site-inner'        => 'container',
            'site-footer'       => 'container',
            'content-sidebar-wrap'      => 'row',
            'content'           => 'span9',
            'sidebar-primary'   => 'span3',
            'archive-pagination'=> 'clearfix',
    );
    $class = isset( $classes_to_add[ $context ] ) ? $classes_to_add[ $context ] : '';
    $attributes['class'] .= ' ' . sanitize_html_class( $class );
    return $attributes;
}

/*
// Bootstrappin
add_filter( 'genesis_attr_site-inner', 'msdlab_bootstrap_site_inner', 10);
add_filter( 'genesis_attr_breadcrumb', 'msdlab_bootstrap_breadcrumb', 10);
add_filter( 'genesis_attr_content-sidebar-wrap', 'msdlab_bootstrap_content_sidebar_wrap', 10);
add_filter( 'genesis_attr_content', 'msdlab_bootstrap_content', 10);
add_filter( 'genesis_attr_sidebar-primary', 'msdlab_bootstrap_sidebar', 10);

// Bootstrappin
function msdlab_bootstrap_site_inner( $attributes ){
    $attributes['class'] .= ' span12';
    return $attributes;
}

function msdlab_bootstrap_breadcrumb( $attributes ){
    $attributes['class'] .= ' row';
    return $attributes;
}

function msdlab_bootstrap_content_sidebar_wrap( $attributes ){
    $attributes['class'] .= ' row';
    return $attributes;
}

function msdlab_bootstrap_content( $attributes ){
    $layout = genesis_site_layout();
    switch($layout){
        case 'content-sidebar':
        case 'sidebar-content':
            if(is_page()){
                $attributes['class'] .= ' col-md-7 col-sm-12';
            } else {
                $attributes['class'] .= ' col-md-9 col-sm-12';
            }
            break;
        case 'content-sidebar-sidebar':
        case 'sidebar-sidebar-content':
        case 'sidebar-content-sidebar':
            break;
        case 'full-width-content':
            $attributes['class'] .= ' col-md-12';
            break;
    }
    return $attributes;
}

function msdlab_bootstrap_sidebar( $attributes ){
    $layout = genesis_site_layout();
    switch($layout){
        case 'content-sidebar':
        case 'sidebar-content':
            if(is_page()){
                $attributes['class'] .= ' col-md-4 col-md-offset-1 hidden-sm hidden-xs';
            } else {
                $attributes['class'] .= ' col-md-3 hidden-sm hidden-xs';
            }
            break;
        case 'content-sidebar-sidebar':
        case 'sidebar-sidebar-content':
        case 'sidebar-content-sidebar':
            break;
        case 'full-width-content':
            $attributes['class'] .= ' hidden';
            break;
    }
    return $attributes;
}
*/
