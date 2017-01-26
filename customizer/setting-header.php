<?php

$wp_customize->add_setting('manang_option[extend_menu_option]',
        array(
            'type'    => 'option',
            'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
            'default' => '1',
            ));
$wp_customize->add_control('manang_option[extend_menu_option]',
        array(
            'section' => 'header_options',
            'label'   => esc_html__('Show Top Menu', 'manang'),
            'type'    => 'checkbox',
));

$wp_customize->add_setting('manang_option[search_show]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
                    'default' => 1,
                    )
);
$wp_customize->add_control('manang_option[search_show]',
        array(
            'label'           => __('Show Search Icon In Menu','manang'),
            'section'         => 'header_options',
            'type'            => 'checkbox',
            'settings'        =>  'manang_option[search_show]',
            )
);



$wp_customize->add_setting(
        'manang_option[layout_picker]',
        array(
            'type'      =>'option',
            'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
            'default'   => 'menu-left-right',
        )
);

$wp_customize->add_control(
        'manang_option[layout_picker]',
        array(
            'section'  => 'header_options',
            'label'    => esc_html__( 'Layout/Design', 'manang' ),
            'type'     => 'radio',
            'choices'  => array(
                'menu-left-right'        => esc_html__( 'Left Logo Right Menu', 'manang' ),
                'headcenter-left-right'  => esc_html__( 'Center Logo Center Menu', 'manang'),
                'banner-menu-left-right' => esc_html__( 'With Ad Banner', 'manang' ),
            ),
            'settings' => 'manang_option[layout_picker]',
        )
);

$wp_customize->add_setting(
        'manang_option[social_icons_option]',
        array(
            'type'      =>'option',
            'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
            'default'   => 'social-left',
        )
);

$wp_customize->add_control(
        'manang_option[social_icons_option]',
        array(
            'section'  => 'header_options',
            'label'    => esc_html__( 'Social icons/Menu', 'manang' ),
            'type'     => 'radio',
            'choices'  => array(
                'social-left'  => esc_html__( 'Social Icon in top left', 'manang'),
                'social-right'        => esc_html__( 'Social Icon in top right', 'manang' ),
                'menu-left-right' => esc_html__( 'Both menu', 'manang' ),
            ),
            'settings' => 'manang_option[social_icons_option]',
        )
);
$version_wp = get_bloginfo('version');
if($version_wp < 4.5){
    $wp_customize->add_setting('manang_option[upload_image_logo]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'cpm_framework_sanitize_image',
            )
        );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
        $wp_customize,
        'manang_option[upload_image_logo]',
        array(
            'label'           => __( 'Add Logo', 'manang' ),
            'section'         => 'title_tagline',
            'settings'        => 'manang_option[upload_image_logo]',
            'priority'        => 40,
        ) )
    );
}

//Banner Section
$wp_customize->add_setting(
        'manang_option[banner_picker]',
        array(
            'type'      =>'option',
            'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
            'default'   => 'banner-default',
        )
);

$wp_customize->add_control(
            'manang_option[banner_picker]',
            array(
                'section' => 'banner_options',
                'label'   => esc_html__( 'Banner', 'manang' ),
                'type'    => 'radio',
                'choices' => array(
                     'banner-default'     =>  esc_html__( 'Slider Banner(default)', 'manang' ),
                     'banner-image'       =>  esc_html__( 'Single Image Banner', 'manang' ),
                     'banner-video'       => esc_html__( 'Banner with video on background', 'manang'),
                ),
                'settings' => 'manang_option[banner_picker]',

            )
);

$wp_customize->add_setting('manang_option[cover_banner]',
        array(
            'type'    => 'option',
            'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
            'default' => '',
            ));
$wp_customize->add_control('manang_option[cover_banner]',
        array(
            'section' => 'banner_options',
            'label'   => esc_html__('Cover Banner', 'manang'),
            'type'    => 'checkbox',
            ));


$wp_customize->add_setting('manang_option[slider_image_title]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_attr',
        )
    );
$wp_customize->add_control('manang_option[slider_image_title]',
    array(
        'label'           => esc_html__( 'Title', 'manang' ),
        'type'            => 'text',
        'section'         => 'banner_options',
        'active_callback' => 'cpm_framework_callback_choice',
        )
);

$wp_customize->add_setting('manang_option[slider_image_description]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_attr',
        )
    );
