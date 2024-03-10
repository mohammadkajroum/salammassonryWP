<?php
$wp_customize->add_section(
    'pagination_options' ,
    array(
        'title' => __( 'Pagination Options', 'vidcast' ),
        'panel' => 'vidcast_option_panel',
    )
);

/* Pagination Type*/
$wp_customize->add_setting(
    'vidcast_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'vidcast' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => __( 'Default (Older / Newer Post)', 'vidcast' ),
            'numeric' => __( 'Numeric', 'vidcast' ),
            'ajax_load_on_click' => __( 'Load more post on click', 'vidcast' ),
            'ajax_load_on_scroll' => __( 'Load more posts on scroll', 'vidcast' ),
        ),
    )
);
