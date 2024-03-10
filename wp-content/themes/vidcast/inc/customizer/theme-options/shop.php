<?php
$wp_customize->add_section(
    'home_page_shop_option',
    array(
        'title'      => __( 'Shop  Section Options', 'vidcast' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'vidcast_options[enable_shop_section]',
    array(
        'default'           => $default_options['enable_shop_section'],
        'sanitize_callback' => 'vidcast_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'vidcast_options[enable_shop_section]',
    array(
        'label'   => __( 'Enable Shop Section', 'vidcast' ),
        'section' => 'home_page_shop_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'vidcast_options[shop_post_title]',
    array(
        'default'           => $default_options['shop_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'vidcast_options[shop_post_title]',
    array(
        'label'    => __( 'Shop Post Title', 'vidcast' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'vidcast_options[shop_post_description]',
    array(
        'default'           => $default_options['shop_post_description'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'vidcast_options[shop_post_description]',
    array(
        'label'    => __( 'Shop Post Description', 'vidcast' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'textarea',
    )
);

$wp_customize->add_setting(
    'vidcast_options[shop_select_product_from]',
    array(
        'default'           => $default_options['shop_select_product_from'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[shop_select_product_from]',
    array(
        'label'       => __( 'Select Product From', 'vidcast' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            'custom'            => __('Custom Select', 'vidcast'),
            'recent-products'   => __('Recent Products', 'vidcast'),
            'popular-products'  => __('Popular Products', 'vidcast'),
            'sale-products'     => __('Sale Products', 'vidcast'),
        )
    )
);


$wp_customize->add_setting(
    'vidcast_options[select_product_category]',
    array(
        'default'           => $default_options['select_product_category'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[select_product_category]',
    array(
        'label'   => __( 'Select Product Category', 'vidcast' ),
        'section' => 'home_page_shop_option',
        'type'        => 'select',
        'choices'     => vidcast_woocommerce_product_cat(),
        'active_callback' => 'vidcast_shop_select_product_from'
    )
);

$wp_customize->add_setting(
    'vidcast_options[shop_number_of_column]',
    array(
        'default'           => $default_options['shop_number_of_column'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[shop_number_of_column]',
    array(
        'label'       => __( 'Select Number Of Column', 'vidcast' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'vidcast'),
            '3'  => __('3', 'vidcast'),
            '4'  => __('4', 'vidcast'),
        )
    )
);

$wp_customize->add_setting(
    'vidcast_options[shop_number_of_product]',
    array(
        'default'           => $default_options['shop_number_of_product'],
        'sanitize_callback' => 'vidcast_sanitize_select',
    )
);
$wp_customize->add_control(
    'vidcast_options[shop_number_of_product]',
    array(
        'label'       => __( 'Select Number Of Product', 'vidcast' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'vidcast'),
            '3'  => __('3', 'vidcast'),
            '4'  => __('4', 'vidcast'),
            '5'  => __('5', 'vidcast'),
            '6'  => __('6', 'vidcast'),
            '7'  => __('7', 'vidcast'),
            '8'  => __('8', 'vidcast'),
            '9'  => __('9', 'vidcast'),
            '10'  => __('10', 'vidcast'),
            '11'  => __('11', 'vidcast'),
            '12'  => __('12', 'vidcast'),
        )
    )
);

$wp_customize->add_setting(
    'vidcast_options[shop_post_button_text]',
    array(
        'default'           => $default_options['shop_post_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'vidcast_options[shop_post_button_text]',
    array(
        'label'    => __( 'Shop section Button Text', 'vidcast' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);
$wp_customize->add_setting(
    'vidcast_options[shop_post_button_url]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'vidcast_options[shop_post_button_url]',
    array(
        'label'           => __( 'Button Link', 'vidcast' ),
        'section'         => 'home_page_shop_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'vidcast' ),
    )
);