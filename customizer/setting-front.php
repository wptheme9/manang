<?php
        //Sidebar Section
        $wp_customize->add_setting(
                'manang_option[sidebar_layout]',
                array(
                    'type'    =>'option',
                    'sanitize_callback' => 'manang_sanitize_checkbox',
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

    //Custom Mailchimp
     $wp_customize->add_setting(
        'manang_option[newsletter_section_title]',
        array(
            'type'    => 'option',
            'default'=>'',
            'sanitize_callback'=>'manang_sanitize_text',
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
            'sanitize_callback'=>'manang_sanitize_text',
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
            'sanitize_callback'=>'manang_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_mailchimp_api_key', array(
        'label'        => __( 'Add API Key', 'manang' ),
        'type'=>'text',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[mailchimp_api_key]',
        'active_callback' => 'manang_mailchimp_api_key',
    ) );

    $wp_customize->add_setting(
        'manang_option[mailchimp_list_id]',
        array(
            'type'    => 'option',
            'default'=>'',
            'sanitize_callback'=>'manang_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_mailchimp_list_id', array(
        'label'        => __( 'List ID', 'manang' ),
        'type'=>'text',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[mailchimp_list_id]',
        'active_callback' => 'manang_mailchimp_api_key',
    ) );

    $wp_customize->add_setting(
        'manang_option[campaign_api_key]',
        array(
            'type'    => 'option',
            'default'=>'',
            'sanitize_callback'=>'manang_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_campaign_api_key', array(
        'label'        => __( 'Add API Key', 'manang' ),
        'type'=>'text',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[campaign_api_key]',
        'active_callback' => 'manang_mailchimp_api_key',
    ) );


    $wp_customize->add_setting(
        'manang_option[campaign_list_id]',
        array(
            'type'    => 'option',
            'default'=>'',
            'sanitize_callback'=>'manang_sanitize_text',
            'capability'        => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'framework_campaign_list_id', array(
        'label'        => __( 'List ID', 'manang' ),
        'type'=>'text',
        'section'    => 'mailchimp_options',
        'settings'   => 'manang_option[campaign_list_id]',
        'active_callback' => 'manang_mailchimp_api_key',
    ) );

    $wp_customize->add_setting(
        'manang_option[show_hide_fullname]',
        array(
            'type'    => 'option',
            'default'=>1,
            'sanitize_callback'=>'manang_sanitize_checkbox',
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
            'sanitize_callback'=>'manang_sanitize_checkbox',
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