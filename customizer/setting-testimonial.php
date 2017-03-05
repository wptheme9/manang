<?php
 //Testimonial Section
if(post_type_exists( 'testimonial' ) ):
    $wp_customize->add_setting('manang_option[testimonial_title]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'esc_html',
                )
    );
    $wp_customize->add_control('manang_option[testimonial_title]',
            array(
                'type'    => 'text',
                'label'   => esc_html__('Block Title','manang'),
                'section' => 'testimonial_options',
                'settings' => 'manang_option[testimonial_title]',
                )
    );

    $wp_customize->add_setting('manang_option[testimonial_description]',
        array(
            'type' => 'option',
             'sanitize_callback' => 'esc_html',
            )
    );
    $wp_customize->add_control('manang_option[testimonial_description]',
        array(
            'label'    => esc_html__( 'Description', 'manang' ),
            'section'  => 'testimonial_options',
            'settings' => 'manang_option[testimonial_description]',
            'type'     => 'textarea',
            )
    );

    $wp_customize->add_setting('manang_option[testimonial_count]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'manang_sanitize_integer',
                'default' => '',
                )
    );
    $wp_customize->add_control('manang_option[testimonial_count]',
            array(
                'type'    => 'text',
                'label'   => esc_html__('Number Of Posts','manang'),
                'section' => 'testimonial_options',
                'settings' => 'manang_option[testimonial_count]',
                )
    );

    $wp_customize->add_setting('manang_option[testimonial_bg_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
        $wp_customize,
        'manang_option[testimonial_bg_image]',
        array(
            'label'           => __( 'Add Background Image', 'manang' ),
            'section'         => 'testimonial_options',
            'settings'        => 'manang_option[testimonial_bg_image]',
        ) )
    );

    $wp_customize->add_setting('manang_option[testimonial_bg_color]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'esc_html',
            )
        );
    $wp_customize->add_control(
        new  Customize_Opacity_Color_Control(
        $wp_customize,
        'manang_option[testimonial_bg_color]',
        array(
            'label'           => __( 'Add Background Color', 'manang' ),
            'section'         => 'testimonial_options',
            'settings'        => 'manang_option[testimonial_bg_color]',
        ) )
    );


    $wp_customize->add_setting('manang_option[testimonial_parallax]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                )
        );
    $wp_customize->add_control('manang_option[testimonial_parallax]',
            array(
                'label'           => __('Parallax Effect','manang'),
                'section'         => 'testimonial_options',
                'type'            => 'checkbox',
                'settings'        =>  'manang_option[testimonial_parallax]',
                )
        );

    $wp_customize->add_setting(
            'manang_option[testimonial_item]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => 'single-item-testimonial',
                )
    );
    $wp_customize->add_control(
            'manang_option[testimonial_item]',
            array(
                'label'   => esc_html__( 'Column', 'manang' ),
                'section' =>  'testimonial_options',
                'type'    => 'radio',
                'choices' =>  array(
                        'single-item-testimonial'   => __('One Item','manang'),
                        'double-item-testimonial'   => __('Two Item','manang'),
                        ),
                'settings' => 'manang_option[testimonial_item]',
                )
    );
    $wp_customize->add_setting(
            'manang_option[testimonial_layout]',
            array(
                'type'    =>'option',
                'sanitize_callback' => 'manang_sanitize_checkbox',
                'default' => 'testimonial-layout1',
            )
    );

    $wp_customize->add_control(
               'manang_option[testimonial_layout]',
                array(
                    'section' => 'testimonial_options',
                    'label'   => esc_html__( 'Layout/Design', 'manang' ),
                    'type'    => 'radio',
                    'choices' => array(
                         'testimonial-layout1' =>esc_html__( 'Bottom Aligned Image', 'manang' ),
                         'testimonial-layout2' =>esc_html__( 'Left Aligned Image', 'manang' ),
                         'testimonial-layout3' =>esc_html__( 'Boxed Layout 1', 'manang' ),
                         'testimonial-layout4' =>esc_html__( 'Boxed Layout 2', 'manang' ),
                         'testimonial-layout5' =>esc_html__( 'Top Aligned Image', 'manang' ),
                    ),
                )
    );
endif;