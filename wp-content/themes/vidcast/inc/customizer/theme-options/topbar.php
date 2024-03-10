<?php
/*Enable Search*/
$wp_customize->add_setting(
    'vidcast_options[enable_search_on_header]',
    array(
        'default'           => $default_options['enable_search_on_header'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_search_on_header]',
    array(
        'label'    => __( 'Enable Search Icon', 'vidcast' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_section_seperator_header_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Vidcast_Seperator_Control(
        $wp_customize,
        'vidcast_section_seperator_header_3',
        array(
            'settings' => 'vidcast_section_seperator_header_3',
            'section' => 'header_options',
        )
    )
);

/* ========== Progressbar Section. ==========*/
$wp_customize->add_section(
    'progressbar_options',
    array(
        'title' => __( 'Progressbar Options', 'vidcast' ),
        'panel' => 'vidcast_option_panel',
    )
);
/*Show progressbar*/
$wp_customize->add_setting(
    'vidcast_options[show_progressbar]',
    array(
        'default'           => $default_options['show_progressbar'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[show_progressbar]',
    array(
        'label'   => __( 'Show Progressbar', 'vidcast' ),
        'section' => 'progressbar_options',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[progressbar_position]',
    array(
        'default'           => $default_options['progressbar_position'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[progressbar_position]',
    array(
        'label'           => __( 'Progressbar Position', 'vidcast' ),
        'section'         => 'progressbar_options',
        'type'            => 'select',
        'choices'         => array(
            'top'    => __( 'Top', 'vidcast' ),
            'bottom' => __( 'Bottom of the browser window', 'vidcast' ),
        ),
        'active_callback' => 'vidcast_is_progressbar_enabled',
    )
);

$wp_customize->add_setting(
    'vidcast_options[progressbar_color]',
    array(
        'default'           => $default_options['progressbar_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'vidcast_options[progressbar_color]',
        array(
            'label'           => __( 'Progressbar Color', 'vidcast' ),
            'section'         => 'progressbar_options',
            'type'            => 'color',
            'active_callback' => 'vidcast_is_progressbar_enabled',
        )
    )
);