<?php
/**
 * Manang functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Manang
 */

if ( ! function_exists( 'manang_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function manang_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'manang' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'manang', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'manang-featured-image', 640, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'manang' ),
		) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'manang_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    //team_image_size
    add_image_size( 'manang_team_basic',635,700,array( 'center', 'top' ) );
    add_image_size( 'manang_team_round',600,600,array( 'center', 'top' ) );
    add_image_size( 'manang_portfolio_800_800',800,800 );
    add_image_size( 'manang_portfolio_800_400',800,400 );
    add_image_size( 'manang_portfolio_400_800',400,800 );
}
endif;
add_action( 'after_setup_theme', 'manang_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function manang_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'manang_content_width', 640 );
}
add_action( 'after_setup_theme', 'manang_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function manang_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function manang_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'manang' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
    		'name'          => esc_html__( 'Footer Widget 1', 'manang' ),
    		'id'            => 'sidebar-2',
    		'description'   => '',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>',
    	) );
    	register_sidebar( array(
    		'name'          => esc_html__( 'Footer Widget 2', 'manang' ),
    		'id'            => 'sidebar-3',
    		'description'   => '',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>',
    	) );
    	register_sidebar( array(
    		'name'          => esc_html__( 'Footer Widget 3', 'manang' ),
    		'id'            => 'sidebar-4',
    		'description'   => '',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>',
    	) );
    	register_sidebar( array(
    		'name'          => esc_html__( 'Footer Widget 4', 'manang' ),
    		'id'            => 'sidebar-5',
    		'description'   => '',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>',
    	) );
}
add_action( 'widgets_init', 'manang_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function manang_scripts() {
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
	wp_enqueue_style( 'manang-style', get_stylesheet_uri() );
	wp_enqueue_style( 'manang-maincss', get_template_directory_uri().'/assets/css/manang.css' );
    // $styles = unserialize(base64_decode(get_post_meta($id, '_dynamic_styles', true)));
    //     if (!empty($styles)) {
    //         foreach ($styles as $style) {
    //             $css.= $style['inject'];
    //         }
    //     }
    // wp_add_inline_style('manang-maincss', $css);
    $locale = 'libraries=places';
    $key='AIzaSyC5hS1gzt5G8PySLPMnYZT37P4tbTHDCG0';
    wp_register_script('googlemaps', 'http://maps.googleapis.com/maps/api/js?' . $locale . '&key=' . $key);
    wp_enqueue_script('googlemaps');

    wp_enqueue_script('jquery' );
    wp_enqueue_script( 'manang-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'manang-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js',array(), '20170124', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js',array(), '20170124', true );
    wp_enqueue_script( 'jarallax', get_template_directory_uri() . '/assets/js/jarallax.js',array(), '20170124', true );
    wp_enqueue_script( 'countto', get_template_directory_uri() . '/assets/js/jquery.countTo.js',array(), '20170124', true );
   wp_enqueue_script( 'fullscreen', get_template_directory_uri() . '/assets/js/fullscreen.js',array(), '20170124', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js',array(), '20170124', true );
    wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/aos.js',array(), '20170302', true );
    wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/assets/js/fitvids.min.js',array(), '20170302', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js',array(), '20170302', true );
    wp_enqueue_script( 'footer-reveal', get_template_directory_uri() . '/assets/js/footer-reveal.js',array(), '20170302', true );
    wp_enqueue_script( 'jquery-ajaxchimp', get_template_directory_uri() . '/assets/js/jquery.ajaxchimp.js',array(), '20170302', true );
    wp_enqueue_script( 'jquery-magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js',array(), '20170302', true );
    wp_enqueue_script( 'jquery-nav', get_template_directory_uri() . '/assets/js/jquery.nav.js',array(), '20170302', true );
    wp_enqueue_script( 'validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js',array(), '20170302', true );
    wp_enqueue_script( 'anime-js', get_template_directory_uri() . '/assets/js/anime.min.js',array(), '20170302', true );
    wp_enqueue_script( 'codrops-hover', get_template_directory_uri() . '/assets/js/codrops-hover.js',array(), '20170302', true );
    wp_enqueue_script( 'video', get_template_directory_uri() . '/assets/js/jquery.video.js',array(), '20170302', true );
    wp_enqueue_script( 'pagescroll', get_template_directory_uri() . '/assets/js/pagescroll.js',array(), '20170302', true );
    wp_enqueue_script( 'jaudio', get_template_directory_uri() . '/assets/js/jaudio.js',array(), '20170302', true );
    wp_enqueue_script( 'simplycountdown', get_template_directory_uri() . '/assets/js/simplyCountdown.js',array(), '20170302', true );
    wp_enqueue_script( 'plax', get_template_directory_uri() . '/assets/js/plax.js',array(), '20170302', true );
    wp_enqueue_script( 'slick-animation', get_template_directory_uri() . '/assets/js/slick-animation.js',array(), '20170302', true );
    wp_enqueue_script( 'sticky-header', get_template_directory_uri() . '/assets/js/sticky-header.js',array(), '20170302', true );
    wp_enqueue_script( 'youtubepopup', get_template_directory_uri() . '/assets/js/youtubepopup.js',array(), '20170302', true );
	wp_enqueue_script( 'manang-app', get_template_directory_uri() . '/assets/js/app.js',array(), '20170124', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'manang_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require dirname(__File__) . '/customizer/manang-color-picker/manang-color-picker.php';
require( dirname(__FILE__) . "/customizer/fonts/font-customizer.php");
require( dirname(__FILE__) . "/customizer/fonts/customizer-font-controls.php");
require( dirname(__FILE__) . "/customizer/cpm-sanitization.php");
require get_template_directory() . '/customizer/customizer-custom-control.php';
require get_template_directory() . '/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/lib/manang-functions.php';
require get_template_directory() . '/lib/manang-banner.php';
require get_template_directory() . '/lib/manang-cta-function.php';
require get_template_directory() . '/lib/manang-features.php';
require get_template_directory() . '/lib/manang-portfolio.php';
require get_template_directory() . '/lib/manang-counter.php';
require get_template_directory() . '/lib/manang-team.php';
require get_template_directory() . '/lib/manang-clients.php';
require get_template_directory() . '/lib/manang-blog.php';
require get_template_directory() . '/lib/manang-testimonial.php';
require get_template_directory() . '/lib/manang-nav-walker.php';
require get_template_directory() . '/vc-elements/feature.php';
require get_template_directory() . '/vc-elements/cta.php';
require get_template_directory() . '/vc-elements/testimonial.php';
require get_template_directory() . '/vc-elements/team.php';
require get_template_directory() . '/vc-elements/fancybox.php';
require get_template_directory() . '/vc-elements/pricing.php';
require get_template_directory() . '/vc-elements/fact-counter.php';
require get_template_directory() . '/vc-elements/section-title.php';
require get_template_directory() . '/vc-elements/clients.php';
require get_template_directory() . '/vc-elements/latest-post.php';
require get_template_directory() . '/vc-elements/mg-event-timeline.php';
require get_template_directory() . '/vc-elements/mg-events.php';
require get_template_directory() . '/vc-elements/mg-pricing-lists.php';
require get_template_directory() . '/vc-elements/mg-gmaps.php';
require get_template_directory() . '/vc-elements/mg-portfolio.php';
require get_template_directory() . '/vc-elements/mg-social.php';
require get_template_directory() . '/vc-elements/mg-audioplayer.php';
require get_template_directory() . '/vc-elements/mg-instagram.php';
require get_template_directory() . '/vc-elements/mg-blockquote.php';
require get_template_directory() . '/vc-elements/mg-divider.php';

if ( is_admin() ) {
    require get_template_directory() . '/admin/setting-menu.php';
    new Test_Multiple_Forms_Options();
}
