<?php

if ( file_exists( 'cmb2/init.php' ) ) {
	require_once HOMEPAGE_SLIDER_PLUGIN_PATH . 'lib/include/CMB2/init.php';
} elseif ( file_exists( HOMEPAGE_SLIDER_PLUGIN_PATH . 'lib/include/CMB2/init.php' ) ) {
	require_once HOMEPAGE_SLIDER_PLUGIN_PATH . 'lib/include/CMB2/init.php';
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool	True if metabox should show
 */
function homepage_slider_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

add_filter('cmb2_meta_boxes', 'homepage_slider_metabox');
function homepage_slider_metabox(array $meta_boxes)
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