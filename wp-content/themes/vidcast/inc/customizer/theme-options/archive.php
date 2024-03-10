<?php
$wp_customize->add_section(
    'archive_options' ,
    array(
        'title' => __( 'Archive Options', 'vidcast' ),
        'panel' => 'vidcast_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'vidcast_options[global_sidebar_layout]',
    array(
        'default'           => $default_options['global_sidebar_layout'],
        'sanitize_callback' => 'vidcast_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Vidcast_Radio_Image_Control(
        $wp_customize,
        'vidcast_options[global_sidebar_layout]',
        array(
            'label' => __( 'Global Sidebar Layout', 'vidcast' ),
            'section' => 'archive_options',
            'choices' => vidcast_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'vidcast_options[hide_global_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_global_sidebar_mobile'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[hide_global_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Global Sidebar on Mobile', 'vidcast' ),
        'section'     => 'archive_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_section_seperator_archive_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Vidcast_Seperator_Control(
        $wp_customize,
        'vidcast_section_seperator_archive_1',
        array(
            'settings' => 'vidcast_section_seperator_archive_1',
            'section' => 'archive_options',
        )
    )
);

/* Archive Style */
$wp_customize->add_setting(
    'vidcast_options[archive_style]',
    array(
        'default'           => $default_options['archive_style'],
        'sanitize_callback' => 'vidcast_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Vidcast_Radio_Image_Control(
        $wp_customize,
        'vidcast_options[archive_style]',
        array(
            'label'	=> __( 'Archive Style', 'vidcast' ),
            'section' => 'archive_options',
            'choices' => vidcast_get_archive_layouts()
        )
    )
);

$wp_customize->add_setting(
    'vidcast_section_seperator_archive_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Vidcast_Seperator_Control(
        $wp_customize,
        'vidcast_section_seperator_archive_2',
        array(
            'settings' => 'vidcast_section_seperator_archive_2',
            'section' => 'archive_options',
        )
    )
);

/* Archive Meta */
$wp_customize->add_setting(
    'vidcast_options[archive_post_meta_1]',
    array(
        'default'           => $default_options['archive_post_meta_1'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Vidcast_Checkbox_Multiple(
        $wp_customize,
        'vidcast_options[archive_post_meta_1]',
        array(
            'label'	=> __( 'Archive Post Meta', 'vidcast' ),
            'description'	=> __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'vidcast' ),
            'section' => 'archive_options',
            'choices' => array(
                'author' => __( 'Author', 'vidcast' ),
                'date' => __( 'Date', 'vidcast' ),
                'comment' => __( 'Comment', 'vidcast' ),
                'category' => __( 'Category', 'vidcast' ),
                'tags' => __( 'Tags', 'vidcast' ),
            ),
            'active_callback' => 'vidcast_archive_poost_meta_1',
        )

    )
);
/* Archive Meta */
$wp_customize->add_setting(
    'vidcast_options[archive_post_meta_2]',
    array(
        'default'           => $default_options['archive_post_meta_2'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Vidcast_Checkbox_Multiple(
        $wp_customize,
        'vidcast_options[archive_post_meta_2]',
        array(
            'label' => __( 'Archive Post Meta', 'vidcast' ),
            'description'   => __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'vidcast' ),
            'section' => 'archive_options',
            'choices' => array(
                'author' => __( 'Author', 'vidcast' ),
                'date' => __( 'Date', 'vidcast' ),
                'category' => __( 'Category', 'vidcast' ),
            ),
            'active_callback' => 'vidcast_archive_poost_meta_2',

        )
    )
);

/* Archive Meta */
$wp_customize->add_setting(
    'vidcast_options[archive_post_meta_3]',
    array(
        'default'           => $default_options['archive_post_meta_3'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Vidcast_Checkbox_Multiple(
        $wp_customize,
        'vidcast_options[archive_post_meta_3]',
        array(
            'label' => __( 'Archive Post Meta', 'vidcast' ),
            'description'   => __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'vidcast' ),
            'section' => 'archive_options',
            'choices' => array(
                'author' => __( 'Author', 'vidcast' ),
                'date' => __( 'Date', 'vidcast' ),
                'category' => __( 'Category', 'vidcast' ),
            ),
            'active_callback' => 'vidcast_archive_poost_meta_3',

        )
    )
);

/* Archive Meta */
$wp_customize->add_setting(
    'vidcast_options[archive_post_meta_4]',
    array(
        'default'           => $default_options['archive_post_meta_4'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Vidcast_Checkbox_Multiple(
        $wp_customize,
        'vidcast_options[archive_post_meta_4]',
        array(
            'label' => __( 'Archive Post Meta', 'vidcast' ),
            'description'   => __( 'Please select which post meta data you would like to appear on the listings for archived posts.', 'vidcast' ),
            'section' => 'archive_options',
            'choices' => array(
                'category' => __( 'Category', 'vidcast' ),
            ),
            'active_callback' => 'vidcast_archive_poost_meta_4',

        )
    )
);

$wp_customize->add_setting(
    'vidcast_section_seperator_archive_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Vidcast_Seperator_Control(
        $wp_customize,
        'vidcast_section_seperator_archive_3',
        array(
            'settings' => 'vidcast_section_seperator_archive_3',
            'section' => 'archive_options',
        )
    )
);

$wp_customize->add_setting('vidcast_options[excerpt_length]',
    array(
        'default'           => $default_options['excerpt_length'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'vidcast_sanitize_number_range',
    )
);
$wp_customize->add_control('vidcast_options[excerpt_length]',
    array(
        'label'       => esc_html__('Excerpt Length', 'vidcast'),
        'description'       => esc_html__( 'Max number of words. Set it to 0 to disable. (step-1)', 'vidcast' ),
        'section'     => 'archive_options',
        'type'        => 'range',
        'input_attrs' => array(
                       'min'   => 0,
                       'max'   => 100,
                       'step'   => 1,
                    ),
    )
);

$wp_customize->add_setting(
    'vidcast_options[enable_excerpt_read_more]',
    array(
        'default'           => $default_options['enable_excerpt_read_more'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_excerpt_read_more]',
    array(
        'label'       => __( 'Enable Read More on Excerpt', 'vidcast' ),
        'section'     => 'archive_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[excerpt_read_more]',
    array(
        'default'           => $default_options['excerpt_read_more'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'vidcast_options[excerpt_read_more]',
    array(
        'label'    => __( 'Excerpt Readmore Button Text', 'vidcast' ),
        'section'  => 'archive_options',
        'type'     => 'text',
    )
);