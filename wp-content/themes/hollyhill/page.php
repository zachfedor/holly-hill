<?php

get_campus_color_scheme(get_the_id());

if(is_ancestor(get_child_campus_id()) || is_page(get_child_campus_id())) {
    remove_action('genesis_after_header', 'genesis_do_nav');
    add_action('genesis_after_header', 'hh_child_campus_do_nav');
}

genesis();