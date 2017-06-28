<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Manang
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <!-- Loader -->
  <!--   <div class="loader-wrapper">
        <div class="loader">
            <div class="loader-inner"></div>
            <div class="loader-inner"></div>
            <div class="loader-inner"></div>
            <div class="loader-inner"></div>
        </div>
    </div> -->

    <!-- Header -->
    <header id="top" class="header mg-hero">

        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <div class="top-social-icon">
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <ul class="header-top-right">
                            <li class="header-address">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i><span>23 Lane NY, USA</span></p>
                            </li>
                            <li class="header-phone">
                                <p><i class="fa fa-phone-square" aria-hidden="true"></i><span>+135-20004-5689</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start of Naviation -->
        <div class="nav-wrapper header-default">
            <div class="container">
                <div class="navbar-header col-lg-2">
                  <a class="custom-logo" href="#"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt=""></a>
                </div>

                <!-- Start of Naviation -->
                <div class="meganav-wrapper col-lg-10">
                    <div class=" navbar-right">
                        <div class="menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="http://marioloncarek.com">About</a>
                                    <ul class="mega-sub-menu menu-col-4">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate</a></li>
                                          <li><a href="#">Masters</a></li>
                                          <li><a href="#">International</a></li>
                                          <li><a href="#">Online</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate research</a></li>
                                          <li><a href="#">Masters research</a></li>
                                          <li><a href="#">Funding</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>
                                <li><a href="http://marioloncarek.com">Portfolio</a>
                                    <ul class="mega-sub-menu menu-col-3">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate</a></li>
                                          <li><a href="#">Masters</a></li>
                                          <li><a href="#">International</a></li>
                                          <li><a href="#">Online</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>

                                <li><a href="http://marioloncarek.com">Clients</a>
                                    <ul class="mega-sub-menu menu-col-2">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>

                                <li><a href="#">Blog</a>
                                    <ul class="simple-dropdown">
                                      <li><a href="#">Today</a></li>
                                      <li><a href="#">Calendar</a></li>
                                      <li><a href="#">Sport</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://marioloncarek.com">About</a>
                                    <ul class="mega-sub-menu menu-col-4">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate</a></li>
                                          <li><a href="#">Masters</a></li>
                                          <li><a href="#">International</a></li>
                                          <li><a href="#">Online</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate research</a></li>
                                          <li><a href="#">Masters research</a></li>
                                          <li><a href="#">Funding</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-th" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Navigation -->

        <!-- Start of Naviation -->
        <div class="nav-wrapper header-default">
            <div class="container-fluid">
                <div class="navbar-header col-lg-2">
                  <a class="custom-logo" href="#"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt=""></a>
                </div>

                <!-- Start of Naviation -->
                <div class="meganav-wrapper col-lg-10">
                    <div class=" navbar-right">
                        <div class="menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="http://marioloncarek.com">About</a>
                                    <ul class="mega-sub-menu menu-col-4">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate</a></li>
                                          <li><a href="#">Masters</a></li>
                                          <li><a href="#">International</a></li>
                                          <li><a href="#">Online</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate research</a></li>
                                          <li><a href="#">Masters research</a></li>
                                          <li><a href="#">Funding</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>
                                <li><a href="http://marioloncarek.com">Portfolio</a>
                                    <ul class="mega-sub-menu menu-col-3">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate</a></li>
                                          <li><a href="#">Masters</a></li>
                                          <li><a href="#">International</a></li>
                                          <li><a href="#">Online</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>

                                <li><a href="http://marioloncarek.com">Clients</a>
                                    <ul class="mega-sub-menu menu-col-2">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>

                                <li><a href="#">Blog</a>
                                    <ul class="simple-dropdown">
                                      <li><a href="#">Today</a></li>
                                      <li><a href="#">Calendar</a></li>
                                      <li><a href="#">Sport</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://marioloncarek.com">About</a>
                                    <ul class="mega-sub-menu menu-col-4">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate</a></li>
                                          <li><a href="#">Masters</a></li>
                                          <li><a href="#">International</a></li>
                                          <li><a href="#">Online</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate research</a></li>
                                          <li><a href="#">Masters research</a></li>
                                          <li><a href="#">Funding</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>
                                <li class="header-icon header-search"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                <li class="header-icon header-sidebar"><a href="#"><i class="fa fa-th" aria-hidden="true"></i></a></li>
                                <li class="header-icon header-cart"><a href="#"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Navigation -->