$wp_customize->add_control('manang_option[slider_image_description]',
    array(
        'label'           => __('Description','manang'),
        'type'            => 'textarea',
        'section'         => 'banner_options',
        'active_callback' => 'cpm_framework_callback_choice',
        )
);

$wp_customize->add_setting('manang_option[slider_image_text]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_attr',
        )
    );
$wp_customize->add_control('manang_option[slider_image_text]',
    array(
        'label'           => __('Button Text','manang'),
        'type'            => 'text',
        'section'         => 'banner_options',
        'active_callback' => 'cpm_framework_callback_choice',
        )
    );

$wp_customize->add_setting('manang_option[slider_image_link]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'cpm_framework_sanitize_url',
        )
    );
$wp_customize->add_control('manang_option[slider_image_link]',
    array(
        'label'             => __('Button Link','manang'),
        'type'              => 'text',
        'section'           => 'banner_options',
        'active_callback'   => 'cpm_framework_callback_choice',
        'sanitize_callback' => 'esc_url_raw',
        )
    );

$wp_customize->add_setting('manang_option[upload_banner_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'cpm_framework_sanitize_image',
        )
    );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'manang_option[upload_banner_image]',
    array(
        'label'           => __( 'Add Image', 'manang' ),
        'active_callback' => 'cpm_framework_callback_choice',
        'section'         => 'banner_options',
        'settings'        => 'manang_option[upload_banner_image]',
    ) )
);



$wp_customize->add_setting('manang_option[slider_video_title]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_attr',
        )
    );
$wp_customize->add_control('manang_option[slider_video_title]',
    array(
        'label'           => __('Title','manang'),
        'type'            => 'text',
        'section'         => 'banner_options',
        'active_callback' => 'cpm_framework_callback_choice',
        )
);

$wp_customize->add_setting('manang_option[slider_video_description]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_attr',
        )
    );
$wp_customize->add_control('manang_option[slider_video_description]',
    array(
        'label'           => __('Description','manang'),
        'type'            => 'textarea',
        'section'         => 'banner_options',
        'active_callback' => 'cpm_framework_callback_choice',
        )
);
$wp_customize->add_setting('manang_option[slider_video_text]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_attr',
        )
    );
$wp_customize->add_control('manang_option[slider_video_text]',
    array(
        'label'           => __('Button Text','manang'),
        'type'            => 'text',
        'section'         => 'banner_options',
        'active_callback' => 'cpm_framework_callback_choice',
        )
    );

$wp_customize->add_setting('manang_option[slider_video_link]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'cpm_framework_sanitize_url',
        )
    );
$wp_customize->add_control('manang_option[slider_video_link]',
    array(
        'label'           => __('Button Link','manang'),
        'type'            => 'text',
        'section'         => 'banner_options',
        'active_callback' => 'cpm_framework_callback_choice',
        'sanitize_callback' => 'esc_url_raw',
        )
    );

$wp_customize->add_setting('manang_option[upload_banner_video]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_attr',
        )
    );
$wp_customize->add_control(
    new WP_Customize_Upload_Control(
    $wp_customize,
    'manang_option[upload_banner_video]',
    array(
        'label'           => __( 'Add Video', 'manang' ),
        'active_callback' => 'cpm_framework_callback_choice',
        'section'         => 'banner_options',
        'settings'        => 'manang_option[upload_banner_video]',
    ) )
);
$wp_customize->add_setting('manang_option[banner_video_audio]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
                    'default' => 1,
                    )
            );
        $wp_customize->add_control('manang_option[banner_video_audio]',
                array(
                    'label'           => __('Mute Audio','manang'),
                    'section'         => 'banner_options',
                    'settings'        =>  'manang_option[banner_video_audio]',
                    'type'            => 'checkbox',
                    'active_callback' => 'cpm_framework_callback_choice',
                    )
            );

$wp_customize->add_setting('manang_option[upload_banner_video_preview_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_attr',
        )
    );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'upload_banner_video_preview_image',
    array(
        'label'           => __( 'Add Image', 'manang' ),
        'description' => __('This Image will be shown in the mobile view.','manang'),
        'active_callback' => 'cpm_framework_callback_choice',
        'section'         => 'banner_options',
        'settings'        => 'manang_option[upload_banner_video_preview_image]',
    ) )
);

