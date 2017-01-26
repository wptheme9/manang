<?php
        if(post_type_exists( 'stat' )):
            //Skills Section
            $wp_customize->add_setting('manang_option[skills_title]',
                array(
                    'type'    => 'option',
                    'sanitize_callback' => 'esc_attr',
                    'default' => '',
                    )
            );
            $wp_customize->add_control('manang_option[skills_title]',
                array(
                    'type'    => 'text',
                    'label'   => esc_html__( 'Block Title for Home Page', 'manang' ),
                    'section' => 'skills_options',
                    )
            );

            $wp_customize->add_setting('manang_option[skills_post_count]',
                array(
                    'type'    => 'option',
                    'sanitize_callback' => 'cpm_framework_sanitize_integer',
                    'default' => '4',
                    )
            );
            $wp_customize->add_control('manang_option[skills_post_count]',
                array(
                    'type'    => 'text',
                    'label'   => esc_html__( 'Number Of Post', 'manang' ),
                    'section' => 'skills_options',
                    )
            );

            $wp_customize->add_setting('manang_option[skills_bg_image]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'cpm_framework_sanitize_image',
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
                        'sanitize_callback' => 'esc_attr',
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
                            'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                            'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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

            $wp_customize->add_setting(
                    'manang_option[skills_layout]',
                    array(
                        'type'    =>'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
                        'default' => 'skills-anim',
                    )
            );
            $wp_customize->add_control(
                        'manang_option[skills_layout]',
                        array(
                            'label'   => esc_html__( 'Shape', 'manang' ),
                            'section' => 'skills_options',
                            'type'    => 'radio',
                            'choices' => array(
                                'skills-anim'     => esc_html__( 'Circle', 'manang' ),
                                'skills-bar-lay1' => esc_html__( 'Thin Progress Bar', 'manang' ),
                                'skills-bar-lay3' => esc_html__( 'Thick Progress Bar', 'manang' ),
                                'skills-triangle' => esc_html__( 'Triangle', 'manang' ),
                            ),
                            'settings' => 'manang_option[skills_layout]',
                        )
            );
        endif;

        //Sidebar Section
        $wp_customize->add_setting(
                'manang_option[sidebar_layout]',
                array(
                    'type'    =>'option',
                    'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
                    'default' => 'left-sidebar',
                )
        );

        $wp_customize->add_control(
                    'manang_option[sidebar_layout]',
                    array(
                        'section'  => 'sidebar_home_options',
                        'label'    => esc_html__( 'Select Sidebar position on Home Page', 'manang' ),
                        'settings' => 'manang_option[sidebar_layout]',
                        'type'     => 'radio',
                        'choices'  => array(
                            'left-sidebar'  => esc_html__( 'Left sidebar', 'manang' ),
                            'right-sidebar' => esc_html__( 'Right Sidebar', 'manang' ),
                            'no-sidebar'    => esc_html__( 'No-Sidebar', 'manang' ),
                            ),
                        )
        );

        //Team Section
        if(post_type_exists( 'team' )):
            $wp_customize->add_setting('manang_option[team_title]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'esc_attr',
                        'default' => ''
                        )
            );
            $wp_customize->add_control('manang_option[team_title]',
                    array(
                        'type'    => 'text',
                        'label'   => esc_html__( 'Block Title for Home Page.', 'manang' ),
                        'section' => 'team_options',
                        )
            );

            $wp_customize->add_setting('manang_option[team_count]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_integer',
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
                'sanitize_callback' => 'cpm_framework_sanitize_image',
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
                    'sanitize_callback' => 'esc_attr',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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

        //Service Section
        if( post_type_exists( 'callout' ) ):
            $wp_customize->add_setting('manang_option[service_title]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'esc_attr',
                    )
            );
            $wp_customize->add_control('manang_option[service_title]',
                    array(
                        'type'    => 'text',
                        'section' => 'service_options',
                        'label'   => esc_html__('Call Out Block Title','manang'),
                    )
            );

            $wp_customize->add_setting('manang_option[service_post_count]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_integer',
                        'default' => '6',
                    )
            );
            $wp_customize->add_control('manang_option[service_post_count]',
                    array(
                        'type'              => 'text',
                        'section'           => 'service_options',
                        'label'             => esc_html__('Number of post','manang'),
                    )
            );

            if(!function_exists('cpm_framework_get_categories_select')):
                function cpm_framework_get_categories_select() {
                    $cpm_framework_cat = get_terms( array(
                        'taxonomy' => 'callout_category',
                        'hide_empty' => false,
                    ) );
                    $results="";
                    $results['default'] = "Select category";
                    if(! empty( $cpm_framework_cat ) && ! is_wp_error( $cpm_framework_cat ) ):
                        $count = count($cpm_framework_cat);
                         for ($i=0; $i < $count; $i++) {
                           $results[$cpm_framework_cat[$i]->slug] = $cpm_framework_cat[$i]->name;
                         }
                     endif;
                    return $results;
                }
            endif;
            $wp_customize->add_setting('manang_option[callout_category]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
                        'default' => 'default',
                    )
            );
            $wp_customize->add_control('manang_option[callout_category]',
                    array(
                        'type'              => 'select',
                        'section'           => 'service_options',
                        'label'             => esc_html__('Select Call Out Category','manang'),
                        'choices'           => cpm_framework_get_categories_select(),
                    )
            );

            $wp_customize->add_setting('manang_option[service_bg_image]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'cpm_framework_sanitize_image',
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                $wp_customize,
                'manang_option[service_bg_image]',
                array(
                    'label'           => __( 'Add Background Image', 'manang' ),
                    'section'         => 'service_options',
                    'settings'        => 'manang_option[service_bg_image]',
                ) )
            );

            $wp_customize->add_setting('manang_option[service_bg_color]',
                array(
                    'type' => 'option',
                    'sanitize_callback' => 'esc_attr',
                    )
                );
            $wp_customize->add_control(
                new  Customize_Opacity_Color_Control(
                $wp_customize,
                'manang_option[service_bg_color]',
                array(
                    'label'           => __( 'Add Background Color', 'manang' ),
                    'section'         => 'service_options',
                    'settings'        => 'manang_option[service_bg_color]',
                ) )
            );


            $wp_customize->add_setting('manang_option[service_parallax]',
                    array(
                        'type' => 'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
                        )
                );
            $wp_customize->add_control('manang_option[service_parallax]',
                    array(
                        'label'           => __( 'Parallax Effect', 'manang' ),
                        'section'         => 'service_options',
                        'settings'        =>  'manang_option[service_parallax]',
                        'type'            => 'checkbox',
                        )
                );


            $wp_customize->add_setting(
                    'manang_option[service_tab_choice]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
                        'default' => 'yes',
                        )
            );
            $wp_customize->add_control(
                    'manang_option[service_tab_choice]',
                    array(
                        'label'   => esc_html__( 'Tabbed', 'manang' ),
                        'type'    => 'radio',
                        'section' => 'service_options',
                        'choices' => array(
                            'no'    => __('No','manang'),
                            'yes'   =>  __('Yes','manang'),
                            ),
                        )
            );

             $wp_customize->add_setting(
                    'manang_option[service_layout_option]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
                        'default' => '3col',
                        )
            );
            $wp_customize->add_control(
                    'manang_option[service_layout_option]',
                    array(
                        'label'           => esc_html__( 'Column', 'manang' ),
                        'type'            => 'radio',
                        'section'         => 'service_options',
                        'active_callback' => 'cpm_framework_service_check_callback',
                        'choices'         => array(
                                '3col' => __('3 Columned','manang'),
                                '4col' =>  __('4 Columned','manang'),
                                ),
                        )
            );

            $wp_customize->add_setting(
                    'manang_option[service_effects]',
                    array(
                        'type'    =>'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
                        'default' => 'mul-row-ser',
                    )
            );

            $wp_customize->add_control(

                        'manang_option[service_effects]',
                        array(
                            'section'         => 'service_options',
                            'active_callback' => 'cpm_framework_service_check_callback',
                            'label'           => esc_html__( 'Layouts/Effects', 'manang' ),
                            'type'            => 'radio',
                            'choices'         => array(
                                'mul-row-ser'         => esc_html__( 'Effect 1', 'manang' ),
                                'block-hover'          => esc_html__( 'Effect 2', 'manang'),
                                'single-row-icon-big'  => esc_html__( 'Effect 3', 'manang' ),
                                'single-row-icon-side' =>  esc_html__( 'Effect 4', 'manang'),
                            ),
                        )
            );
        endif;

        //Testimonial Section
        if(post_type_exists( 'testimonial' ) ):
            $wp_customize->add_setting('manang_option[testimonial_title]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'esc_attr',
                        )
            );
            $wp_customize->add_control('manang_option[testimonial_title]',
                    array(
                        'type'    => 'text',
                        'label'   => esc_html__('Block Title','manang'),
                        'section' => 'testimonial_options',
                        )
            );

            $wp_customize->add_setting('manang_option[testimonial_count]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_integer',
                        'default' => '4',
                        )
            );
            $wp_customize->add_control('manang_option[testimonial_count]',
                    array(
                        'type'    => 'text',
                        'label'   => esc_html__('Number Of Posts','manang'),
                        'section' => 'testimonial_options',
                        )
            );

            $wp_customize->add_setting('manang_option[testimonial_bg_image]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'cpm_framework_sanitize_image',
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
                    'sanitize_callback' => 'esc_attr',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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

        //Clients Section
        if( post_type_exists( 'client' ) ):
            $wp_customize->add_setting('manang_option[client_title]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'esc_attr',
                        )
            );
            $wp_customize->add_control('manang_option[client_title]',
                    array(
                        'type'    => 'text',
                        'label'   => esc_html__('Block Title','manang'),
                        'section' => 'clients_options',
                        )
            );


            $wp_customize->add_setting('manang_option[client_count]',
                    array(
                        'type'    => 'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_integer',
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
                'sanitize_callback' => 'cpm_framework_sanitize_image',
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
                    'sanitize_callback' => 'esc_attr',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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

        //Portfolio Options
        if( post_type_exists( 'portfolio' ) ):

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
                         )
            );

            $wp_customize->add_setting('manang_option[portfolio_count]',
                    array(
                        'type'    =>  'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_integer',
                        'default' => '4'
                        )
            );
            $wp_customize->add_control('manang_option[portfolio_count]',
                    array(
                        'type'    =>  'text',
                        'label'   =>  esc_html__( 'Number Of Post', 'manang'),
                        'section' =>  'portfolio_options',
                         )
            );

             $wp_customize->add_setting('manang_option[portfolio_bg_image]',
            array(
                'type' => 'option',
                'sanitize_callback' => 'cpm_framework_sanitize_image',
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
                    'sanitize_callback' => 'esc_attr',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                                )
                        )
            );

            $wp_customize->add_setting(
                    'manang_option[portfolio_column]',
                    array(
                        'type'    =>'option',
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                        'sanitize_callback' => 'cpm_framework_sanitize_checkbox',
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
                            'active_callback' => 'cpm_framework_portfolio_check_callback',
                        )
            );
        endif;

    //Custom Mailchimp
     $wp_customize->add_setting(
        'manang_option[newsletter_section_title]',
        array(
            'type'    => 'option',
            'default'=>'',
            'sanitize_callback'=>'cpm_framework_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_newsletter_section_title', array(
        'label'        => __( 'Block Title For Newsletter', 'manang' ),
        'type'=>'text',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[newsletter_section_title]',
    ) );

    $wp_customize->add_setting(
        'manang_option[mailchimp_campaign_option]',
        array(
            'type'    => 'option',
            'default'=>'mailchimp',
            'sanitize_callback'=>'cpm_framework_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_mailchimp_campaign_option', array(
        'label'        => __( 'Choose Newsletter', 'manang' ),
        'type'=>'radio',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[mailchimp_campaign_option]',
        'choices'    => array('mailchimp' => esc_html__('Mailchimp','manang'),
                               'campaign' => esc_html__('Campaign','manang'),
                        ),
    ) );

    $wp_customize->add_setting(
        'manang_option[mailchimp_api_key]',
        array(
            'type'    => 'option',
            'default'=>'',
            'sanitize_callback'=>'cpm_framework_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_mailchimp_api_key', array(
        'label'        => __( 'Add API Key', 'manang' ),
        'type'=>'text',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[mailchimp_api_key]',
        'active_callback' => 'cpm_framework_mailchimp_api_key',
    ) );

    $wp_customize->add_setting(
        'manang_option[mailchimp_list_id]',
        array(
            'type'    => 'option',
            'default'=>'',
            'sanitize_callback'=>'cpm_framework_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_mailchimp_list_id', array(
        'label'        => __( 'List ID', 'manang' ),
        'type'=>'text',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[mailchimp_list_id]',
        'active_callback' => 'cpm_framework_mailchimp_api_key',
    ) );

    $wp_customize->add_setting(
        'manang_option[campaign_api_key]',
        array(
            'type'    => 'option',
            'default'=>'',
            'sanitize_callback'=>'cpm_framework_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_campaign_api_key', array(
        'label'        => __( 'Add API Key', 'manang' ),
        'type'=>'text',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[campaign_api_key]',
        'active_callback' => 'cpm_framework_mailchimp_api_key',
    ) );


    $wp_customize->add_setting(
        'manang_option[campaign_list_id]',
        array(
            'type'    => 'option',
            'default'=>'',
            'sanitize_callback'=>'cpm_framework_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_campaign_list_id', array(
        'label'        => __( 'List ID', 'manang' ),
        'type'=>'text',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[campaign_list_id]',
        'active_callback' => 'cpm_framework_mailchimp_api_key',
    ) );

    $wp_customize->add_setting(
        'manang_option[show_hide_fullname]',
        array(
            'type'    => 'option',
            'default'=>1,
            'sanitize_callback'=>'cpm_framework_sanitize_checkbox',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_show_hide_fullname', array(
        'label'        => __( 'Show Fullname', 'manang' ),
        'type'=>'checkbox',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[show_hide_fullname]',
    ) );

    //Custom Css change
    $wp_customize->add_setting(
        'manang_option[css_change]',
        array(
            'type'    => 'option',
            'default'=>'',
            'sanitize_callback'=>'cpm_framework_sanitize_checkbox',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_css_change', array(
        'label'        => __( 'Add CSS', 'manang' ),
        'type'=>'textarea',
        'section'    => 'change_css',
        'settings'   => 'manang_option[css_change]',
    ) );

    /* === SORTABLE === */

    $wp_customize->add_setting(
        'manang_option[sortable_check]', /* option name */
        array(
            'default'           => manang_sortable_default(), //client:1,
            'sanitize_callback' => 'manang_sanitize_sortables',
            'transport'         => 'refresh',
            'type'              => 'option',
            'capability'        => 'manage_options',
        )
    );

    $choices = array();
    $services = manang_sortables();
    foreach( $services as $key => $val ){
        $choices[$key] = $val['label'];
    }
    $wp_customize->add_control(
        new Manang_Customize_Control_Sortable_Checkboxes(
            $wp_customize,
            'sortable_check', /* control id */
            array(
                'section'     => 'sortable',
                'settings'    => 'manang_option[sortable_check]',
                'label'       => __( 'Sharing Services', 'manang' ),
                'description' => __( 'Enable and reorder sharing buttons.', 'manang' ),
                'choices'     => $choices,
            )
        )
    );