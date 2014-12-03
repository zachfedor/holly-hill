<?php

if ( file_exists( 'cmb2/init.php' ) ) {
	require_once 'CMB2/init.php';
}

add_filter('cmb2_meta_boxes', 'hh_child_campus_color_scheme_metabox');
function hh_child_campus_color_scheme_metabox(array $meta_boxes)
{

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_hh_homepage_slider_';

    /**
     * Sample metabox to demonstrate each field type included
     */

	$meta_boxes['homepage_slider_info'] = array(
        'id' => 'homepage_slider_info',
        'title' => __('Slide Information', 'lcm'),
        'object_types' => array('hh_homepage_slider'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Content',
				'id'   => $prefix.'content',
				'type' => 'wysiwyg',
			),
			array(
				'name' => 'Caption',
				'id'   => $prefix.'caption',
				'type' => 'text',
			),
        )
    );

    return $meta_boxes;
}