<?php
//Team Section
if(post_type_exists( 'team' )):
    $wp_customize->add_setting('manang_option[team_title]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'esc_html',
                'default' => ''
                )
    );
    $wp_customize->add_control('manang_option[team_title]',
            array(
                'type'    => 'text',
                'label'   => esc_html__( 'Block Title for Home Page.', 'manang' ),
                'section' => 'team_options',
                'settings' => 'manang_option[team_title]',
                )
    );

    $wp_customize->add_setting('manang_option[team_sub_title]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'esc_html',
                'default' => ''
                )
    );
    $wp_customize->add_control('manang_option[team_sub_title]',
            array(
                'type'    => 'textarea',
                'label'   => esc_html__( 'Block Description for Home Page.', 'manang' ),
                'section' => 'team_options',
                )
    );

    $wp_customize->add_setting('manang_option[team_count]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'manang_sanitize_integer',
                'default' => '4'
                )
    );
    $wp_customize->add_control('manang_option[team_count]',
            array(
                'type'    => 'text',
                'label'   => esc_html__( 'Number of post', 'manang' ),
                'section' => 'team_options',
                )
    );

    $wp_customize->add_setting('manang_option[team_bg_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'manang_sanitize_image',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
        $wp_customize,
        'manang_option[team_bg_image]',
        array(
            'label'           => __( 'Add Background Image', 'manang' ),
            'section'         => 'team_options',
            'settings'        => 'manang_option[team_bg_image]',
        ) )
    );

    $wp_customize->add_setting('manang_option[team_bg_color]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'esc_html',
            )
        );
    $wp_customize->add_control(
        new  Customize_Opacity_Color_Control(
        $wp_customize,
        'manang_option[team_bg_color]',
        array(
            'label'           => __( 'Add Background Color', 'manang' ),
            'section'         => 'team_options',
            'settings'        => 'manang_option[team_bg_color]',
        ) )
    );


    $wp_customize->add_setting('manang_option[team_parallax]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                )
        );
    $wp_customize->add_control('manang_option[team_parallax]',
            array(
                'label'           => esc_html__('Parallax Effect','manang'),
                'section'         => 'team_options',
                'type'            => 'checkbox',
                'settings'        =>  'manang_option[team_parallax]',
                )
        );

    $wp_customize->add_setting('manang_option[team_layout_single]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => 'with-sidebar',
                )
        );
    $wp_customize->add_control('team_layout_single',
            array(
                'label'           => esc_html__('Member Page Layout','manang'),
                'section'         => 'team_options',
                'type'            => 'radio',
                 'choices' => array(
                    'with-sidebar' => esc_html__('Sidebar Layout','manang'),
                    'full-width' => esc_html__('Full Width','manang'),
                ),
                'settings' => 'manang_option[team_layout_single]',
                )
        );

    $wp_customize->add_setting(
            'manang_option[team_layout]',
            array(
                'type'    =>'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => 'team-layout1',
            )
    );
    $wp_customize->add_control(
        'manang_option[team_layout]',
        array(
            'section' => 'team_options',
            'label' => esc_html__( 'Layout/Design','manang' ),
            'type' => 'radio',
            'choices' => array(
                'team-layout1' => esc_html__('Team Layout 1','manang'),
                'team-layout2' => esc_html__('Team Layout 2','manang'),
                'team-layout3' => esc_html__('Team Layout 3','manang'),
                'team-layout4' => esc_html__('Team Layout 4','manang'),
                'team-layout5' => esc_html__('Team Layout 5','manang'),
            ),
            'settings' => 'manang_option[team_layout]',
        )
    );
endif;