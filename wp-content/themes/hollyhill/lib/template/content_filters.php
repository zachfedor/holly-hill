<?php

/************************************************************
 * Allow Shortcodes in Text Widgets
 ************************************************************/
add_filter('widget_text', 'do_shortcode');

/************************************************************
 * Remove Empty p tags for Shortcodes 
 ************************************************************/
add_filter('the_content', 'shortcode_empty_paragraph_fix');
function shortcode_empty_paragraph_fix($content) {   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);

	return $content;
}
