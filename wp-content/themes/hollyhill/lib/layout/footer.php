<?php

/** Add footer widgets */
//add_theme_support( 'genesis-footer-widgets', 3 );

/** Remove footer widgets */
//remove_theme_support( 'genesis-footer-widgets', 3 );

/** Remove Footer & Wrap */
//remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
//remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 ) ;

add_action( 'genesis_footer', 'hh_pre_footer' ) ;
function hh_pre_footer(){ ?>
    <div class="pre-footer fluid-container">
        <div class="contact-us row">
            <div class="container">
                <div class="email-us col-sm-5">EMAIL US</div>
                <div class="get-directions col-sm-7">GET DIRECTIONS</div>
            </div>
        </div>
        <div class="get-started  row">
            <div class="container">
                <div class="col-sm-8 col-md-9"><h3>Looking for information for yourself or a family member?</h3></div>
                <div class="col-sm-4 col-md-3 cta-button"><a href="#" class="hh-btn">Get&nbsp;Started</a></div>
            </div>
        </div>
    </div>
<?php }

add_action( 'genesis_footer', 'hh_footer' ) ;
function hh_footer(){ ?>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-logo col-sm-2"></div>
                <div class="footer-navigation pull-left">
                    <?php wp_nav_menu( array('menu' => 'footer-navigation') ); ?>
                </div>

                <div class="logo-action-alliance">
                    <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/images/logo-action-alliance.png" />
                </div>
                <div class="logo-gold-commission">
                    <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/images/logo-gold-commission.png" />
                </div>
            </div>
        </div>
    </div>
<?php }

add_action( 'genesis_footer', 'hh_footer_bottom' ) ;
function hh_footer_bottom(){ ?>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="phone">1.800.447.1800</div>
                    <div class="copyright">© 2014 Holly Hill Hospital All Rights Reserved.</div>
                </div>
                <div class="col-sm-6">
                    <div class="campus col-sm-6">
                        Adult Campus<br />
                        919.250.7000<br />
                        3019 Falstaff Road<br />
                        Raleigh, NC 27610
                    </div>
                    <div class="campus col-sm-6">
                        Childern’s Campus<br />
                        919.250.7000<br />
                        201 Michael J Smith Lane<br />
                        Raleigh, NC 27610
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }


function hh_landing_page_footer(){ ?>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-logo col-sm-2"></div>
                <div class="footer-navigation pull-left col-sm-5">
                    <div class="campus col-sm-6">
                        Adult Campus<br />
                        919.250.7000<br />
                        3019 Falstaff Road<br />
                        Raleigh, NC 27610
                    </div>
                    <div class="campus col-sm-6">
                        Childern’s Campus<br />
                        919.250.7000<br />
                        201 Michael J Smith Lane<br />
                        Raleigh, NC 27610
                    </div>
                </div>

                <div class="logo-action-alliance">
                    <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/images/logo-action-alliance.png" />
                </div>
                <div class="logo-gold-commission">
                    <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/images/logo-gold-commission.png" />
                </div>
            </div>
        </div>
    </div>
<?php }

function hh_landing_page_footer_bottom(){ ?>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="copyright">© 2014 Holly Hill Hospital All Rights Reserved.</div>
                </div>
                <div class="col-sm-6">
                    <div class="phone">1.800.447.1800</div>
                </div>
            </div>
        </div>
    </div>
<?php }