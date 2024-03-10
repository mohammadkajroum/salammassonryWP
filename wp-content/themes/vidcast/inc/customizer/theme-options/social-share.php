<?php
/**
 * Social Share Settings.
 *
 * @package Vidcast
**/
// Layout Section.
$wp_customize->add_section( 'social_share',
	array(
	'title'      => esc_html__( 'Social Share Settings', 'vidcast' ),
	'capability' => 'edit_theme_options',
	'panel'      => 'vidcast_option_panel',
	)
);

$wp_customize->add_setting(
    'vidcast_options[enable_facebook]',
    array(
        'default'           => $default_options['enable_facebook'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_facebook]',
    array(
        'label'   => __( 'Enable Facebook', 'vidcast' ),
        'section' => 'social_share',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'vidcast_options[enable_twitter]',
    array(
        'default'           => $default_options['enable_twitter'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_twitter]',
    array(
        'label'   => __( 'Enable Twitter', 'vidcast' ),
        'section' => 'social_share',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'vidcast_options[enable_pinterest]',
    array(
        'default'           => $default_options['enable_pinterest'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_pinterest]',
    array(
        'label'   => __( 'Enable Pinterest', 'vidcast' ),
        'section' => 'social_share',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_linkedin]',
    array(
        'default'           => $default_options['enable_linkedin'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_linkedin]',
    array(
        'label'   => __( 'Enable LinkedIn', 'vidcast' ),
        'section' => 'social_share',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'vidcast_options[enable_telegram]',
    array(
        'default'           => $default_options['enable_telegram'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_telegram]',
    array(
        'label'   => __( 'Enable Telegram', 'vidcast' ),
        'section' => 'social_share',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_reddit]',
    array(
        'default'           => $default_options['enable_reddit'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_reddit]',
    array(
        'label'   => __( 'Enable Reddit', 'vidcast' ),
        'section' => 'social_share',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_stumbleupon]',
    array(
        'default'           => $default_options['enable_stumbleupon'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_stumbleupon]',
    array(
        'label'   => __( 'Enable Stumbleupon', 'vidcast' ),
        'section' => 'social_share',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_whatsapp]',
    array(
        'default'           => $default_options['enable_whatsapp'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_whatsapp]',
    array(
        'label'   => __( 'Enable Whatsapp', 'vidcast' ),
        'section' => 'social_share',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_email]',
    array(
        'default'           => $default_options['enable_email'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_email]',
    array(
        'label'   => __( 'Enable Email', 'vidcast' ),
        'section' => 'social_share',
        'type'    => 'checkbox',
    )
);
