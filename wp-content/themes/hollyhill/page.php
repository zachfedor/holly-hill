<?php

//var_dump(get_the_id());
var_dump(get_child_campus_id());
get_campus_color_scheme(get_the_id());

if(is_ancestor(get_child_campus_id()) || is_page(get_child_campus_id())) {
    var_dump('is_child');
    remove_action('genesis_after_header', 'genesis_do_nav');
    add_action('genesis_after_header', 'hh_child_campus_do_nav');
}

genesis();