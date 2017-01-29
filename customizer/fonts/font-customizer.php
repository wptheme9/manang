<?php
if(!function_exists('manang_font_customize_register')):
      function manang_font_customize_register($wp_customize)
      {
            /*Font Section*/
            $wp_customize->add_section( 'manang_font_section', array(
            'title'       => __( 'Typography', 'manang' ),
            'priority'    => 25,
            'panel'       => 'theme_options',
            ) );


            /*Homepage Section Title font family*/
            $wp_customize->add_setting( 'manang_option[title_font_family]', array(
            'type' => 'option',
            'default' => '',
            'sanitize_callback'=>'manang_sanitize_text',
            ) );
            $wp_customize->add_control( new manang_Google_Font_Dropdown_Custom_Control($wp_customize, 'title_font_family', array(
            'label'      => __( 'Section Title Font Family', 'manang' ),
            'type' => 'text',
            'section'    => 'manang_font_section',
            'settings'   => 'manang_option[title_font_family]',
            ) ) );

            /*Home page Section Title text font color */
            $wp_customize->add_setting( 'manang_option[title_font_color]', array(
            'type' => 'option',
            'default' => '',
            'sanitize_callback'=>'manang_sanitize_checkbox',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_font_color', array(
            'label'      => __( 'Section Title Text Color', 'manang' ),
            'section'    => 'manang_font_section',
            'settings'   => 'manang_option[title_font_color]',
            ) ) );

            /**Homepage paragraph font family*/
            $wp_customize->add_setting( 'manang_option[paragraph_font_family]', array(
            'default' => '',
            'type'    => 'option',
            'sanitize_callback'=>'manang_sanitize_text',
            ) );

            $wp_customize->add_control( new manang_Google_Font_Dropdown_Custom_Control($wp_customize, 'paragraph_font_family', array(
            'label'      => __( 'Paragraph Font Family', 'manang' ),
            'section'    => 'manang_font_section',
            'settings'   => 'manang_option[paragraph_font_family]',
            ) ) );

            /*Home page Paragraph font color */
            $wp_customize->add_setting( 'manang_option[paragraph_font_color]', array(
            'type'    => 'option',
            'default' => '',
            'sanitize_callback'=>'manang_sanitize_checkbox',
            ) );

            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'paragraph_font_color', array(
            'label'      => __( 'Paragraph Text Color', 'manang' ),
            'section'    => 'manang_font_section',
            'settings'   => 'manang_option[paragraph_font_color]',
            ) ) );

            /*Heading font family*/
            $wp_customize->add_setting( 'manang_option[heading_font_family]', array(
            'type'    => 'option',
            'default' => '',
            'sanitize_callback'=>'manang_sanitize_text',
            ) );

            $wp_customize->add_control( new manang_Google_Font_Dropdown_Custom_Control($wp_customize, 'heading_font_family', array(
            'label'      => __( 'Heading Font Family', 'manang' ),
            'section'    => 'manang_font_section',
            'settings'   => 'manang_option[heading_font_family]',
            ) ) );

            /*Heading font color */
            $wp_customize->add_setting(
            'manang_option[heading_font_color]',
            array(
            'type'    => 'option',
            'default' => '',
            'sanitize_callback'=>'manang_sanitize_checkbox',
            'capability'        => 'edit_theme_options',
            )
            );

            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_font_color', array(
            'label'      => __( 'Heading Text Color', 'manang' ),
            'section'    => 'manang_font_section',
            'settings'   => 'manang_option[heading_font_color]',
            ) ) );

            /*Widget font family*/
            $wp_customize->add_setting( 'manang_option[widget_font_family]', array(
            'type'    => 'option',
            'default' => '',
            'sanitize_callback'=>'manang_sanitize_text',
            ) );

            $wp_customize->add_control( new manang_Google_Font_Dropdown_Custom_Control($wp_customize, 'widget_font_family', array(
            'label'      => __( 'Widget Title Font Family', 'manang' ),
            'section'    => 'manang_font_section',
            'settings'   => 'manang_option[widget_font_family]',
            ) ) );

            /*Widget font color */
            $wp_customize->add_setting( 'manang_option[widget_font_color]', array(
            'type'    => 'option',
            'default' => '',
            'sanitize_callback'=>'manang_sanitize_checkbox',
            ) );

            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'widget_font_color', array(
            'label'      => __( 'Widget Title Font Family', 'manang' ),
            'section'    => 'manang_font_section',
            'settings'   => 'manang_option[widget_font_color]',
            ) ) );

            /*Navigation font family*/
            $wp_customize->add_setting( 'manang_option[navigation_font_family]', array(
            'type'    => 'option',
            'default' => '',
            'sanitize_callback'=>'manang_sanitize_text',
            ) );

            $wp_customize->add_control( new manang_Google_Font_Dropdown_Custom_Control($wp_customize, 'navigation_font_family', array(
            'label'      => __( 'Navigation Font Family', 'manang' ),
            'section'    => 'manang_font_section',
            'settings'   => 'manang_option[navigation_font_family]',
            ) ) );

            /*Navigation font color */
            $wp_customize->add_setting( 'manang_option[navigation_font_color]', array(
            'type'    => 'option',
            'default' => '',
            'sanitize_callback'=>'manang_sanitize_checkbox',
            ) );

            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_font_color', array(
            'label'      => __( 'Navigation Text Color', 'manang' ),
            'section'    => 'manang_font_section',
            'settings'   => 'manang_option[navigation_font_color]',
            ) ) );

      }

 	add_action( 'customize_register', 'manang_font_customize_register' );
endif;