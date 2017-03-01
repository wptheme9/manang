<?php
  if(post_type_exists( 'counter' )):
        $wp_customize->add_setting('manang_option[skills_post_count]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'manang_sanitize_integer',
                'default' => '4',
                )
        );
        $wp_customize->add_control('manang_option[skills_post_count]',
            array(
                'type'    => 'text',
                'label'   => esc_html__( 'Number Of Post', 'manang' ),
                'section' => 'skills_options',
                'settings'        => 'manang_option[skills_post_count]',
                )
        );

        $wp_customize->add_setting('manang_option[skills_bg_image]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'esc_url_raw',
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                $wp_customize,
                'manang_option[skills_bg_image]',
                array(
                    'label'           => __( 'Add Background Image', 'manang' ),
                    'section'         => 'skills_options',
                    'settings'        => 'manang_option[skills_bg_image]',
                ) )
            );

            $wp_customize->add_setting('manang_option[skills_bg_color]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'esc_html',
                    )
                );
            $wp_customize->add_control(
                new  Customize_Opacity_Color_Control(
                $wp_customize,
                'manang_option[skills_bg_color]',
                array(
                    'label'           => __( 'Add Background Color', 'manang' ),
                    'section'         => 'skills_options',
                    'settings'        => 'manang_option[skills_bg_color]',
                ) )
            );


            $wp_customize->add_setting('manang_option[skills_parallax]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'manang_sanitize_checkbox',
                        )
                );
            $wp_customize->add_control('manang_option[skills_parallax]',
                    array(
                        'label'           => __('Parallax Effect','manang'),
                        'section'         => 'skills_options',
                        'type'            => 'checkbox',
                        'settings'        =>  'manang_option[skills_parallax]',
                        )
                );

        $wp_customize->add_setting(
                    'manang_option[skills_animation]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'manang_sanitize_checkbox',
                        'default' => 'anim',
                        )
        );
        $wp_customize->add_control(
                    'manang_option[skills_animation]',
                    array(
                        'label'   => esc_html__( 'Animation', 'manang' ),
                        'type'    => 'radio',
                        'section' => 'skills_options',
                        'choices' => array(
                            'noanim' => esc_html__('No','manang'),
                            'anim'   =>  esc_html__('Yes','manang'),
                            ),
                        )
        );
    endif;