<?php
        //CTA Section
        $wp_customize->add_setting(
                'manang_option[cta_layout]',
                array(
                    'type'    =>'option',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                    'default' => 'center-button',
                )
        );

        $wp_customize->add_control(

                    'manang_option[cta_layout]',
                    array(
                        'label'   => esc_html__( 'Layout', 'manang' ),
                        'section' => 'cta_options',
                        'type'    => 'radio',
                        'choices' => array(
                            'center-button' => esc_html__( 'Full width text, Button on bottom', 'manang' ),
                             'right-button' =>  esc_html__( 'Text on left, button on right', 'manang' ),
                            ),
                        'settings' => 'manang_option[cta_layout]',

                    )
        );

        $wp_customize->add_setting('manang_option[cta_bg_option]',
                array(
                    'type'    => 'option',
                    'default' => 'image_as_bg',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                )
        );

        $wp_customize->add_control('manang_option[cta_bg_option]',
                array(
                    'type'    => 'radio',
                    'label'   => esc_html__( 'Choose Background', 'manang' ),
                    'section' => 'cta_options',
                    'setting' => 'manang_option[cta_bg_option]',
                    'type'    => 'radio',
                    'choices' => array(
                        'image_as_bg' => esc_html__('Use Image as Background','manang'),
                        'video_as_bg' => esc_html__('Use Video as Background','manang'),
                    )
                )
            );

        $wp_customize->add_setting('manang_option[cta_bg_img]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'manang_sanitize_image',
                )
            );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize,
            'manang_option[cta_bg_img]',
            array(
                'label'           => __( 'Add Image', 'manang' ),
                'section'         => 'cta_options',
                'settings'        => 'manang_option[cta_bg_img]',
                'active_callback' => 'manang_callback_cta',
            ) )
        );
        $wp_customize->add_setting('manang_option[cta_bg_color]',
            array(
                'type' => 'option',
                 'sanitize_callback' => 'esc_attr',
                )
            );
        $wp_customize->add_control(
            new  Customize_Opacity_Color_Control(
            $wp_customize,
            'manang_option[cta_bg_color]',
            array(
                'label'           => __( 'Add Background Color', 'manang' ),
                'section'         => 'cta_options',
                'settings'        => 'manang_option[cta_bg_color]',
            ) )
        );


        $wp_customize->add_setting('manang_option[cta_parallax]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                    )
            );
        $wp_customize->add_control('manang_option[cta_parallax]',
                array(
                    'label'           => __('Parallax Effect','manang'),
                    'section'         => 'cta_options',
                    'settings'        =>  'manang_option[cta_parallax]',
                    'type'            => 'checkbox',
                    'active_callback' => 'manang_callback_cta',
                    )
            );

        $wp_customize->add_setting('manang_option[cta_bg_video]',
            array(
                'type'        => 'option',
                 'sanitize_callback' => 'esc_attr',
                'postMessage' => 'transport',
                )
            );
        $wp_customize->add_control(
            new WP_Customize_Upload_Control(
            $wp_customize,
            'manang_option[cta_bg_video]',
            array(
                'label'           => __( 'Add Video', 'manang' ),
                'section'         => 'cta_options',
                'settings'        => 'manang_option[cta_bg_video]',
                'active_callback' => 'manang_callback_cta'
            ) )
        );

        $wp_customize->add_setting('manang_option[cta_video_audio]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                    'default' => 1,
                    )
            );
        $wp_customize->add_control('manang_option[cta_video_audio]',
                array(
                    'label'           => __('Mute Audio','manang'),
                    'section'         => 'cta_options',
                    'settings'        =>  'manang_option[cta_video_audio]',
                    'type'            => 'checkbox',
                    'active_callback' => 'manang_callback_cta',
                    )
            );

        $wp_customize->add_setting('manang_option[cta_bg_video_preview_image]',
            array(
                'type'        => 'option',
                 'sanitize_callback' => 'esc_attr',
                'postMessage' => 'transport',
                )
            );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize,
            'cta_bg_video_preview_image',
            array(
                'label'           => __( 'Add Image', 'manang' ),
                'description' => __('This Image will be shown in the mobile view.','manang'),
                'section'         => 'cta_options',
                'settings'        => 'manang_option[cta_bg_video_preview_image]',
                'active_callback' => 'manang_callback_cta'
            ) )
        );

        $wp_customize->add_setting('manang_option[cta_title]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'esc_attr',
                )
        );
        $wp_customize->add_control('manang_option[cta_title]',
            array(
                'label'    => esc_html__( 'Title', 'manang' ),
                'section'  => 'cta_options',
                'settings' => 'manang_option[cta_title]',
                'type'     => 'text',
                )
        );

        $wp_customize->add_setting('manang_option[cta_description]',
            array(
                'type' => 'option',
                 'sanitize_callback' => 'esc_attr',
                )
        );
        $wp_customize->add_control('manang_option[cta_description]',
            array(
                'label'    => esc_html__( 'Description', 'manang' ),
                'section'  => 'cta_options',
                'settings' => 'manang_option[cta_description]',
                'type'     => 'textarea',
                )
        );

        $wp_customize->add_setting('manang_option[cta_button_text]',
            array(
                'type' => 'option',
                 'sanitize_callback' => 'esc_attr',
                )
        );
        $wp_customize->add_control('manang_option[cta_button_text]',
            array(
                'label'    => esc_html__( 'Button Text', 'manang' ),
                'section'  => 'cta_options',
                'settings' => 'manang_option[cta_button_text]',
                'type'     => 'text',
                )
        );

        $wp_customize->add_setting('manang_option[cta_button_link]',
            array(
                'type' => 'option',
                 'sanitize_callback' => 'esc_url_raw',
                'sanitize_callback' => 'manang_sanitize_url',
                )
        );
        $wp_customize->add_control('manang_option[cta_button_link]',
            array(
                'label'    => esc_html__( 'Button Link', 'manang' ),
                'section'  => 'cta_options',
                'settings' => 'manang_option[cta_button_link]',
                'type'     => 'text',
                )
        );