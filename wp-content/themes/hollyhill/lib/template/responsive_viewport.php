<?php

/************************************************************
 * Add Viewport meta tag for mobile browsers
 ************************************************************/
add_action( 'genesis_meta', 'child_viewport_meta_tag' );
function child_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />';
}


