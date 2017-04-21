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

                    'cta_bg_color_secondary'        => '',
                    'cta_bg_image_secondary'        => '',
                    'cta_parallax_secondary'        => '',
                    'cta_bg_video_secondary'        => '',
                    'cta_video_audio_secondary'     => '',
                    'cta_bg_video_secondary_preview_image_secondary'    => '',
                    'cta_title_secondary'           => '',
                    'cta_description_secondary'     => '',
                    'cta_button_text_secondary'     => '',
                    'cta_button_link_secondary'     => '',


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

                    'feature_title'                  => '',
                    'feature_description'             => '',
                    'feature_post_count'             => '6',
                    'feature_category'               => '',
                    'feature_bg_image'          => '',
                    'feature_bg_color'                => '',
                    'feature_parallax'               => '',
                    'feature_effects'               => 'feature1',

                    'team_title'                     => '',
                    'team_count'                     => '4',
                    'team_layout'                    => 'team-layout1',
                    'team_parallax'                  => '',
                    'team_bg_color'                  => '',
                    'team_bg_image'                  => '',
                    'team_layout_single'             => 'with-sidebar',

                    'testimonial_title'              => '',
                    'testimonial_description'        => '',
                    'testimonial_count'              => '',
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

// if(!function_exists('manang_get_categories_select')):
//     function manang_get_team_categories_select() {
//         $manang_cat = get_terms( array(
//             'taxonomy' => 'team_category',
//             'hide_empty' => false,
//         ) );
//         $results="";
//         $results[''] = "Select category";
//         if(! empty( $manang_cat ) && ! is_wp_error( $manang_cat ) ):
//             $count = count($manang_cat);
//              for ($i=0; $i < $count; $i++) {
//                $results[$manang_cat[$i]->slug] = $manang_cat[$i]->name;
//              }
//          endif;
//         return $results;
//     }
// endif;

