<?php
        //CTA Section
        // $wp_customize->add_setting(
        //         'manang_option[cta_layout_secondary]',
        //         array(
        //             'type'    =>'option',
        //             'sanitize_callback' => 'manang_sanitize_checkbox',
        //             'default' => 'center-button',
        //         )
        // );

        // $wp_customize->add_control(

        //             'manang_option[cta_layout_secondary]',
        //             array(
        //                 'label'   => esc_html__( 'Layout', 'manang' ),
        //                 'section' => 'cta_options_secondary',
        //                 'type'    => 'radio',
        //                 'choices' => array(
        //                     'center-button' => esc_html__( 'Full width text, Button on bottom', 'manang' ),
        //                      'right-button' =>  esc_html__( 'Text on left, button on right', 'manang' ),
        //                     ),
        //                 'settings' => 'manang_option[cta_layout_secondary]',

        //             )
        // );

        // $wp_customize->add_setting('manang_option[cta_bg_option_secondary]',
        //         array(
        //             'type'    => 'option',
        //             'default' => 'image_as_bg',
        //             'sanitize_callback' => 'manang_sanitize_checkbox',
        //         )
        // );

        // $wp_customize->add_control('manang_option[cta_bg_option_secondary]',
        //         array(
        //             'type'    => 'radio',
        //             'label'   => esc_html__( 'Choose Background', 'manang' ),
        //             'section' => 'cta_options_secondary',
        //             'setting' => 'manang_option[cta_bg_option_secondary]',
        //             'type'    => 'radio',
        //             'choices' => array(
        //                 'image_as_bg' => esc_html__('Use Image as Background','manang'),
        //                 'video_as_bg' => esc_html__('Use Video as Background','manang'),
        //             )
        //         )
        //     );

        $wp_customize->add_setting('manang_option[cta_bg_color_secondary]',
            array(
                'type' => 'option',
                 'sanitize_callback' => 'esc_html',
                )
            );
        $wp_customize->add_control(
            new  Customize_Opacity_Color_Control(
            $wp_customize,
            'manang_option[cta_bg_color_secondary]',
            array(
                'label'           => __( 'Add Background Color', 'manang' ),
                'section'         => 'cta_options_secondary',
                'settings'        => 'manang_option[cta_bg_color_secondary]',
            ) )
        );

        $wp_customize->add_setting('manang_option[cta_bg_image_secondary]',
            array(
                'type' => 'option',
                 'sanitize_callback' => 'esc_url_raw',
                )
            );
        $wp_customize->add_control(
            new  WP_Customize_Image_Control(
            $wp_customize,
            'manang_option[cta_bg_image_secondary]',
            array(
                'label'           => __( 'Add Background Image', 'manang' ),
                'section'         => 'cta_options_secondary',
                'settings'        => 'manang_option[cta_bg_image_secondary]',
            ) )
        );

        $wp_customize->add_setting('manang_option[cta_parallax_secondary]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                    )
            );
        $wp_customize->add_control('manang_option[cta_parallax_secondary]',
                array(
                    'label'           => __('Parallax Effect','manang'),
                    'section'         => 'cta_options_secondary',
                    'settings'        =>  'manang_option[cta_parallax_secondary]',
                    'type'            => 'checkbox',
                    // 'active_callback' => 'manang_callback_cta',
                    )
            );

        $wp_customize->add_setting('manang_option[cta_bg_video_secondary]',
            array(
                'type'        => 'option',
                 'sanitize_callback' => 'esc_html',
                'postMessage' => 'transport',
                )
            );
        $wp_customize->add_control(
            new WP_Customize_Upload_Control(
            $wp_customize,
            'manang_option[cta_bg_video_secondary]',
            array(
                'label'           => __( 'Add Video', 'manang' ),
                'section'         => 'cta_options_secondary',
                'settings'        => 'manang_option[cta_bg_video_secondary]',
                'active_callback' => 'manang_callback_cta'
            ) )
        );

        $wp_customize->add_setting('manang_option[cta_video_audio_secondary]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
                    'default' => 1,
                    )
            );
        $wp_customize->add_control('manang_option[cta_video_audio_secondary]',
                array(
                    'label'           => __('Mute Audio','manang'),
                    'section'         => 'cta_options_secondary',
                    'settings'        =>  'manang_option[cta_video_audio_secondary]',
                    'type'            => 'checkbox',
                    'active_callback' => 'manang_callback_cta',
                    )
            );

        $wp_customize->add_setting('manang_option[cta_bg_video_secondary_preview_image_secondary]',
            array(
                'type'        => 'option',
                 'sanitize_callback' => 'esc_html',
                'postMessage' => 'transport',
                )
            );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize,
            'cta_bg_video_secondary_preview_image_secondary',
            array(
                'label'           => __( 'Add Image', 'manang' ),
                'description' => __('This Image will be shown in the mobile view.','manang'),
                'section'         => 'cta_options_secondary',
                'settings'        => 'manang_option[cta_bg_video_secondary_preview_image_secondary]',
                'active_callback' => 'manang_callback_cta'
            ) )
        );

        $wp_customize->add_setting('manang_option[cta_title_secondary]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'esc_html',
                )
        );
        $wp_customize->add_control('manang_option[cta_title_secondary]',
            array(
                'label'    => esc_html__( 'Title', 'manang' ),
                'section'  => 'cta_options_secondary',
                'settings' => 'manang_option[cta_title_secondary]',
                'type'     => 'text',
                )
        );

        $wp_customize->add_setting('manang_option[cta_description_secondary]',
            array(
                'type' => 'option',
                 'sanitize_callback' => 'esc_html',
                )
        );
        $wp_customize->add_control('manang_option[cta_description_secondary]',
            array(
                'label'    => esc_html__( 'Description', 'manang' ),
                'section'  => 'cta_options_secondary',
                'settings' => 'manang_option[cta_description_secondary]',
                'type'     => 'textarea',
                )
        );

        $wp_customize->add_setting('manang_option[cta_button_text_secondary]',
            array(
                'type' => 'option',
                 'sanitize_callback' => 'esc_html',
                )
        );
        $wp_customize->add_control('manang_option[cta_button_text_secondary]',
            array(
                'label'    => esc_html__( 'Button Text', 'manang' ),
                'section'  => 'cta_options_secondary',
                'settings' => 'manang_option[cta_button_text_secondary]',
                'type'     => 'text',
                )
        );

        $wp_customize->add_setting('manang_option[cta_button_link_secondary]',
            array(
                'type' => 'option',
                 'sanitize_callback' => 'esc_url_raw',
                'sanitize_callback' => 'manang_sanitize_url',
                )
        );
        $wp_customize->add_control('manang_option[cta_button_link_secondary]',
            array(
                'label'    => esc_html__( 'Button Link', 'manang' ),
                'section'  => 'cta_options_secondary',
                'settings' => 'manang_option[cta_button_link_secondary]',
                'type'     => 'text',
                )
        );