<!-- navbar -left -->
        <!-- Start of Naviation -->
        <div class="nav-wrapper header-default">
            <div class="container">
                <!-- Start of Naviation -->

                <div class="navbar-header col-lg-2">
                  <a class="custom-logo" href="#"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt=""></a>
                </div>

                <div class="meganav-wrapper col-lg-10">
                    <div class="navbar-left">
                        <div class="menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="http://marioloncarek.com">About</a>
                                    <ul class="mega-sub-menu menu-col-4">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate</a></li>
                                          <li><a href="#">Masters</a></li>
                                          <li><a href="#">International</a></li>
                                          <li><a href="#">Online</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate research</a></li>
                                          <li><a href="#">Masters research</a></li>
                                          <li><a href="#">Funding</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>
                                <li><a href="http://marioloncarek.com">Portfolio</a>
                                    <ul class="mega-sub-menu menu-col-3">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate</a></li>
                                          <li><a href="#">Masters</a></li>
                                          <li><a href="#">International</a></li>
                                          <li><a href="#">Online</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>

                                <li><a href="http://marioloncarek.com">Clients</a>
                                    <ul class="mega-sub-menu menu-col-2">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>

                                <li><a href="#">Blog</a>
                                    <ul class="simple-dropdown">
                                      <li><a href="#">Today</a></li>
                                      <li><a href="#">Calendar</a></li>
                                      <li><a href="#">Sport</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://marioloncarek.com">About</a>
                                    <ul class="mega-sub-menu menu-col-4">
                                      <li>
                                        <ul>
                                          <li><a href="#">Lidership</a></li>
                                          <li><a href="#">History</a></li>
                                          <li><a href="#">Locations</a></li>
                                          <li><a href="#">Careers</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate</a></li>
                                          <li><a href="#">Masters</a></li>
                                          <li><a href="#">International</a></li>
                                          <li><a href="#">Online</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Undergraduate research</a></li>
                                          <li><a href="#">Masters research</a></li>
                                          <li><a href="#">Funding</a></li>
                                        </ul>
                                      </li>
                                      <li>
                                        <ul>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                          <li><a href="#">Sub something</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="navbar-right">
                        <div class="menu-widget">
                            <ul>
                                <li class="header-icon header-search"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                <li class="header-icon header-sidebar"><a href="#"><i class="fa fa-th" aria-hidden="true"></i></a></li>
                                <li class="header-icon header-cart"><a href="#"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Navigation -->



