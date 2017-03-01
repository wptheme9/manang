<?php
 //Latest Blog Section
$wp_customize->add_setting('manang_option[blog_title]',
        array(
            'type'    => 'option',
            'sanitize_callback' => 'esc_html',
            'default' => ''
            )
);
$wp_customize->add_control('manang_option[blog_title]',
        array(
            'type'    => 'text',
            'label'   => esc_html__( 'Block Title for Home Page.', 'manang' ),
            'section' => 'latest_blog_options',
            'settings' => 'manang_option[blog_title]'
            )
);

$wp_customize->add_setting('manang_option[blog_sub_title]',
        array(
            'type'    => 'option',
            'sanitize_callback' => 'esc_html',
            'default' => '',
            )
);
$wp_customize->add_control('manang_option[blog_sub_title]',
        array(
            'type'    => 'textarea',
            'label'   => esc_html__( 'Block Description for Home Page.', 'manang' ),
            'section' => 'latest_blog_options',
            'settings' => 'manang_option[blog_sub_title]'
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
    'sanitize_callback' => 'esc_url_raw',
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
        'sanitize_callback' => 'esc_html',
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