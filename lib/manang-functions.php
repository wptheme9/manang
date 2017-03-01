<?php
if ( ! function_exists( 'manang_default_settings' ) ) {
    function manang_default_settings() {
        $customizer_options = array(
                    'upload_image_logo'              => '',
                    'layout_picker'                  => 'menu-left-right',
                    'social_icons_option'            =>  'social-left',
                    'extend_menu_option'             => '1',
                    'banner_picker'                  => 'banner-default',
                    'upload_banner_video'            => '',
                    'slider_image_title'             => '',
                    'slider_image_description'       => '',
                    'slider_image_text'              => '',
                    'slider_image_link'              => '',
                    'upload_banner_image'            => '',
                    'slider_video_title'             => '',
                    'slider_video_description'       => '',
                    'slider_video_text'              => '',
                    'slider_video_link'              => '',
                    'upload_banner_video_preview_image' => '',
                    'cover_banner'                   => '',
                    'banner_video_audio'             => 1,


                    'clients_layout'                 => 'no-slider',
                    'client_title'                   => '',
                    'client_slide_option'            => 'yes',
                    'client_hover_effect'            => 'hover-bw',
                    'client_count'                   => '5',
                    'client_parallax'                => '',
                    'client_bg_color'                => '',
                    'client_bg_image'                => '',

                    'footer_checkbox'                => '1',
                    'footer_layout'                  => 'footer1',
                    'pre_footer_layout'              => 'prefooter1',

                    'portfolio_title'                => '',
                    'portfolio_count'                => 4,
                    'portfolio_parallax'             => '',
                    'portfolio_bg_color'             => '',
                    'portfolio_bg_image'             => '',
                    'portfolio_sub_title'            => '',

                    'skills_title'                   => '',
                    'skills_layout'                  => 'skills-anim',
                    'skills_animation'               => 'anim',
                    'skills_post_count'              => 4,
                    'skills_parallax'                => '',
                    'skills_bg_color'                => '',
                    'skills_bg_image'                => '',

                    'cta_title'                      => '',
                    'cta_description'                => '',
                    'cta_layout'                     => 'center-button',
                    'cta_bg_color'                   => '',
                    'cta_bg_option'                  => '',
                    'cta_bg_video'                   => '',
                    'cta_video_audio'                => 1,
                    'cta_parallax'                   => '',
                    'cta_bg_color'                   => '',
                    'cta_bg_image'                   => '',
                    'cta_button_text'                => '',
                    'cta_button_link'                => '',
                    'cta_bg_img'                     => '',
                    'cta_bg_option'                  => 'image_as_bg',
                    'cta_bg_video_preview_image'     => '',


                    'blog_title'                     => '',
                    'blog_post_count'                => '6',
                    'blog_effects'                   => 'blog-layout1',
                    'blog_meta'                      => '1',
                    'blog_author_image'              => '1',
                    'blog_slider_choice'             => 'yes',
                    'latest_blog_layout'             => 'two-column',
                    'blog_parallax'                  => '',
                    'blog_bg_color'                  => '',
                    'blog_bg_image'                  => '',

                    'service_title'                  => '',
                    'service_tab_choice'             => 'yes',
                    'service_layout_option'          => '3col',
                    'service_post_count'             => '6',
                    'service_effects'                => 'mul-row-ser',
                    'service_parallax'               => '',
                    'service_bg_color'               => '',
                    'service_bg_image'               => '',
                    'callout_category'               => 'default',

                    'team_title'                     => '',
                    'team_count'                     => '4',
                    'team_layout'                    => 'team-layout1',
                    'team_parallax'                  => '',
                    'team_bg_color'                  => '',
                    'team_bg_image'                  => '',
                    'team_layout_single'             => 'with-sidebar',

                    'testimonial_title'              => '',
                    'testimonial_count'              => '4',
                    'testimonial_layout'             => 'testimonial-layout1',
                    'testimonial_item'               => 'single-item-testimonial',
                    'testimonial_parallax'           => '',
                    'testimonial_bg_color'           => '',
                    'testimonial_bg_image'           => '',

                    'portfolio_column'               => '2col',
                    'portfolio_padding'              => 'padbot',
                    'portfolio_layout'               => 'portfolio-layout1',
                    'portfolio_filter'               => 'no',

                    'product_column'                 => 'product-3col',
                    'product_title'                  => '',
                    'product_post_count'             => '6',
                    'product_parallax'               => '',
                    'product_bg_color'               => '',
                    'product_bg_image'               => '',
                    'product_effects'                => 'product-layout1',

                    'product_category_title'         => '',
                    'product_category_post_count'    => 6,
                    'product_category_bg_color'      =>'',
                    'product_category_bg_image'      => '',
                    'product_category_select'        => '',
                    'product_category_column'        => 'product-3col',
                    'product_category_parallax'      => '',
                    'product_category_effects'       => 'product-cat-layout1',

                    //Font Settings
                    'title_font_family'              => '',
                    'heading_font_family'            => '',
                    'widget_font_family'             => '',
                    'navigation_font_family'         => '',
                    'paragraph_font_family'          => '',
                    'heading_font_color'             => '',
                    'widget_font_color'              => '',
                    'navigation_font_color'          => '',
                    'paragraph_font_color'           => '',
                    'title_font_color'               => '',

                    // 'framework_sortable_controls' => '',
                    'sortable_check'                 => manang_sortable_default(),

                    'sidebar_layout'                 => 'left-sidebar',
                    'copyright_text'                 => '',
                    'developed_by_text'              => '',
                    'developed_by_link'              => '',
                    'css_change'                     => '',
                    'site_color'                     => '#1CBAC8',

                    'contact_check'                  => 1,
                    'contact_map'                    => '',
                    'contact_title'                  => '',
                    'contact_address'                => '',
                    'contact_phone'                  => '',
                    'contact_mobile'                 => '',
                    'contact_email'                  => '',
                    'contact_web'                    => '',

                    'search_show'                    => 1,
                    'newsletter_section_title'      => '',
                    'mailchimp_campaign_option'      => 'mailchimp',
                    'mailchimp_api_key'              => '',
                    'mailchimp_list_id'              => '',
                    'campaign_api_key'               => '',
                    'campaign_list_id'               => '',
                    'show_hide_fullname'             => 1,
                );
                return apply_filters( 'manang_options', $customizer_options );
    }
}

if ( ! function_exists( 'manang_options' ) ) :
    function manang_options() {
            // Options API
            return wp_parse_args(get_option( 'manang_option', array() ),manang_default_settings());
    }
endif;

if(!function_exists('manang_banner_choice')){
    function manang_banner_choice(){
        $manang_options = manang_options();
        $banner_choice =  sanitize_text_field($manang_options['banner_picker']);
        switch($banner_choice) {
            case "banner-default":
                echo manang_slider_default_query();
                break;

            case "banner-image":
                echo manang_single_image_banner();
                break;

            case "banner-video":
                echo manang_banner_video();
                break;
        }
    }
    add_action( 'manang_banner_option', 'manang_banner_choice', 10 );
}

