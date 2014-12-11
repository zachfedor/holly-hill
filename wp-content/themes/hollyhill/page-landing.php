<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */

//* Template Name: Landing Page

// Set the page layout to full-width
add_filter( 'genesis_pre_get_option_site_layout', 'hh_landing_page_layout' );
function hh_landing_page_layout( $opt ) {
    $opt = 'full-width-content'; // You can change this to any Genesis layout
    return $opt;
}

add_filter( 'body_class','hh_landing_body_class' );
function hh_landing_body_class( $classes ) {
    $classes[] = 'landing-page';
    return $classes;
}

remove_action( 'genesis_header', 'hh_header' ) ;
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

remove_action( 'genesis_footer', 'hh_footer' ) ;
add_action( 'genesis_footer', 'hh_landing_page_footer' ) ;

remove_action( 'genesis_footer', 'hh_footer_bottom' ) ;
add_action( 'genesis_footer', 'hh_landing_page_footer_bottom' ) ;

remove_action( 'genesis_after_header', 'genesis_do_nav' ) ;
add_action( 'genesis_header', 'hh_landing_page_header' ) ;
function hh_landing_page_header(){
    global $template;
    //echo $template;
    ?>
    <div class="ribbon">
        <div class="container">
            <a class="logo" href="<?php echo home_url(); ?>">
                <h1 class="site-title"><?php echo get_bloginfo('name'); ?></h1> <?php //make theme option variable ?>
                <h2 class="site-description"><?php echo get_bloginfo('description'); ?></h2> <?php //make theme option variable ?>
            </a>
            <div class="row">
                <div class="landing-tagline tagline1 col-xs-4">
                    Patient focused. <?php //make theme option variable ?>
                </div>
                <div class="landing-tagline tagline2 col-xs-4">
                    Passion driven. <?php //make theme option variable ?>
                </div>
            </div>
        </div>
    </div>
    <div class="landing-top"></div>
<?php

}

add_action( 'genesis_before_footer', 'hh_landing_page_bottom' ) ;
function hh_landing_page_bottom(){ ?>
    <div class="landing-arrow"></div>
    <div class="landing-bottom">

        <div class="container">
            <div class="row">
                <div class="button-group col-sm-3 col-sm-offset-3 child-button">
                    <h4>Children's<br />Campus</h4>
                    <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/images/landing-page-child-thumb.jpg" />
                    <a class="landing-continue" href="<?php echo site_url('child-adolescent-campus'); ?>">Continue <span class="icon"></span></a>
                </div>
                <div class="button-group col-sm-3 adult-button">
                    <h4>Adult<br />Campus</h4>
                    <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/images/landing-page-adult-thumb.jpg" />
                    <a class="landing-continue" href="<?php echo site_url('adult-campus'); ?>">Continue <span class="icon"></span></a>
                </div>
            </div>
        </div>

    </div>
<?php }

genesis();