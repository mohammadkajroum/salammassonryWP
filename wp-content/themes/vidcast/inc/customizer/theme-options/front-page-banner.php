<?php
/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'vidcast' ),
        'description' => __( 'Contains all front page settings', 'vidcast'),
        'priority' => 150
    )
);
/**/
$wp_customize->add_section(
    'home_page_banner_option',
    array(
        'title'      => __( 'Main Banner Options', 'vidcast' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'vidcast_options[enable_banner_section]',
    array(
        'default'           => $default_options['enable_banner_section'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_banner_section]',
    array(
        'label'   => __( 'Enable Banner Section', 'vidcast' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[number_of_slider_post]',
    array(
        'default'           => $default_options['number_of_slider_post'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[number_of_slider_post]',
    array(
        'label'       => __( 'Post In Slider', 'vidcast' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'vidcast' ),
            '4' => __( '4', 'vidcast' ),
            '5' => __( '5', 'vidcast' ),
            '6' => __( '6', 'vidcast' ),
        ),
    )
);

$wp_customize->add_setting(
    'vidcast_options[banner_section_cat]',
    array(
        'default'           => $default_options['banner_section_cat'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[banner_section_cat]',
    array(
        'label'   => __( 'Choose Banner Category', 'vidcast' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => vidcast_post_category_list(),
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_banner_post_description]',
    array(
        'default'           => $default_options['enable_banner_post_description'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_banner_post_description]',
    array(
        'label'   => __( 'Enable Post Description', 'vidcast' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_banner_tag_meta]',
    array(
        'default'           => $default_options['enable_banner_tag_meta'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_banner_tag_meta]',
    array(
        'label'   => __( 'Enable Tag Meta', 'vidcast' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_banner_cat_meta]',
    array(
        'default'           => $default_options['enable_banner_cat_meta'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_banner_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'vidcast' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'vidcast_options[enable_banner_author_meta]',
    array(
        'default'           => $default_options['enable_banner_author_meta'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_banner_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'vidcast' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'vidcast_options[enable_banner_date_meta]',
    array(
        'default'           => $default_options['enable_banner_date_meta'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_banner_date_meta]',
    array(
        'label'   => __( 'Enable Date On Banner', 'vidcast' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_banner_overlay]',
    array(
        'default'           => $default_options['enable_banner_overlay'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_banner_overlay]',
    array(
        'label'   => __( 'Enable Banner Overlay', 'vidcast' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[banner_button_text]',
    array(
        'default'           => $default_options['banner_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'vidcast_options[banner_button_text]',
    array(
        'label'    => __( 'Banner Button Text', 'vidcast' ),
        'section'  => 'home_page_banner_option',
        'type'     => 'text',
    )
);
