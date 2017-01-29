<?php
/**
 * manang Theme Customizer.
 *
 * @package manang
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'manang_customize_register' ) ) :
    function manang_customize_register( $wp_customize ) {
        require( dirname(__FILE__) . "/../customizer/setting-header.php" );
        require( dirname(__FILE__) . "/../customizer/setting-front.php" );
        require( dirname(__FILE__) . "/../customizer/setting-cta.php" );
        require( dirname(__FILE__) . "/../customizer/setting-contact.php" );
    	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

        $wp_customize->add_panel(
            'theme_options',
            array(
                'title' => __( 'Theme Options','manang' ),
                'priority' => 1,
                )
            );
        /* Header section */
        $wp_customize->add_section(
            'header_options',
                array(
                    'title'    => __( 'Header Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 1,
                    )
        );

        //Banner Section
        $wp_customize->add_section(
            'banner_options',
                array(
                    'title'    => __( 'Banner Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 3,
                    )
        );

        //Latest Blog Section
        $wp_customize->add_section(
            'latest_blog_options',
                 array(
                    'title'    => __( 'Latest Blog Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 3,
                    )
        );

        //Call To Action Section
       $wp_customize->add_section(
            'cta_options',
                array(
                    'title'    => __( 'Call To Action','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 4,
                    )
        );

        //Call To Action Section
       $wp_customize->add_section(
            'social_options',
                array(
                    'title'    => __( 'Social Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 2,
                    )
        );


        //Skills Section
        $wp_customize->add_section(
            'skills_options',
                array(
                    'title'    => __( 'Stats Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 6,
                    )
        );

        //Sidebar Section
        $wp_customize->add_section(
            'sidebar_home_options',
                array(
                    'title'    => __( 'Sidebar Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 7,
                    )
        );

        //Team Section
        $wp_customize->add_section(
                'team_options',
                array(
                    'title'    => __( 'Team Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 8,
                    )
        );

        //Service Section
        $wp_customize->add_section(
                'service_options',
                array(
                    'title'    => __( 'Call Out Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 9,
                    )
        );

        //Testimonial Section
        $wp_customize->add_section(
                'testimonial_options',
                array(
                    'title'    => __( 'Testimonial Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 10,
                    )
        );

        //Client Section
        $wp_customize->add_section(
                'clients_options',
                array(
                    'title'    => __( 'Client Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 11,
                    )
        );

        //Portfolio Section
        $wp_customize->add_section(
                'portfolio_options',
                array(
                    'title'    => __( 'Portfolio Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 12,
                    )
        );

              //Footer Section
        $wp_customize->add_section(
            'footer_options',
                array(
                    'title'    => __( 'Footer Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 12,
                    )
        );

        $wp_customize->add_section(
                'contact_page',
                array(
                    'title'    => __( 'Contact Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 12,
                    )
        );

        $wp_customize->add_section(
                'mailchimp_options',
                array(
                    'title'    => __( 'Newsletter Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 12,
                    )
        );

        /* Sortable section */
        $wp_customize->add_section(
            'sortable',
                array(
                    'title'    => __( 'Sortable Options','manang' ),
                    'panel' => 'theme_options',
                    'priority' => 13,
                    )
        );

      $wp_customize->add_setting(
            'manang_option[site_color]',
             array(
                'type'          => 'option',
                'default'          => '#1CBAC8',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'manang_sanitize_text',
            ) );
        $wp_customize->add_control(new WP_Customize_Color_Control ( $wp_customize, 'site_color', array(
                'label' => __( 'Change Site Color:', 'manang' ),
                'section'     => 'colors',
                'settings'   => 'manang_option[site_color]')
            ) );

        //Latest Blog Section
        $wp_customize->add_setting('manang_option[blog_title]',
                array(
                    'type'    => 'option',
                    'sanitize_callback' => 'esc_attr',
                    'default' => ''
                    )
        );
        $wp_customize->add_control('manang_option[blog_title]',
                array(
                    'type'    => 'text',
                    'label'   => esc_html__( 'Block Title for Home Page.', 'manang' ),
                    'section' => 'latest_blog_options',
                    )
        );
         $wp_customize->add_setting('manang_option[blog_post_count]',
                array(
                    'type'    => 'option',
                    'sanitize_callback' => 'manang_sanitize_integer',
                    'default' => '6'
                    )
        );
        $wp_customize->add_control('manang_option[blog_post_count]',
                array(
                    'type'    => 'text',
                    'label'   => esc_html__( 'Number of post to be displayed in Home Page', 'manang' ),
                    'section' => 'latest_blog_options',
                    )
        );



       $wp_customize->add_setting('manang_option[blog_bg_image]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'manang_sanitize_image',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize,
            'manang_option[blog_bg_image]',
            array(
                'label'           => __( 'Background Image', 'manang' ),
                'section'         => 'latest_blog_options',
                'settings'        => 'manang_option[blog_bg_image]',
            ) )
        );


        $wp_customize->add_setting('manang_option[blog_bg_color]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'esc_attr',
                )
        );
        $wp_customize->add_control(
            new Customize_Opacity_Color_Control(
                $wp_customize,
                'manang_option[blog_bg_color]',
                array(
                    'label'    => __('Background Color','manang'),
                    'palette' => true,
                    'section'  => 'latest_blog_options'
                )
            )
        );

        $wp_customize->add_setting('manang_option[blog_parallax]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                    )
            );
        $wp_customize->add_control('manang_option[blog_parallax]',
                array(
                    'label'           => __('Parallax','manang'),
                    'section'         => 'latest_blog_options',
                    'type'            => 'checkbox',
                    'settings'        =>  'manang_option[blog_parallax]',
                    )
        );

        $wp_customize->add_setting(
                'manang_option[blog_meta]',
                array(
                    'type'    => 'option',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                    'default' => '1',
                    )
        );
        $wp_customize->add_control(
                'manang_option[blog_meta]',
                array(
                    'label'   => esc_html__( 'Show Metas', 'manang' ),
                    'type'    => 'checkbox',
                    'section' => 'latest_blog_options',
                    )
        );

        $wp_customize->add_setting(
                'manang_option[blog_author_image]',
                array(
                    'type'    => 'option',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                    'default' => '1',
                    )
        );
        $wp_customize->add_control(
                'manang_option[blog_author_image]',
                array(
                    'label'   => esc_html__( 'Show Author Image', 'manang' ),
                    'type'    => 'checkbox',
                    'section' => 'latest_blog_options',
                    )
        );

        $wp_customize->add_setting('manang_option[blog_slider_choice]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => 'yes',
                )
            );
        $wp_customize->add_control('manang_option[blog_slider_choice]',
            array(
                'label'   => __('Slide','manang'),
                'type'    => 'radio',
                'section' => 'latest_blog_options',
                'choices' => array(
                        'yes' => esc_html__('Yes','manang'),
                        'no'  =>  esc_html__('No','manang'),
                        ),
                )
            );

        $wp_customize->add_setting(
                'manang_option[latest_blog_layout]',
                array(
                    'type'    =>'option',
                    'sanitize_callback' => 'esc_attr',
                    'default' => 'two-column',
                )
        );

        $wp_customize->add_control(
                    'manang_option[latest_blog_layout]',
                    array(
                        'section' => 'latest_blog_options',
                        'label'   => esc_html__( 'Column', 'manang' ),
                        'type'    => 'radio',
                        'choices' => array(
                            'two-column'   =>  esc_html__( '2 Column', 'manang' ),
                            'three-column' => esc_html__( '3 Column', 'manang' ),
                        ),
                    )
        );


        $wp_customize->add_setting(
                'manang_option[blog_effects]',
                array(
                    'type'    => 'option',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                    'default' => 'blog-layout1',
                    )
        );
        $wp_customize->add_control(
                'manang_option[blog_effects]',
                array(
                    'label'   => esc_html__( 'Layouts/Effects', 'manang' ),
                    'type'    => 'radio',
                    'choices' => array(
                                    'blog-layout1' => esc_html__('Effect 1','manang'),
                                    'blog-layout2' => esc_html__('Effect 2','manang'),
                                    'blog-layout3' => esc_html__('Effect 3','manang'),
                                    'blog-layout4' => esc_html__('Effect 4','manang'),
                                    'blog-layout5' => esc_html__('Effect 5','manang'),
                                    'blog-layout6' => esc_html__('Effect 6','manang'),
                                    ),
                    'section'  => 'latest_blog_options',
                    )
        );


    //Footer Section
    $wp_customize->add_setting('manang_option[footer_checkbox]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => '1',
    ));
    $wp_customize->add_control('manang_option[footer_checkbox]',
            array(
                'section' => 'footer_options',
                'label'   => esc_html__('Show Pre-Footer', 'manang'),
                'type'    => 'checkbox',
    ));

    $wp_customize->add_setting(
            'manang_option[pre_footer_layout]',
            array(
                'type'    =>'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => 'prefooter1',
            )
    );
    $wp_customize->add_control(
                'manang_option[pre_footer_layout]',
                array(
                    'section'         => 'footer_options',
                    'label'           => esc_html__( 'Pre-Footer', 'manang' ),
                    'active_callback' => 'manang_pre_footer_callback',
                    'settings'        => 'manang_option[pre_footer_layout]',
                    'type'            => 'radio',
                    'choices'         => array(
                                'prefooter1' =>  esc_html__( 'Three Column', 'manang' ),
                                'prefooter2' =>  esc_html__( 'Four Column', 'manang' ),
                                'prefooter3' => esc_html__( 'Five Column', 'manang'),
                    ),

                )
    );


 $wp_customize->add_setting(
            'manang_option[footer_layout]',
            array(
                'type'    =>'option',
                 'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => 'footer1',
            )
    );

    $wp_customize->add_control(
                'manang_option[footer_layout]',
                array(
                    'section'  => 'footer_options',
                    'label'    => esc_html__( 'Footer', 'manang' ),
                    'settings' => 'manang_option[footer_layout]',
                    'type'     => 'radio',
                    'choices'  => array(
                        'footer1' =>  esc_html__( 'Only Text', 'manang' ),
                        'footer2' =>  esc_html__( 'Only Menu', 'manang' ),
                        'footer3' =>  esc_html__( 'Both Text And Menu', 'manang'),
                    ),

                )
    );

    $wp_customize->add_setting('manang_option[copyright_text]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'esc_attr',
                )
    );
    $wp_customize->add_control('manang_option[copyright_text]',
            array(
                'label'   => esc_html__( 'Footer text', 'manang' ),
                'section' => 'footer_options',
                'type'    => 'text',
            )
    );

    $wp_customize->add_setting('manang_option[developed_by_text]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'esc_attr',
                )
    );
    $wp_customize->add_control('manang_option[developed_by_text]',
            array(
                'label'   => esc_html__( 'Developed By Text', 'manang' ),
                'section' => 'footer_options',
                'type'    => 'text',
            )
    );

    $wp_customize->add_setting('manang_option[developed_by_link]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'esc_url_raw',
                )
    );
    $wp_customize->add_control('manang_option[developed_by_link]',
            array(
                'label'   => esc_html__( 'Developed By Link', 'manang' ),
                'section' => 'footer_options',
                'type'    => 'text',
            )
    );

    }
    add_action( 'customize_register', 'manang_customize_register' );
endif;

if(!function_exists('manang_customize_preview_js')):
    /**
     * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
     */
    function manang_customize_preview_js() {
    	wp_enqueue_script( 'manang_customizer', get_template_directory_uri() . '/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
    }
    add_action( 'customize_preview_init', 'manang_customize_preview_js' );
endif;

if(!function_exists('manang_callback_choice')):
    function manang_callback_choice( $control ) {
        $banner_setting = $control->manager->get_setting('manang_option[banner_picker]')->value();
        $control_id = $control->id;

        if ( $control_id == 'manang_option[slider_image_title]'  && $banner_setting == 'banner-image' ){
            return true;
        }
        if ( $control_id == 'manang_option[slider_image_description]'  && $banner_setting == 'banner-image' ){
            return true;
        }
        if ( $control_id == 'manang_option[slider_image_text]'  && $banner_setting == 'banner-image' ){
            return true;
        }
        if ( $control_id == 'manang_option[slider_image_link]'  && $banner_setting == 'banner-image' ){
            return true;
        }
        if ( $control_id == 'manang_option[upload_banner_image]'  && $banner_setting == 'banner-image' ){
            return true;
        }


        if ( $control_id == 'manang_option[slider_video_title]'  && $banner_setting == 'banner-video' ){
            return true;
        }
        if ( $control_id == 'manang_option[slider_video_description]'  && $banner_setting == 'banner-video' ){
            return true;
        }
        if ( $control_id == 'manang_option[slider_video_text]'  && $banner_setting == 'banner-video' ){
            return true;
        }
        if ( $control_id == 'manang_option[slider_video_link]'  && $banner_setting == 'banner-video' ){
            return true;
        }
        if ( $control_id == 'manang_option[upload_banner_video]'  && $banner_setting == 'banner-video' ){
            return true;
        }
        if($control_id == 'upload_banner_video_preview_image'  && $banner_setting == 'banner-video'){
            return true;
        }
        if ( $control_id == 'manang_option[upload_banner_video_url]'  && $banner_setting == 'banner-video' ){
            return true;
        }
        if ( $control_id == 'manang_option[banner_video_audio]'  && $banner_setting == 'banner-video' ){
            return true;
        }
        return false;
    }
endif;

if(!function_exists('manang_mailchimp_api_key')):
    function manang_mailchimp_api_key($control){
        $newsletter_setting = $control->manager->get_setting('manang_option[mailchimp_campaign_option]')->value();
        $control_id = $control->id;


        if ( $control_id == 'framework_mailchimp_api_key'  && $newsletter_setting == 'mailchimp' ){
            return true;
        }
         if ( $control_id == 'framework_mailchimp_list_id'  && $newsletter_setting == 'mailchimp' ){
            return true;
        }
         if ( $control_id == 'framework_campaign_api_key'  && $newsletter_setting == 'campaign' ){
            return true;
        }
         if ( $control_id == 'framework_campaign_list_id'  && $newsletter_setting == 'campaign' ){
            return true;
        }

        return false;
    }
endif;
if(!function_exists('manang_pre_footer_callback')):
    function manang_pre_footer_callback($control){
        $footer_setting = $control->manager->get_setting('manang_option[footer_checkbox]')->value();
        $control_id = $control->id;
         if ( $control_id == 'manang_option[pre_footer_layout]'  && $footer_setting == '1' ){
            return true;
        }

        return false;
    }
endif;

if(!function_exists('manang_callback_cta')):
    function manang_callback_cta($control){
        $cta_setting = $control->manager->get_setting('manang_option[cta_bg_option]')->value();
        $control_id = $control->id;
        if ( $control_id == 'manang_option[cta_bg_img]'  && $cta_setting == 'image_as_bg' ){
            return true;
        }
        if ( $control_id == 'manang_option[cta_parallax]'  && $cta_setting == 'image_as_bg' ){
            return true;
        }
        if ( $control_id == 'manang_option[cta_bg_video]'  && $cta_setting == 'video_as_bg' ){
            return true;
        }
        if ( $control_id == 'cta_bg_video_preview_image'  && $cta_setting == 'video_as_bg' ){
            return true;
        }
        if ( $control_id == 'manang_option[cta_video_audio]'  && $cta_setting == 'video_as_bg' ){
            return true;
        }
        return false;
    }
endif;

if(!function_exists('manang_service_check_callback')):
    function manang_service_check_callback($control){
        $service_setting = $control->manager->get_setting('manang_option[service_tab_choice]')->value();
        $control_id = $control->id;
        if ( $control_id == 'manang_option[service_effects]'  && $service_setting == 'no' ){
            return true;
        }
        if ( $control_id == 'manang_option[service_layout_option]'  && $service_setting == 'no' ){
            return true;
        }

        return false;
    }
endif;

if(!function_exists('manang_portfolio_check_callback')):
    function manang_portfolio_check_callback($control){
        $portfolio_setting = $control->manager->get_setting('manang_option[portfolio_filter]')->value();
        $control_id = $control->id;
        if ( $control_id == 'manang_option[portfolio_layout]'  && $portfolio_setting == 'no' ){
            return true;
        }

        return false;
    }
endif;

if(!function_exists('manang_sortables')):
    function manang_sortables(){

       $services = array();

        if( post_type_exists( 'stat' )):
            /* Skills */
            $services['stats'] = array(
                'id'       => 'stats',
                'label'    => __( 'Stats', 'manang' ),
            );
        endif;

        if( post_type_exists( 'callout' )):
            /* Services */
            $services['callout'] = array(
                'id'       => 'callout',
                'label'    => __( 'Call Out', 'manang' ),
            );
        endif;

        if(post_type_exists( 'team' )):
            /* Team */
            $services['team'] = array(
                'id'       => 'team',
                'label'    => __( 'Team', 'manang' ),
            );
        endif;

        if(post_type_exists( 'portfolio' ) ):
            /* Portfolio */
            $services['portfolio'] = array(
                'id'       => 'portfolio',
                'label'    => __( 'Portfolio', 'manang' ),
            );
        endif;
         /* Blog */
        $services['blog'] = array(
            'id'       => 'blog',
            'label'    => __( 'Blog', 'manang' ),
        );

        if(post_type_exists( 'testimonial' )):
            /* Testimonial */
            $services['testimonial'] = array(
                'id'       => 'testimonial',
                'label'    => __( 'Testimonial', 'manang' ),
            );
        endif;

        if(post_type_exists( 'client' ) ):
            /* Client */
            $services['client'] = array(
                'id'       => 'client',
                'label'    => __( 'Client', 'manang' ),
            );
        endif;

        /* Call To Action */
        $services['cta'] = array(
            'id'       => 'cta',
            'label'    => __( 'CTA', 'manang' ),
        );

         /* Home Content */
        $services['sidebar'] = array(
            'id'       => 'sidebar',
            'label'    => __( 'Home Content', 'manang' ),
        );

          /* Home Content */
        $services['newsletter'] = array(
            'id'       => 'newsletter',
            'label'    => __( 'Newsletter', 'manang' ),
        );

        if ( is_active_sidebar( 'sidebar-8' ) ) :
            $services['home-widget'] = array(
            'id'       => 'home-widget',
            'label'    => __( 'Home Widget', 'manang' ),
        );

         endif;

        if ( is_active_sidebar( 'sidebar-9' ) ) :
            $services['home-widget2'] = array(
            'id'       => 'home-widget2',
            'label'    => __( 'Home Widget 2', 'manang' ),
        );

        endif;

        return apply_filters( 'manang_sortables', $services );
    }
endif;

if(!function_exists('manang_sortable_default')):
    /**
     * Utility: Default Services to use in customizer default value
     * @return string
     */
    function manang_sortable_default(){
        $default = array();
        $services = manang_sortables();
        foreach( $services as $service ){
            $default[] = $service['id'] . ':1'; /* activate all as default. */
        }
        return apply_filters( 'manang_default_sortables', implode( ',', $default ) );
    }
endif;

if(!function_exists('manang_sanitize_sortables')):
    /**
     * Sanitize Sharing Services
     * @since 0.1.0
     */
    function manang_sanitize_sortables( $input ){

        /* Var */
        $output = array();

        /* Get valid services */
        $valid_services = manang_sortables();

        /* Make array */
        $services = explode( ',', $input );

        /* Bail. */
        if( ! $services ){
            return null;
        }

        /* Loop and verify */
        foreach( $services as $service ){

            /* Separate service and status */
            $service = explode( ':', $service );

            if( isset( $service[0] ) && isset( $service[1] ) ){
                if( array_key_exists( $service[0], $valid_services ) ){
                    $status = $service[1] ? '1' : '0';
                    $output[] = trim( $service[0] . ':' . $status );
                }
            }

        }

        return trim( esc_attr( implode( ',', $output ) ) );
    }
endif;