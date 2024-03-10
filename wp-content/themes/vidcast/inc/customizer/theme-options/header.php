<?php
$wp_customize->add_setting(
    'vidcast_options[enable_header_bg_overlay]',
    array(
        'default'           => $default_options['enable_header_bg_overlay'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_header_bg_overlay]',
    array(
        'label'    => __( 'Enable Image Overlay', 'vidcast' ),
        'section'  => 'header_image',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[header_image_size]',
    array(
        'default'           => $default_options['header_image_size'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[header_image_size]',
    array(
        'label'       => __( 'Select Header Size', 'vidcast' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'vidcast' ),

        'section'     => 'header_image',
        'type'        => 'select',
        'choices'     => array(
            'none' => __( 'Default', 'vidcast' ),
            'small' => __( 'Small', 'vidcast' ),
            'medium' => __( 'Medium', 'vidcast' ),
            'large' => __( 'Large', 'vidcast' ),
        ),
    )
);
/*Header Options*/
$wp_customize->add_section(
    'header_options' ,
    array(
        'title' => __( 'Header Options', 'vidcast' ),
        'panel' => 'vidcast_option_panel',
    )
);

/* Header Style */
$wp_customize->add_setting(
    'vidcast_options[header_style]',
    array(
        'default'           => $default_options['header_style'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[header_style]',
    array(
        'label'       => __( 'Header Style', 'vidcast' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'vidcast' ),

        'section'     => 'header_options',
        'type'        => 'select',
        'choices'     => array(
            'header_style_1' => __( 'Header Style 1', 'vidcast' ),
            'header_style_2' => __( 'Header Style 2', 'vidcast' ),
        ),
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_sticky_widget_area]',
    array(
        'default'           => $default_options['enable_sticky_widget_area'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_sticky_widget_area]',
    array(
        'label'    => __( 'Add Widgets', 'vidcast' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'vidcast_is_header_style_2'
    )
);


$wp_customize->add_setting(
    'vidcast_options[enable_fix_navigation_area]',
    array(
        'default'           => $default_options['enable_fix_navigation_area'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_fix_navigation_area]',
    array(
        'label'    => __( 'Enable sticky during scrolling', 'vidcast' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'vidcast_is_header_style_2'
        
    )
);

$wp_customize->add_setting(
    'vidcast_section_seperator_header_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Vidcast_Seperator_Control(
        $wp_customize,
        'vidcast_section_seperator_header_1',
        array(
            'settings' => 'vidcast_section_seperator_header_1',
            'section' => 'header_options',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'vidcast_options[enable_sticky_menu]',
    array(
        'default'           => $default_options['enable_sticky_menu'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_sticky_menu]',
    array(
        'label'    => __( 'Enable Sticky Menu', 'vidcast' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'vidcast_is_header_style_1'
    )
);


$wp_customize->add_setting(
    'vidcast_section_seperator_header_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Vidcast_Seperator_Control(
        $wp_customize,
        'vidcast_section_seperator_header_2',
        array(
            'settings' => 'vidcast_section_seperator_header_2',
            'section' => 'header_options',
        )
    )
);


if(class_exists( 'WooCommerce' )){
    
    /*Enable Mini Cart Icon on header*/
    $wp_customize->add_setting(
        'vidcast_options[enable_mini_cart_header]',   
        array(
            'default'           => $default_options['enable_mini_cart_header'],
            'sanitize_callback' => 'vidcast_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'vidcast_options[enable_mini_cart_header]',
        array(
            'label'    => __( 'Enable Mini Cart Icon', 'vidcast' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );

    /*Enable Myaccount Link*/
    $wp_customize->add_setting(
        'vidcast_options[enable_woo_my_account]',   
        array(
            'default'           => $default_options['enable_woo_my_account'],
            'sanitize_callback' => 'vidcast_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'vidcast_options[enable_woo_my_account]',
        array(
            'label'    => __( 'Enable My Account Icon', 'vidcast' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );
}