<?php
 //Clients Section
        if( post_type_exists( 'client' ) ):
            $wp_customize->add_setting('manang_option[client_count]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'manang_sanitize_integer',
                        'default' => '5',
                        )
            );
            $wp_customize->add_control('manang_option[client_count]',
                    array(
                        'type'    => 'text',
                        'label'   => esc_html__('Number Of Post','manang'),
                        'section' => 'clients_options',
                        )
            );

             $wp_customize->add_setting('manang_option[client_bg_image]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'manang_sanitize_image',
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                $wp_customize,
                'manang_option[client_bg_image]',
                array(
                    'label'           => __( 'Add Background Image', 'manang' ),
                    'section'         => 'clients_options',
                    'settings'        => 'manang_option[client_bg_image]',
                ) )
            );

            $wp_customize->add_setting('manang_option[client_bg_color]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'esc_html',
                    )
                );
            $wp_customize->add_control(
                new  Customize_Opacity_Color_Control(
                $wp_customize,
                'manang_option[client_bg_color]',
                array(
                    'label'           => __( 'Add Background Color', 'manang' ),
                    'section'         => 'clients_options',
                    'settings'        => 'manang_option[client_bg_color]',
                ) )
            );


            $wp_customize->add_setting('manang_option[client_parallax]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'manang_sanitize_checkbox',
                        )
                );
            $wp_customize->add_control('manang_option[client_parallax]',
                    array(
                        'label'           => __('Parallax Effect','manang'),
                        'section'         => 'clients_options',
                        'type'            => 'checkbox',
                        'settings'        =>  'manang_option[client_parallax]',
                        )
                );

            $wp_customize->add_setting('manang_option[client_slide_option]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'manang_sanitize_checkbox',
                        'default' => 'yes',
                        )
            );
            $wp_customize->add_control('manang_option[client_slide_option]',
                    array(
                        'type'    => 'radio',
                        'label'   => esc_html__('Slide','manang'),
                        'section' => 'clients_options',
                        'choices' => array(
                                    'no'  => __('No','manang'),
                                    'yes' => __('Yes','manang'),
                                    )
                        )
            );

            $wp_customize->add_setting('manang_option[client_hover_effect]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'manang_sanitize_checkbox',
                        'default' => 'hover-bw',
                        )
            );
            $wp_customize->add_control('manang_option[client_hover_effect]',
                    array(
                        'type'    => 'radio',
                        'label'   => esc_html__('Effect','manang'),
                        'section' => 'clients_options',
                        'choices' => array(
                                    'hover-bw'  => esc_html__('On Hover Gray Scale','manang'),
                                    'hover-colored' => esc_html__('On Hover Color Scale','manang'),
                                    )
                        )
            );
        endif;