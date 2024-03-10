<?php
/*Preloader Options*/
$wp_customize->add_section(
    'preloader_options' ,
    array(
        'title' => __( 'Preloader Options', 'vidcast' ),
        'panel' => 'vidcast_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'vidcast_options[show_preloader]',
    array(
        'default'           => $default_options['show_preloader'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[show_preloader]',
    array(
        'label'    => __( 'Show Preloader', 'vidcast' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[preloader_style]',
    array(
        'default'           => $default_options['preloader_style'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[preloader_style]',
    array(
        'label'       => __( 'Preloader Style', 'vidcast' ),
        'section'     => 'preloader_options',
        'type'        => 'select',
        'choices'     => array(
            'theme-preloader-spinner-1' => __( 'Style 1', 'vidcast' ),
            'theme-preloader-spinner-2' => __( 'Style 2', 'vidcast' ),
            'theme-preloader-spinner-3' => __( 'Style 3', 'vidcast' ),
            'theme-preloader-spinner-4' => __( 'Style 4', 'vidcast' ),
        ),
        'active_callback' => 'vidcast_is_show_preloader',

    )
);
