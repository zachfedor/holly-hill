<?php

//* Template Name: Child Campus Home

//var_dump(get_the_id());
//var_dump(get_child_campus_id());
get_campus_color_scheme(get_the_id());

// Set the page layout to full-width
add_filter( 'genesis_pre_get_option_site_layout', 'hh_child_campus_home_layout' );
function hh_child_campus_home_layout( $opt ) {
    $opt = 'full-width-content'; // You can change this to any Genesis layout
    return $opt;
}

// Remove the latest posts loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

if(is_ancestor(get_child_campus_id()) || is_page(get_child_campus_id())) {
    remove_action('genesis_after_header', 'genesis_do_nav');
    add_action('genesis_after_header', 'hh_child_campus_do_nav');
}


function hh_child_campus_do_nav123() {

    //* Do nothing if menu not supported
    if ( ! genesis_nav_menu_supported( 'primary' ) )
        //var_dump('!!! NOPE !!!');
        return;

    $class = 'menu genesis-nav-menu menu-primary';
    if ( genesis_superfish_enabled() ) {
        $class .= ' js-superfish';
    }

    genesis_nav_menu( array(
        'theme_location' => 'primary',
        'menu_class'     => $class,
    ) );

}


// Featured Area
register_new_royalslider_files(3);
add_action('genesis_after_header', 'hh_featured_area');
function hh_featured_area(){
    echo '<div class="featured-area">';
    echo get_new_royalslider(3);
    echo '</div>';
}

add_filter('new_royalslider_posts_slider_query_args', 'hh_featured_slider_query', 10, 2);
function hh_featured_slider_query($args) {
    // $args is WP_Query arguments object.
    // feel free to change them here

    if( isset($args['posts_per_page']) && (int)$args['posts_per_page'] == 11111) {
        $args['posts_per_page'] = 10; // change it back to 10
    }

    //$args['order'] = 'ASC';
    $args['orderby'] = 'menu_order';

    return $args;
}

// Intro Paragraph and Image
add_action('genesis_after_content', 'hh_homepage_intro');
function hh_homepage_intro(){

    global $hh_theme_options;
    echo '<div class="row homepage-intro">';
    echo '<div class="col-md-6 intro-content">';
    echo '<h2>'. $hh_theme_options['child_campus_homepage_intro_headline'] .'</h2>';
    echo '<div class="intro">';
    echo $hh_theme_options['child_campus_homepage_intro_content'];
    echo '</div>';
    echo '<a class="hh-btn green" href="'. $hh_theme_options['child_campus_homepage_intro_learnmore'] .'">Learn More</a>';
    echo '</div>';
    echo '<div class="col-md-6 intro-image hidden-xs">';
    $attachment_id = $hh_theme_options['child_campus_homepage_intro_image']['id'];
    //$attachment_src = wp_get_attachment_image_src($attachment_id, 'medium', false);
    if($attachment_src = wp_get_attachment_image_src($attachment_id, 'large', false)){
        echo '<img src="'. $attachment_src[0] .'" />';
    }
    echo '</div>';
    echo '</div>';
}

add_action('genesis_before_footer', 'hh_homepage_programs');
function hh_homepage_programs(){ ?>
    <div class="program-icons">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Learn More About Treatment at Our Children's Campus:</h3>
                </div>
            </div>
            <div class="row button-row">
                <div class="col-xs-12 col-sm-6 col-md-3 program-col">
                    <a href="<?php echo site_url('child-adolescent-campus/our-programs/explore-discover-connect'); ?>" class="program-btn">Explore,<br /> Discover,<br /> Connect</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 program-col">
                    <a href="<?php echo site_url('child-adolescent-campus/our-programs/family-involvement'); ?>" class="program-btn">Family<br />Involvement</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 program-col">
                    <a href="<?php echo site_url('child-adolescent-campus/our-programs/frequently-asked-questions'); ?>" class="program-btn">Frequently<br />Asked<br />Questions</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 program-col">
                    <a href="<?php echo site_url('child-adolescent-campus/about-our-childrens-campus/visiting-hours-phone-times'); ?>" class="program-btn">Visiting Hours<br />& Phone Times</a>
                </div>
            </div>
        </div>
    </div>
<?php
}

genesis();
