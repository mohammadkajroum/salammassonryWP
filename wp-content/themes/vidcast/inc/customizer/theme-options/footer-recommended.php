<?php
/**/
$wp_customize->add_section(
    'footer_recommended_post_section',
    array(
        'title'      => __( 'Footer Related Post', 'vidcast' ),
        'panel'      => 'vidcast_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'vidcast_options[enable_footer_recommended_post_section]',
    array(
        'default'           => $default_options['enable_footer_recommended_post_section'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_footer_recommended_post_section]',
    array(
        'label'   => __( 'Enable Footer Related Post Section', 'vidcast' ),
        'section' => 'footer_recommended_post_section',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[footer_recommended_post_title]',
    array(
        'default'           => $default_options['footer_recommended_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'vidcast_options[footer_recommended_post_title]',
    array(
        'label'    => __( 'Footer Recoommended Posts Title', 'vidcast' ),
        'section'  => 'footer_recommended_post_section',
        'type'     => 'text',
    )
);


$wp_customize->add_setting(
    'vidcast_options[select_cat_for_footer_recommended_post]',
    array(
        'default'           => $default_options['select_cat_for_footer_recommended_post'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[select_cat_for_footer_recommended_post]',
    array(
        'label'   => __( 'Choose Footer Related Post Category', 'vidcast' ),
        'section' => 'footer_recommended_post_section',
            'type'        => 'select',
        'choices'     => vidcast_post_category_list(),
    )
);


$wp_customize->add_setting(
    'vidcast_options[select_number_of_post]',
    array(
        'default'           => $default_options['select_number_of_post'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'vidcast_sanitize_positive_integer',
    )
);
$wp_customize->add_control(
    'vidcast_options[select_number_of_post]',
    array(
        'label'       => __( 'Select Number of Post', 'vidcast' ),
        'section'     => 'footer_recommended_post_section',
        'type'        => 'number',
        'input_attrs' => array('min' => 3, 'max' => 12, 'style' => 'width: 150px;'),
        )
);

$wp_customize->add_setting(
    'vidcast_options[select_number_of_col]',
    array(
        'default'           => $default_options['select_number_of_col'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[select_number_of_col]',
    array(
        'label'       => __( 'Select Number of Col', 'vidcast' ),
        'section'     => 'footer_recommended_post_section',
        'type'        => 'select',
        'choices' => array(
            'column-4'  => __('Three Column Layout', 'vidcast'),
            'column-3'  => __('Four Column Layout', 'vidcast'),
        )
    )
);

$wp_customize->add_setting(
    'vidcast_options[select_font_size]',
    array(
        'default'           => $default_options['select_font_size'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[select_font_size]',
    array(
        'label'       => __( 'Select Font Size', 'vidcast' ),
        'section'     => 'footer_recommended_post_section',
        'type'        => 'select',
        'choices' => array(
            'entry-title-big'  => __('Big', 'vidcast'),
            'entry-title-medium'  => __('Medium', 'vidcast'),
            'entry-title-small'   => __('Small', 'vidcast'),
            'entry-title-xsmall'   => __('Extra Small', 'vidcast'),
        )
    )
);

$wp_customize->add_setting(
    'vidcast_options[select_image_size]',
    array(
        'default'           => $default_options['select_image_size'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[select_image_size]',
    array(
        'label'       => __( 'Select Image Size', 'vidcast' ),
        'section'     => 'footer_recommended_post_section',
        'type'        => 'select',
        'choices' => array(
            'featured-media-medium'  => __('Medium', 'vidcast'),
            'featured-media-large'   => __('Large', 'vidcast'),
            'featured-media-big'  => __('Big', 'vidcast'),
        )
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_category_meta]',
    array(
        'default'           => $default_options['enable_category_meta'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_category_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'vidcast' ),
        'section' => 'footer_recommended_post_section',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_post_excerpt]',
    array(
        'default'           => $default_options['enable_post_excerpt'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_post_excerpt]',
    array(
        'label'   => __( 'Enable Post Excerpt Meta', 'vidcast' ),
        'section' => 'footer_recommended_post_section',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'vidcast_options[enable_date_meta]',
    array(
        'default'           => $default_options['enable_date_meta'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_date_meta]',
    array(
        'label'   => __( 'Enable Date Meta', 'vidcast' ),
        'section' => 'footer_recommended_post_section',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_author_meta]',
    array(
        'default'           => $default_options['enable_author_meta'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'vidcast' ),
        'section' => 'footer_recommended_post_section',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_view_count]',
    array(
        'default'           => $default_options['enable_view_count'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_view_count]',
    array(
        'label'   => __( 'Enable View Count', 'vidcast' ),
        'section' => 'footer_recommended_post_section',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_social_share]',
    array(
        'default'           => $default_options['enable_social_share'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_social_share]',
    array(
        'label'   => __( 'Enable View Count', 'vidcast' ),
        'section' => 'footer_recommended_post_section',
        'type'    => 'checkbox',
    )
);
