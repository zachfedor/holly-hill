<?php

get_campus_color_scheme(get_the_id());

if(is_ancestor(get_child_campus_id()) || is_page(get_child_campus_id())) {
    remove_action('genesis_after_header', 'genesis_do_nav');
    add_action('genesis_after_header', 'hh_child_campus_do_nav');
}

add_action('genesis_after_header', 'hh_page_feaured_image');
function hh_page_feaured_image(){

    // TODO: Create a theme option for a default image fallback

    $attachment_id = get_post_thumbnail_id();
    $attachment_obj = wp_get_attachment_image_src($attachment_id, 'full');
    $attachment_src = $attachment_obj[0];

    echo '<div class="featured-image-banner">';
    echo '<div class="container" style="background-image:url('. $attachment_src .');"></div>';
    echo '</div>';

}

genesis();