if ( ! function_exists( 'manang_get_excerpt' ) ) :
    function manang_get_excerpt( $post_id, $count ) {
        $content_post = get_post($post_id);
        $excerpt = $content_post->post_content;
        $excerpt = strip_tags($excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $strip = explode( ' ' ,$excerpt );
        foreach($strip as $key => $single){
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode( ' ', $strip );
        $excerpt = substr($excerpt, 0, $count);
        if(strlen($excerpt) >= $count){
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '...';
        }
        return $excerpt;
    }
endif;

/*
Add Range Option to Visual Composer Params
*/
if (function_exists('add_shortcode_param')) {
    add_shortcode_param('range', 'manang_range_settings_field');
}

function manang_range_settings_field($settings, $value) {
    $dependency = vc_generate_dependencies_attributes($settings);
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type = isset($settings['type']) ? $settings['type'] : '';
    $min = isset($settings['min']) ? $settings['min'] : '';
    $max = isset($settings['max']) ? $settings['max'] : '';
    $step = isset($settings['step']) ? $settings['step'] : '';
    $unit = isset($settings['unit']) ? $settings['unit'] : '';
    $uniqeID = uniqid();
    $output = '';
    $output.= '<div class="mk-ui-input-slider" ><div ' . $dependency . ' class="mk-range-input" data-value="' . $value . '" data-min="' . $min . '" data-max="' . $max . '" data-step="' . $step . '" id="rangeInput-' . $uniqeID . '"></div><input name="' . $param_name . '"  class="range-input-selector wpb_vc_param_value ' . $param_name . ' ' . $type . '" type="text" value="' . $value . '"/><span class="unit">' . $unit . '</span></div>';
    $output.= '<script type="text/javascript">

        var range_wrapper_' . $uniqeID . ' = jQuery("#rangeInput-' . $uniqeID . '"),

            mk_min = parseFloat(range_wrapper_' . $uniqeID . '.attr("data-min")),
            mk_max = parseFloat(range_wrapper_' . $uniqeID . '.attr("data-max")),
            mk_step = parseFloat(range_wrapper_' . $uniqeID . '.attr("data-step")),
            mk_value = parseFloat(range_wrapper_' . $uniqeID . '.attr("data-value"));

            range_wrapper_' . $uniqeID . '.slider({
                  value:mk_value,
                  min: mk_min,
                  max: mk_max,
                  step: mk_step,
                  slide: function( event, ui ) {
                    range_wrapper_' . $uniqeID . '.siblings(".range-input-selector").val(ui.value );
                  }
            });

    </script>';
    return $output;
}

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'manang_register_required_plugins' );
function manang_register_required_plugins() {
    $plugins = array(

        array(
            'name'               => 'Manang Basecamp',
            'slug'               => 'manang-basecamp',
            'source'             => get_template_directory() . '/lib/plugins/manang-basecamp.zip',
            'required'           => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        array(
            'name'               => 'Visual Composer',
            'slug'               => 'js-composer-theme',
            'source'             => get_template_directory() . '/lib/plugins/js-composer.zip',
            'required'           => true,
            'version'            => '4.11.2.1',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        array(
            'name'      => 'Events Manager',
            'slug'      => 'events-manager',
            'required'  => false,
        ),
    );

    $config = array(
        'id'           => 'manang',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}

if(!function_exists('manang_instagram')):
    function manang_instagram($username) {


        $username = strtolower( $username );
        $username = str_replace( '@', '', $username );


        if ( false === ( $instagram = get_transient( 'instagram-a5-'.sanitize_title_with_dashes( $username ) ) ) ) {

                $remote = wp_remote_get( 'https://instagram.com/'.trim( $username ) );


                if ( is_wp_error( $remote ) )
                    return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'manang' ) );

                if ( 200 != wp_remote_retrieve_response_code( $remote ) )
                    return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'manang' ) );

                $shards = explode( 'window._sharedData = ', $remote['body'] );
                $insta_json = explode( ';</script>', $shards[1] );
                $insta_array = json_decode( $insta_json[0], TRUE );

                if ( ! $insta_array )
                    return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'manang' ) );

                if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
                    $images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
                } else {
                    return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'manang' ) );
                }

                if ( ! is_array( $images ) )
                    return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'manang' ) );

                $instagram = array();

                foreach ( $images as $image ) {

                    $image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['thumbnail_src'] );
                    $image['display_src'] = preg_replace( '/^https?\:/i', '', $image['display_src'] );

                    // handle both types of CDN url
                    if ( ( strpos( $image['thumbnail_src'], 's640x640' ) !== false ) ) {
                        $image['thumbnail'] = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
                        $image['small'] = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
                    } else {
                        $urlparts = wp_parse_url( $image['thumbnail_src'] );
                        $pathparts = explode( '/', $urlparts['path'] );
                        array_splice( $pathparts, 3, 0, array( 's160x160' ) );
                        $image['thumbnail'] = '//' . $urlparts['host'] . implode( '/', $pathparts );
                        $pathparts[3] = 's320x320';
                        $image['small'] = '//' . $urlparts['host'] . implode( '/', $pathparts );
                    }

                    $image['large'] = $image['thumbnail_src'];

                    if ( $image['is_video'] == true ) {
                        $type = 'video';
                    } else {
                        $type = 'image';
                    }

                    $caption = __( 'Instagram Image', 'manang' );
                    if ( ! empty( $image['caption'] ) ) {
                        $caption = $image['caption'];
                    }

                    $instagram[] = array(
                        'description'   => $caption,
                        'link'          => trailingslashit( '//instagram.com/p/' . $image['code'] ),
                        'time'          => $image['date'],
                        'comments'      => $image['comments']['count'],
                        'likes'         => $image['likes']['count'],
                        'thumbnail'     => $image['thumbnail'],
                        'small'         => $image['small'],
                        'large'         => $image['large'],
                        'original'      => $image['display_src'],
                        'type'          => $type
                    );
                }

                // do not set an empty transient - should help catch private or empty accounts
                if ( ! empty( $instagram ) ) {
                    $instagram = base64_encode( serialize( $instagram ) );
                    set_transient( 'instagram-a5-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'manang_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
                }
            }

        if ( ! empty( $instagram ) ) {

                return unserialize( base64_decode( $instagram ) );

            } else {

                return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'manang' ) );

            }

        ?>

        <?php
    }
endif;