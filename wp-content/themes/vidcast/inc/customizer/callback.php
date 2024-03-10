<?php
if (!function_exists('vidcast_is_header_style_1')) :
    /**
     * Check if top bar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_is_header_style_1($control)
    {

        if ($control->manager->get_setting('vidcast_options[header_style]')->value() === 'header_style_1') {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('vidcast_is_header_style_2')) :
    /**
     * Check if top bar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_is_header_style_2($control)
    {

        if ($control->manager->get_setting('vidcast_options[header_style]')->value() === 'header_style_2') {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('vidcast_is_always_dark_mode')) :
    /**
     * Check if top bar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_is_always_dark_mode($control)
    {

        if ($control->manager->get_setting('vidcast_options[enable_always_dark_mode]')->value() === false) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('vidcast_is_show_preloader')) :
    /**
     * Check if top bar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_is_show_preloader($control)
    {

        if ($control->manager->get_setting('vidcast_options[show_preloader]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('vidcast_shop_select_product_from')) :
    /**
     * Check if author Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_shop_select_product_from($control)
    {
        if ($control->manager->get_setting('vidcast_options[shop_select_product_from]')->value() === 'custom') {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('vidcast_is_progressbar_enabled')) :
    /**
     * Check if progressbar is enabled
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_is_progressbar_enabled($control)
    {

        if ($control->manager->get_setting('vidcast_options[show_progressbar]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;


if (!function_exists('vidcast_is_related_posts_enabled')) :
    /**
     * Check if related Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_is_related_posts_enabled($control)
    {
        if ($control->manager->get_setting('vidcast_options[show_related_posts]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('vidcast_is_author_posts_enabled')) :
    /**
     * Check if author Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_is_author_posts_enabled($control)
    {
        if ($control->manager->get_setting('vidcast_options[show_author_posts]')->value() === true) {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('vidcast_archive_poost_meta_1')) :
    /**
     * Check if author Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_archive_poost_meta_1($control)
    {
        if ($control->manager->get_setting('vidcast_options[archive_style]')->value() === 'archive_style_1') {
            return true;
        } else {
            return false;
        }
    }
endif;

if (!function_exists('vidcast_archive_poost_meta_2')) :
    /**
     * Check if author Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_archive_poost_meta_2($control)
    {
        if ($control->manager->get_setting('vidcast_options[archive_style]')->value() === 'archive_style_2') {
            return true;
        } else {
            return false;
        }
    }
endif;


if (!function_exists('vidcast_archive_poost_meta_3')) :
    /**
     * Check if author Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_archive_poost_meta_3($control)
    {
        if ($control->manager->get_setting('vidcast_options[archive_style]')->value() === 'archive_style_3') {
            return true;
        } else {
            return false;
        }
    }
endif;


if (!function_exists('vidcast_archive_poost_meta_4')) :
    /**
     * Check if author Posts is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function vidcast_archive_poost_meta_4($control)
    {
        if ($control->manager->get_setting('vidcast_options[archive_style]')->value() === 'archive_style_4') {
            return true;
        } else {
            return false;
        }
    }
endif;