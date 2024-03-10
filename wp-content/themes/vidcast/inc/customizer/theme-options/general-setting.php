<?php
/*Header Options*/
$wp_customize->add_section(
    'general_settings' ,
    array(
        'title' => __( 'General Settings', 'vidcast' ),
        'panel' => 'vidcast_option_panel',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_cursor_dot_outline]',
    array(
        'default' => $default_options['enable_cursor_dot_outline'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_cursor_dot_outline]',
    array(
        'label' => esc_html__('Enable Cursor Dot Outline', 'vidcast'),
        'section' => 'general_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[site_fallback_image]',
    array(
        'default' => $default_options['site_fallback_image'],
        'sanitize_callback' => 'vidcast_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'vidcast_options[site_fallback_image]',
        array(
            'label' => __('Upload Fallback Image', 'vidcast'),
            'section' => 'general_settings',
        )
    )
);
