<?php if( post_type_exists( 'portfolio' ) ):
    $wp_customize->add_setting('manang_option[portfolio_title]',
            array(
                'type'    =>  'option',
                'sanitize_callback' => 'esc_html',
                'default' => ''
                )
    );
    $wp_customize->add_control('manang_option[portfolio_title]',
            array(
                'type'  =>  'text',
                'label' =>  esc_html__( 'Block Title on Home Page', 'manang'),
                'section'   =>  'portfolio_options',
                'settings' => 'manang_option[portfolio_title]',
                 )
    );

    $wp_customize->add_setting('manang_option[portfolio_sub_title]',
            array(
                'type'    =>  'option',
                'sanitize_callback' => 'esc_html',
                'default' => ''
                )
    );
    $wp_customize->add_control('manang_option[portfolio_sub_title]',
            array(
                'type'  =>  'textarea',
                'label' =>  esc_html__( 'Block Title on Home Page', 'manang'),
                'section'   =>  'portfolio_options',
                'settings' => 'manang_option[portfolio_sub_title]',
                 )
    );

    $wp_customize->add_setting('manang_option[portfolio_count]',
            array(
                'type'    =>  'option',
                'sanitize_callback' => 'manang_sanitize_integer',
                'default' => '4'
                )
    );
    $wp_customize->add_control('manang_option[portfolio_count]',
            array(
                'type'    =>  'text',
                'label'   =>  esc_html__( 'Number Of Post', 'manang'),
                'section' =>  'portfolio_options',
                'settings' => 'manang_option[portfolio_count]',
                 )
    );

     $wp_customize->add_setting('manang_option[portfolio_bg_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'manang_sanitize_image',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
        $wp_customize,
        'manang_option[portfolio_bg_image]',
        array(
            'label'           => __( 'Add Background Image', 'manang' ),
            'section'         => 'portfolio_options',
            'settings'        => 'manang_option[portfolio_bg_image]',
        ) )
    );

    $wp_customize->add_setting('manang_option[portfolio_bg_color]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'esc_html',
            )
        );
    $wp_customize->add_control(
        new  Customize_Opacity_Color_Control(
        $wp_customize,
        'manang_option[portfolio_bg_color]',
        array(
            'label'           => __( 'Add Background Color', 'manang' ),
            'section'         => 'portfolio_options',
            'settings'        => 'manang_option[portfolio_bg_color]',
        ) )
    );


    $wp_customize->add_setting('manang_option[portfolio_parallax]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                )
        );
    $wp_customize->add_control('manang_option[portfolio_parallax]',
            array(
                'label'           => __('Parallax Effect','manang'),
                'section'         => 'portfolio_options',
                'type'            => 'checkbox',
                'settings'        =>  'manang_option[portfolio_parallax]',
                )
        );

    $wp_customize->add_setting('manang_option[portfolio_padding]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => 'padbot',
                )
    );
    $wp_customize->add_control('manang_option[portfolio_padding]',
            array(
                'label'   => esc_html__( 'Add Padding', 'manang' ),
                'section' => 'portfolio_options',
                'type'    => 'radio',
                'choices' => array(
                        'padbot' => esc_html__('Yes','manang'),
                        'pad0'  => esc_html__('No','manang'),
                        ),
                'settings' =>  'manang_option[portfolio_padding]',
                )
    );

    $wp_customize->add_setting(
            'manang_option[portfolio_column]',
            array(
                'type'    =>'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => '2col',
            )
    );
    $wp_customize->add_control(
            'manang_option[portfolio_column]',
              array(
                'label'   => esc_html__( 'Column', 'manang' ),
                'section' => 'portfolio_options',
                'type'    => 'radio',
                'choices' => array(
                        '2col' => esc_html__('Two Column','manang'),
                        '3col' => esc_html__('Three Column','manang'),
                        '4col' => esc_html__('Four Column','manang')
                        ),
                'settings' => 'manang_option[portfolio_column]',
                )
    );

    $wp_customize->add_setting(
            'manang_option[portfolio_filter]',
            array(
                'type'    =>'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => 'yes',
            )
    );
    $wp_customize->add_control(
            'manang_option[portfolio_filter]',
              array(
                'label'   => esc_html__( 'Filter', 'manang' ),
                'section' => 'portfolio_options',
                'type'    => 'radio',
                'choices' => array(
                        'yes' => __('Filtered','manang'),
                        'no'  => __('Without Filter','manang'),
                        ),
                'settings' => 'manang_option[portfolio_filter]',
                )
    );

    $wp_customize->add_setting(
            'manang_option[portfolio_layout]',
            array(
                'type'    =>'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => 'portfolio-layout1',
            )
    );

    $wp_customize->add_control(

                'manang_option[portfolio_layout]',
                array(
                    'section' => 'portfolio_options',
                    'label'   => esc_html__( 'Layouts/Effects', 'manang' ),
                    'type'    => 'radio',
                    'choices' => array(
                        'portfolio-layout1' => esc_html__( 'Layout 1', 'manang' ),
                        'portfolio-layout2' => esc_html__( 'Layout 2', 'manang'),
                        'portfolio-layout3' => esc_html__( 'Layout 3', 'manang' ),
                        'portfolio-layout4' => esc_html__( 'Layout 4', 'manang'),
                        'portfolio-layout5' => esc_html__( 'Layout 5', 'manang' ),
                        'portfolio-layout6' => esc_html__( 'Layout 6', 'manang' ),
                    ),
                    'settings'        => 'manang_option[portfolio_layout]',
                    'active_callback' => 'manang_portfolio_check_callback',
                )
    );
endif;