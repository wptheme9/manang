<?php
//Service Section
        if( post_type_exists( 'feature' ) ):
            $wp_customize->add_setting('manang_option[feature_title]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'esc_html',
                    )
            );
            $wp_customize->add_control('manang_option[feature_title]',
                    array(
                        'type'    => 'text',
                        'section' => 'features_options',
                        'label'   => esc_html__('Feature Title','manang'),
                        'settings' => 'manang_option[feature_title]',
                    )
            );

            $wp_customize->add_setting('manang_option[feature_description]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'esc_html',
                    )
            );
            $wp_customize->add_control('manang_option[feature_description]',
                    array(
                        'type'    => 'textarea',
                        'section' => 'features_options',
                        'label'   => esc_html__('Feature Description','manang'),
                        'settings' => 'manang_option[feature_description]',
                    )
            );

            $wp_customize->add_setting('manang_option[feature_post_count]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'manang_sanitize_integer',
                        'default' => '6',
                    )
            );
            $wp_customize->add_control('manang_option[feature_post_count]',
                    array(
                        'type'              => 'text',
                        'section'           => 'features_options',
                        'label'             => esc_html__('Number of post','manang'),
                        'settings' => 'manang_option[feature_post_count]',
                    )
            );

            $wp_customize->add_setting('manang_option[feature_category]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'manang_sanitize_checkbox',
                        'default' => '',
                    )
            );
            $wp_customize->add_control('manang_option[feature_category]',
                    array(
                        'type'              => 'select',
                        'section'           => 'features_options',
                        'label'             => esc_html__('Select Call Out Category','manang'),
                        'choices'           => manang_get_categories_select(),
                    )
            );

            $wp_customize->add_setting('manang_option[feature_bg_image]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'manang_sanitize_image',
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                $wp_customize,
                'manang_option[feature_bg_image]',
                array(
                    'label'           => __( 'Add Background Image', 'manang' ),
                    'section'         => 'features_options',
                    'settings'        => 'manang_option[feature_bg_image]',
                ) )
            );

            $wp_customize->add_setting('manang_option[feature_bg_color]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'esc_html',
                    )
                );
            $wp_customize->add_control(
                new  Customize_Opacity_Color_Control(
                $wp_customize,
                'manang_option[feature_bg_color]',
                array(
                    'label'           => __( 'Add Background Color', 'manang' ),
                    'section'         => 'features_options',
                    'settings'        => 'manang_option[feature_bg_color]',
                ) )
            );


            $wp_customize->add_setting('manang_option[feature_parallax]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'manang_sanitize_checkbox',
                        )
                );
            $wp_customize->add_control('manang_option[feature_parallax]',
                    array(
                        'label'           => __( 'Parallax Effect', 'manang' ),
                        'section'         => 'features_options',
                        'settings'        =>  'manang_option[feature_parallax]',
                        'type'            => 'checkbox',
                        )
                );


            //  $wp_customize->add_setting(
            //         'manang_option[service_layout_option]',
            //         array(
            //             'type'    => 'option',
            //             'sanitize_callback' => 'manang_sanitize_checkbox',
            //             'default' => '3col',
            //             )
            // );
            // $wp_customize->add_control(
            //         'manang_option[service_layout_option]',
            //         array(
            //             'label'           => esc_html__( 'Column', 'manang' ),
            //             'type'            => 'radio',
            //             'section'         => 'features_options',
            //             'choices'         => array(
            //                     '3col' => __('3 Columned','manang'),
            //                     '4col' =>  __('4 Columned','manang'),
            //                     ),
            //             )
            // );

            $wp_customize->add_setting(
                    'manang_option[feature_effects]',
                    array(
                        'type'    =>'option',
                        'sanitize_callback' => 'manang_sanitize_checkbox',
                        'default' => 'feature1',
                    )
            );

            $wp_customize->add_control(

                        'manang_option[feature_effects]',
                        array(
                            'section'         => 'features_options',
                            'label'           => esc_html__( 'Layouts/Effects', 'manang' ),
                            'type'            => 'radio',
                            'choices'         => array(
                                'feature1' => esc_html__( 'Effect 1', 'manang' ),
                                'feature2' => esc_html__( 'Effect 2', 'manang'),
                                'feature3' => esc_html__( 'Effect 3', 'manang' ),
                                'feature4' =>  esc_html__( 'Effect 4', 'manang'),
                                'feature5'  => esc_html__( 'Effect 5', 'manang' ),
                                'feature6' =>  esc_html__( 'Effect 6', 'manang'),
                            ),
                        )
            );
        endif;