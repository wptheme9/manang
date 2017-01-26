<?php
    $wp_customize->add_setting(
        'manang_option[contact_check]',
        array(
        'default'=>'1',
        'type'=>'option',
        'capability'=>'edit_theme_options',
        'sanitize_callback'=>'cpm_framework_sanitize_checkbox',
        )
    );
    $wp_customize->add_control( 'contact_check', array(
        'label'        => __( 'Enable Contact Form in One Page template', 'manang' ),
        'type'=>'checkbox',
        'section'    => 'contact_page',
        'settings'   => 'manang_option[contact_check]'
    ) );

    $wp_customize->add_setting(
        'manang_option[contact_map]',
        array(
            'type'    => 'option',
            'default'=>'',
            'capability' => 'edit_theme_options',
            'sanitize_callback'=>'cpm_framework_sanitize_checkbox',
        )
    );
    $wp_customize->add_control( 'contact_map', array(
        'label'        => __( 'Add Map Source', 'manang' ),
        'type'=>'textarea',
        'section'    => 'contact_page',
        'settings'   => 'manang_option[contact_map]'
    ) );

    $wp_customize->add_setting('manang_option[contact_title]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'esc_attr',
                'default' => ''
                )
    );
    $wp_customize->add_control('manang_option[contact_title]',
            array(
                'type'    => 'textarea',
                'label'   => esc_html__( 'Add Contact Title', 'manang' ),
                'section' => 'contact_page',
                'settings'=> 'manang_option[contact_title]'
                )
    );

    $wp_customize->add_setting('manang_option[contact_address]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'esc_attr',
                'default' => ''
                )
    );
    $wp_customize->add_control('manang_option[contact_address]',
            array(
                'type'    => 'text',
                'label'   => esc_html__( 'Add Address', 'manang' ),
                'section' => 'contact_page',
                'settings'=> 'manang_option[contact_address]'
                )
    );

    $wp_customize->add_setting('manang_option[contact_phone]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'esc_html',
                'default' => ''
                )
    );
    $wp_customize->add_control('manang_option[contact_phone]',
            array(
                'type'    => 'text',
                'label'   => esc_html__( 'Add Phone Number', 'manang' ),
                'section' => 'contact_page',
                'settings'=> 'manang_option[contact_phone]'
                )
    );

    $wp_customize->add_setting('manang_option[contact_mobile]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'esc_html',
                'default' => ''
                )
    );
    $wp_customize->add_control('manang_option[contact_mobile]',
            array(
                'type'    => 'text',
                'label'   => esc_html__( 'Add Mobile/Skype', 'manang' ),
                'section' => 'contact_page',
                'settings'=> 'manang_option[contact_mobile]'
                )
    );


    $wp_customize->add_setting('manang_option[contact_email]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'esc_attr',
                'default' => ''
                )
    );
    $wp_customize->add_control('manang_option[contact_email]',
            array(
                'type'    => 'text',
                'label'   => esc_html__( 'Add Email', 'manang' ),
                'section' => 'contact_page',
                'settings'=> 'manang_option[contact_email]'
                )
    );

    $wp_customize->add_setting('manang_option[contact_web]',
            array(
                'type'    => 'option',
                'sanitize_callback' => 'esc_attr',
                'default' => ''
                )
    );
    $wp_customize->add_control('manang_option[contact_web]',
            array(
                'type'    => 'text',
                'label'   => esc_html__( 'Add Web Url', 'manang' ),
                'section' => 'contact_page',
                'settings'=> 'manang_option[contact_web]'
                )
    );