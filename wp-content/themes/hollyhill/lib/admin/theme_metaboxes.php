<?php

if ( file_exists( 'cmb2/init.php' ) ) {
	require_once 'CMB2/init.php';
}

add_filter('cmb2_meta_boxes', 'hh_homepage_slider_metabox');
function hh_homepage_slider_metabox(array $meta_boxes)
{

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_hh_';

    /**
     * Sample metabox to demonstrate each field type included
     */

	$meta_boxes['homepage_slider_info'] = array(
        'id' => 'homepage_slider_info',
        'title' => __('Slide Information', 'hh'),
        'object_types' => array('hh_homepage_slider'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Content',
				'id'   => $prefix.'homepage_slider_content',
				'type' => 'wysiwyg',
			),
			array(
				'name' => 'Caption',
				'id'   => $prefix.'homepage_slider_caption',
				'type' => 'text',
			),
        )
    );

    $meta_boxes['campus_color_scheme'] = array(
        'id' => 'campus_color_scheme',
        'title' => __('Campus Color Scheme', 'hh'),
        'object_types' => array('page', 'post'), // Post type
        'context' => 'side',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Color Scheme',
                'id'   => $prefix.'color_scheme',
                'type' => 'select',
                'options' => array(
                    'adult-campus' => 'Adult Campus',
                    'child-campus' => 'Child Campus'
                ),
            ),
        )
    );

    return $meta_boxes;
}