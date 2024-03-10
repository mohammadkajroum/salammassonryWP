<?php
/**
 * Default customizer values.
 *
 * @package Vidcast
 */
if (!function_exists('vidcast_get_default_customizer_values')) :
    /**
     * Get default customizer values.
     *
     * @return array Default customizer values.
     * @since 1.0.0
     *
     */
    function vidcast_get_default_customizer_values()
    {

        $defaults = array();

        $defaults['background_color'] = 'ffffff';

        // header image section
        $defaults['enable_header_bg_overlay'] = false;
        $defaults['header_image_size'] = 'none';

        //Site title options
        $defaults['hide_title'] = false;
        $defaults['hide_tagline'] = false;
        $defaults['site_title_text_size'] = 32;
        $defaults['site_tagline_text_size'] = 18;

        // General options
        $defaults['enable_cursor_dot_outline'] = false;
        $defaults['site_fallback_image'] = get_template_directory_uri() . '/assets/images/no-image.jpg';

        $defaults['show_preloader'] = true;
        $defaults['preloader_style'] = 'theme-preloader-spinner-4';
        $defaults['show_progressbar'] = false;
        $defaults['progressbar_position'] = 'top';
        $defaults['progressbar_color'] = '#f7775e';
        // header full page add
        $defaults['ed_header_ad'] = false;
        $defaults['ed_header_type'] = 'welcome-banner-default';
        $defaults['advertisement_section_title'] = esc_html__('Welcome Advertisement Message', 'vidcast');

        // Top bar.
        $defaults['top_bar_bg_color'] = '#000000';
        $defaults['top_bar_text_color'] = '#fff';

        // Header
        $defaults['header_bg_color'] = '#ffffff';
        $defaults['header_style'] = 'header_style_1';
        $defaults['enable_top_nav'] = true;
        $defaults['enable_sticky_widget_area'] = false;
        $defaults['enable_fix_navigation_area'] = false;

        $defaults['enable_search_on_header'] = true;
        $defaults['header_search_btn_style'] = 'style_1';
        $defaults['enable_mini_cart_header'] = true;
        $defaults['enable_woo_my_account'] = true;
        $defaults['enable_sticky_menu'] = true;

        // shop page
        $defaults['enable_shop_section'] = true;
        $defaults['shop_post_title'] = __('Shop Now', 'vidcast');
        $defaults['shop_post_description'] = '';
        $defaults['shop_number_of_column'] = 4;
        $defaults['shop_number_of_product'] = 4;
        $defaults['shop_select_product_from'] = 'recent-products';
        $defaults['select_product_category'] = '';
        $defaults['shop_post_button_text'] = __('Shop Now', 'vidcast');

        // Front Page
        $defaults['front_page_enable_sidebar'] = false;
        $defaults['hide_front_page_sidebar_mobile'] = false;
        $defaults['front_page_layout'] = 'right-sidebar';

        // Front Page category
        $defaults['enable_category_section'] = false;
        $defaults['number_of_category'] = '3';
        $defaults['category_post_title'] = __('Welcome to BlogAuthor', 'vidcast');

        // front page banner sectiion
        $defaults['enable_banner_section'] = true;
        $defaults['enable_banner_overlay'] = true;
        $defaults['number_of_slider_post'] = 4;
        $defaults['banner_section_cat'] = '';
        $defaults['enable_banner_tag_meta'] = true;
        $defaults['enable_banner_cat_meta'] = true;
        $defaults['enable_banner_post_description'] = true;
        $defaults['enable_banner_author_meta'] = true;
        $defaults['enable_banner_date_meta'] = true;
        $defaults['banner_button_text'] = __('Stream Now', 'vidcast');


        // archive options
        $defaults['global_sidebar_layout'] = 'right-sidebar';
        $defaults['hide_global_sidebar_mobile'] = false;
        $defaults['excerpt_length'] = 25;
        $defaults['enable_excerpt_read_more'] = true;
        $defaults['excerpt_read_more'] = __('[Read More...]', 'vidcast');


        // Single options
        $defaults['single_sidebar_layout'] = 'right-sidebar';
        $defaults['hide_single_sidebar_mobile'] = false;
        $defaults['single_post_meta'] = array('author', 'date', 'comment', 'category', 'tags');

        $defaults['show_author_info'] = true;
        $defaults['show_sticky_article_navigation'] = false;

        $defaults['show_related_posts'] = true;
        $defaults['related_posts_text'] = __('You May Also Like', 'vidcast');
        $defaults['no_of_related_posts'] = 3;
        $defaults['related_posts_orderby'] = 'date';
        $defaults['related_posts_order'] = 'desc';
        $defaults['author_posts_orderby'] = 'date';
        $defaults['author_posts_order'] = 'desc';

        $defaults['show_author_posts'] = true;
        $defaults['author_posts_text'] = __('More From Author', 'vidcast');
        $defaults['no_of_author_posts'] = 3;

        // Archive
        $defaults['archive_style'] = 'archive_style_1';
        $defaults['archive_post_meta_1'] = array('author', 'date', 'comment', 'category', 'tags');
        $defaults['archive_post_meta_2'] = array('author', 'date', 'category');
        $defaults['archive_post_meta_3'] = array('author', 'date', 'category');
        $defaults['archive_post_meta_4'] = array('category');

        // pagination
        $defaults['pagination_type'] = 'default';

        // readtime option
        $defaults['words_per_minute'] = 200;

        // footer related post
        $defaults['enable_footer_recommended_post_section'] = true;
        $defaults['select_number_of_post'] = 6;
        $defaults['select_number_of_col'] = 'column-4';
        $defaults['footer_recommended_post_title'] = esc_html__('You May Also Like:', 'vidcast');
        $defaults['enable_category_meta'] = false;
        $defaults['select_font_size'] = 'entry-title-xsmall';
        $defaults['select_image_size'] = 'featured-media-medium';
        $defaults['enable_post_excerpt'] = false;
        $defaults['enable_date_meta'] = true;
        $defaults['enable_author_meta'] = false;
        $defaults['enable_view_count'] = true;
        $defaults['enable_social_share'] = true;
        $defaults['select_cat_for_footer_recommended_post'] = '';

        /*Footer*/
        $defaults['footer_column_layout'] = 'footer_layout_1';
        $defaults['enable_footer_sticky'] = false;
        $defaults['enable_footer_image_overlay'] = false;
        $defaults['copyright_text'] = esc_html__('Copyright &copy;', 'vidcast');
        $defaults['copyright_date_format'] = 'Y';
        $defaults['enable_footer_nav'] = false;
        $defaults['enable_footer_social_nav'] = false;
        $defaults['enable_scroll_to_top'] = true;

        $defaults['footer_widgetarea_bg_color'] = '#000';
        $defaults['footer_widgetarea_text_color'] = '#fff';
        $defaults['footer_middlearea_bg_color'] = '#000';
        $defaults['footer_middlearea_text_color'] = '#fff';
        $defaults['footer_credit_bg_color'] = '#000';
        $defaults['footer_credit_text_color'] = '#fff';

        $defaults['enable_facebook'] = true;
        $defaults['enable_twitter'] = true;
        $defaults['enable_pinterest'] = true;
        $defaults['enable_linkedin'] = false;
        $defaults['enable_telegram'] = false;
        $defaults['enable_reddit'] = true;
        $defaults['enable_stumbleupon'] = false;
        $defaults['enable_whatsapp'] = true;
        $defaults['enable_email'] = false;

        $defaults = apply_filters('vidcast_default_customizer_values', $defaults);
        return $defaults;
    }
endif;