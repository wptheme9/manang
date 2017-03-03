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
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader-inner"></div>
            <div class="loader-inner"></div>
            <div class="loader-inner"></div>
            <div class="loader-inner"></div>
        </div>
    </div>

    <!-- Header -->
    <header id="top" class="header mg-hero header-transparent">

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
        <div class="nav-wrapper navbar-transparent">
            <div class="container">
                <nav id="primary-nav" class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="custom-logo" href="#"><img src="assets/img/logo.png" alt=""></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#service">Services</a></li>
                            <li><a href="#fact">Fun Facts</a></li>
                            <li><a href="#portfolio">Portfolio</a></li>
                            <li><a href="#team">Team</a></li>
                            <li><a href="#testimonial">Testimonials</a></li>
                            <li><a href="#pricing">Pricing</a></li>
                            <li><a href="#blog">Blog</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div><!-- End navbar-collapse -->
                </nav>
            </div>
        </div>
        <!-- End of Navigation -->

        <!-- Start of header banner -->
        <div class="mg-banner-wrapper parallax">
            <div class="banner-text-wrap" data-aos="fade-up">
                <img src="assets/img/header-logo.png" alt="">
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

    </header>
    <!-- End of header -->