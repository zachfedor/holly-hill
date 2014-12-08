<?php

/** Remove Header & Wrap */
//remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
//remove_action( 'genesis_header', 'genesis_header_markup_close', 15 ) ;

/** Remove Title & Description */
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

unregister_sidebar( 'header-right' );

add_action( 'genesis_header', 'hh_header' ) ;
function hh_header(){
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
                <div class="phone col-xs-2 col-sm-3">
                    1.800.447.1800 <?php //make theme option variable ?>
                </div>
                <div class="call-us col-xs-3 col-sm-5">
                    Call us for a No-Cost Assessment <?php //make theme option variable ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="tagline1 tagline col-sm-4">
            <?php

            if(get_campus_color_scheme(get_the_ID()) == 'adult-campus' || is_front_page()){
                $tagline1 = 'Patient focused.';
            } else {
                $tagline1 = 'Growing Together..';
            }

            if(get_campus_color_scheme(get_the_ID()) == 'adult-campus' || is_front_page()){
                $tagline2 = 'Passion driven.';
            } else {
                $tagline2 = '..For The Future';
            }

            ?>
            <strong><em><?php echo $tagline1; ?></em></strong> <?php //make theme option variable ?>
        </div>
        <div class="tagline2 tagline col-sm-4">
            <strong><em><?php echo $tagline2; ?></strong></em> <?php //make theme option variable ?>
        </div>
    </div>
<?php

}