<?php
/**
 * Displays the site header.
 *
 * @package Vidcast
 */

$wrapper_classes = 'site-header theme-site-header';

$header_style = vidcast_get_option('header_style');
$enable_header_bg_overlay = vidcast_get_option('enable_header_bg_overlay');
$header_image_size = vidcast_get_option('header_image_size');
$header_style = vidcast_get_option('header_style');
$header_template = str_replace('header_', '', $header_style);
$header_template = str_replace('_', '-', $header_template);
?>

<?php
if ($enable_header_bg_overlay) {
    $wrapper_classes .= ' header-has-overlay';
}
$wrapper_classes .= ' header-has-height-' . $header_image_size;
if (!empty(get_header_image())) {
    $wrapper_classes .= ' data-bg';
}
?>
<header id="masthead" class="<?php echo esc_attr($wrapper_classes); ?> " <?php if (!empty(get_header_image())) { ?> data-background="<?php echo esc_url(get_header_image()); ?>" <?php } ?> role="banner">
    <?php
    get_template_part('template-parts/header/styles/' . $header_template);
    ?>
</header><!-- #masthead -->