<!-- Extended header -->
        <!-- Start of Naviation -->
        <div class="nav-wrapper header-default">
            <!-- Start of Naviation -->
            <div class="header-extended">
                <div class="container">
                    <div class="col-md-3 col-sm-12">
                         <!-- Start Site Branding -->
                        <div class="navbar-header">
                          <a class="custom-logo" href="#"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="quick-contact-wrap">
                            <ul>
                                <li class="quick-phone">
                                    <div class="icon pull-left">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                    <div class="quick-desc pull-right">
                                        <h5>Helpline</h5>
                                        <span>00-0000-0000</span>
                                    </div>
                                </li>
                                <li class="quick-mail">
                                    <div class="icon pull-left">
                                       <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="quick-desc pull-right">
                                        <h5>Mail Us</h5>
                                        <span>info@codethemes.co</span>
                                    </div>
                                </li>
                                <li class="quick-office-hour">
                                    <div class="icon pull-left">
                                       <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="quick-desc pull-right">
                                        <h5>Office Hours</h5>
                                        <span>Monday - Friday 08:00 - 20:00</span>
                                    </div>
                                </li>
                                <li class="quick-address">
                                    <div class="icon pull-left">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <div class="quick-desc pull-right">
                                        <h5>Here We Are</h5>
                                        <span>Eakantakuna, lalitpur</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="meganav-wrapper">
                        <div class="navbar-left">
                            <div class="menu">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="http://marioloncarek.com">About</a>
                                        <ul class="mega-sub-menu menu-col-4">
                                          <li>
                                            <ul>
                                              <li><a href="#">Lidership</a></li>
                                              <li><a href="#">History</a></li>
                                              <li><a href="#">Locations</a></li>
                                              <li><a href="#">Careers</a></li>
                                            </ul>
                                          </li>
                                          <li>
                                            <ul>
                                              <li><a href="#">Undergraduate</a></li>
                                              <li><a href="#">Masters</a></li>
                                              <li><a href="#">International</a></li>
                                              <li><a href="#">Online</a></li>
                                            </ul>
                                          </li>
                                          <li>
                                            <ul>
                                              <li><a href="#">Undergraduate research</a></li>
                                              <li><a href="#">Masters research</a></li>
                                              <li><a href="#">Funding</a></li>
                                            </ul>
                                          </li>
                                          <li>
                                            <ul>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                            </ul>
                                          </li>
                                        </ul>
                                    </li>
                                    <li><a href="http://marioloncarek.com">Portfolio</a>
                                        <ul class="mega-sub-menu menu-col-3">
                                          <li>
                                            <ul>
                                              <li><a href="#">Lidership</a></li>
                                              <li><a href="#">History</a></li>
                                              <li><a href="#">Locations</a></li>
                                              <li><a href="#">Careers</a></li>
                                            </ul>
                                          </li>
                                          <li>
                                            <ul>
                                              <li><a href="#">Undergraduate</a></li>
                                              <li><a href="#">Masters</a></li>
                                              <li><a href="#">International</a></li>
                                              <li><a href="#">Online</a></li>
                                            </ul>
                                          </li>
                                          <li>
                                            <ul>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                            </ul>
                                          </li>
                                        </ul>
                                    </li>

                                    <li><a href="http://marioloncarek.com">Clients</a>
                                        <ul class="mega-sub-menu menu-col-2">
                                          <li>
                                            <ul>
                                              <li><a href="#">Lidership</a></li>
                                              <li><a href="#">History</a></li>
                                              <li><a href="#">Locations</a></li>
                                              <li><a href="#">Careers</a></li>
                                            </ul>
                                          </li>
                                          <li>
                                            <ul>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                            </ul>
                                          </li>
                                        </ul>
                                    </li>

                                    <li><a href="#">Blog</a>
                                        <ul class="simple-dropdown">
                                          <li><a href="#">Today</a></li>
                                          <li><a href="#">Calendar</a></li>
                                          <li><a href="#">Sport</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="http://marioloncarek.com">About</a>
                                        <ul class="mega-sub-menu menu-col-5">
                                          <li>
                                            <ul>
                                              <li><a href="#">Lidership</a></li>
                                              <li><a href="#">History</a></li>
                                              <li><a href="#">Locations</a></li>
                                              <li><a href="#">Careers</a></li>
                                            </ul>
                                          </li>
                                          <li>
                                            <ul>
                                              <li><a href="#">Undergraduate</a></li>
                                              <li><a href="#">Masters</a></li>
                                              <li><a href="#">International</a></li>
                                              <li><a href="#">Online</a></li>
                                            </ul>
                                          </li>
                                          <li>
                                            <ul>
                                              <li><a href="#">Undergraduate research</a></li>
                                              <li><a href="#">Masters research</a></li>
                                              <li><a href="#">Funding</a></li>
                                            </ul>
                                          </li>
                                          <li>
                                            <ul>
                                              <li><a href="#">Undergraduate</a></li>
                                              <li><a href="#">Masters</a></li>
                                              <li><a href="#">International</a></li>
                                              <li><a href="#">Online</a></li>
                                            </ul>
                                          </li>
                                          <li>
                                            <ul>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                              <li><a href="#">Sub something</a></li>
                                            </ul>
                                          </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="navbar-right">
                            <div class="menu-widget">
                                <ul>
                                    <li class="header-icon header-search"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li class="header-icon header-sidebar"><a href="#"><i class="fa fa-th" aria-hidden="true"></i></a></li>
                                    <li class="header-icon header-cart"><a href="#"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of header -->

        <!-- Start of header banner -->
    <div class="mg-banner-wrapper parallax">
        <div class="banner-text-wrap" data-aos="fade-up">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/header-logo.png" alt="">
            <h2>Premier <span>Digital</span> Agency</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros</p>
            <a href="#" class="btn btn-default btn-white">Start a Project</a>
            <a href="#" class="btn btn-default">Purchase Now</a>
        </div>
    </div>
    <div class="scroll-wrap">
        <div class="scroll"><span>Scroll</span></div>
    </div>
    <!-- End of header banner -->
