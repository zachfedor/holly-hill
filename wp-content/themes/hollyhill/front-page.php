<?php

// This is the front page

// Set the page layout to full-width
add_filter( 'genesis_pre_get_option_site_layout', 'hh_front_page_layout' );
function hh_front_page_layout( $opt ) {
    $opt = 'full-width-content'; // You can change this to any Genesis layout
    return $opt;
}




// Remove the latest posts loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Featured Area
register_new_royalslider_files(2);
add_action('genesis_after_header', 'hh_featured_area');
function hh_featured_area(){
    echo '<div class="featured-area">';
    echo get_new_royalslider(2);
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
    echo '<div class="col-sm-6 intro-content">';
    echo '<h2><em>'. $hh_theme_options['homepage_intro_headline'] .'</em></h2>';
    echo '<div class="intro">';
    echo $hh_theme_options['homepage_intro_content'];
    echo '</div>';
    echo '<a class="hh-btn green" href="'. $hh_theme_options['homepage_intro_content'] .'">Learn More</a>';
    echo '</div>';
    echo '<div class="col-sm-6 intro-image hidden-sm hidden-xs">';
    $attachment_id = $hh_theme_options['homepage_intro_image']['id'];
    //$attachment_src = wp_get_attachment_image_src($attachment_id, 'medium', false);
    if($attachment_src = wp_get_attachment_image_src($attachment_id, 'large', false)){
        echo '<img src="'. $attachment_src[0] .'" />';
    }
    echo '</div>';
    echo '</div>';
}

add_action('genesis_before_footer', 'hh_homepage_programs');
function hh_homepage_programs(){
    ?>
    <div class="program-icons">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <h3>We Have Adult Treatment Programs For:</h3>
                </div>
            </div>
            <div class="row button-row">
                <div class="col-xs-12 col-sm-6 col-md-2 program-col">
                    <a href="<?php echo site_url('our-programs/mental-health'); ?>" class="program-btn">Mental Health</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 program-col">
                    <a href="<?php echo site_url('our-programs/geriatrics'); ?>" class="program-btn">Geriatrics</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 program-col">
                    <a href="<?php echo site_url('our-programs/substance-abuse'); ?>" class="program-btn">Substance Abuse</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 program-col">
                    <a href="<?php echo site_url('adult-outpatient-php'); ?>" class="program-btn">Outpatient (PHP)</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 program-col">
                    <a href="<?php echo site_url('our-programs'); ?>" class="program-btn">All Programs</a>
                </div>
            </div>
        </div>
    </div>
<?php
}


genesis();