//Social Icons
        $wp_customize->add_setting(
        'manang_option[phone_no]',
            array(
            'default'           => '',
            'type'              => 'option',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_html'
            )
        );
        $wp_customize->add_control( 'phone_no', array(
            'label'    =>  __('Phone Number', 'manang' ),
            'type'     =>'text',
            'section'  => 'social_options',
            'settings' => 'manang_option[phone_no]'
        ) );

        $wp_customize->add_setting(
        'manang_option[email_link]',
            array(
            'default'           =>'',
            'capability'        =>'edit_theme_options',
            'type'              => 'option',
            'sanitize_callback' =>'sanitize_email',
            )
        );
        $wp_customize->add_control( 'email_link', array(
            'label'    =>  __('Email ID', 'manang' ),
            'type'     =>'text',
            'section'  => 'social_options',
            'settings' => 'manang_option[email_link]'
        ) );

        $wp_customize->add_setting(
        'manang_option[fb_link]',
            array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'type'              => 'option',
            'capability'        => 'edit_theme_options',
            )
        );
        $wp_customize->add_control( 'fb_link', array(
            'label'    => __( 'Facebook', 'manang' ),
            'type'     =>'url',
            'section'  => 'social_options',
            'settings' => 'manang_option[fb_link]'
        ) );

        $wp_customize->add_setting(
         'manang_option[twitter_link]',
            array(
            'default'           =>'',
            'sanitize_callback' =>'esc_url_raw',
            'type'              => 'option',
            'capability'        =>'edit_theme_options'
            )
        );
        $wp_customize->add_control( 'twitter_link', array(
            'label'    =>  __('Twitter', 'manang' ),
            'type'     =>'url',
            'section'  => 'social_options',
            'settings' => 'manang_option[twitter_link]'
        ) );

        $wp_customize->add_setting(
         'manang_option[linkedin_link]',
            array(
            'default'           =>'',
            'sanitize_callback' =>'esc_url_raw',
            'type'              => 'option',
            'capability'        =>'edit_theme_options',
            )
        );
            $wp_customize->add_control( 'linkedin_link', array(
            'label'    => __( 'LinkedIn', 'manang' ),
            'type'     => 'url',
            'section'  => 'social_options',
            'settings' => 'manang_option[linkedin_link]'
        ) );

        $wp_customize->add_setting(
         'manang_option[gplus]',
            array(
            'default'           => '',
            'sanitize_callback' =>'esc_url_raw',
            'type'              => 'option',
            'capability'        => 'edit_theme_options',
            )
        );
        $wp_customize->add_control( 'manang_option[gplus]', array(
            'label'    => __( 'Google+', 'manang' ),
            'type'     =>'url',
            'section'  => 'social_options',
            'settings' => 'manang_option[gplus]'
        ) );

        $wp_customize->add_setting(
         'manang_option[youtube_link]',
            array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'type'              => 'option',
            'capability'        => 'edit_theme_options',
            )
        );
         $wp_customize->add_control( 'youtube_link', array(
            'label'    => __( 'Youtube', 'manang' ),
            'type'     =>'url',
            'section'  => 'social_options',
            'settings' => 'manang_option[youtube_link]'
        ) );

        $wp_customize->add_setting(
         'manang_option[instagram_link]',
            array(
            'default'           =>'',
            'sanitize_callback' =>'esc_url_raw',
            'type'              => 'option',
            'capability'        =>'edit_theme_options',
            )
        );
            $wp_customize->add_control( 'instagram_link', array(
            'label'    => __( 'Instagram', 'manang' ),
            'type'     =>'url',
            'section'  => 'social_options',
            'settings' => 'manang_option[instagram_link]'
        ) );

        $wp_customize->add_setting(
         'manang_option[tumblr_link]',
            array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'type'              => 'option',
            'capability'        => 'edit_theme_options',
            )
        );
         $wp_customize->add_control( 'tumblr_link', array(
            'label'    => __( 'Tumblr', 'manang' ),
            'type'     =>'url',
            'section'  => 'social_options',
            'settings' => 'manang_option[tumblr_link]'
        ) );

        $wp_customize->add_setting(
         'manang_option[pinterest_link]',
            array(
            'default'           =>'',
            'sanitize_callback' =>'esc_url_raw',
            'type'              => 'option',
            'capability'        =>'edit_theme_options',
            )
        );
            $wp_customize->add_control( 'pinterest_link', array(
            'label'    => __( 'Pinterest', 'manang' ),
            'type'     =>'url',
            'section'  => 'social_options',
            'settings' => 'manang_option[pinterest_link]'
        ) );