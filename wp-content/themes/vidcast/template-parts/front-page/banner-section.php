<?php
/**
 * Displays Banner Section
 *
 * @package Vidcast
 */
$is_banner_section = vidcast_get_option('enable_banner_section');
$enable_banner_overlay = vidcast_get_option('enable_banner_overlay');
$site_fallback_image = vidcast_get_option('site_fallback_image');
$banner_section_cat = vidcast_get_option('banner_section_cat');
$number_of_slider_post = vidcast_get_option('number_of_slider_post');
$enable_banner_tag_meta = vidcast_get_option('enable_banner_tag_meta');
$enable_banner_cat_meta = vidcast_get_option('enable_banner_cat_meta');
$enable_banner_author_meta = vidcast_get_option('enable_banner_author_meta');
$enable_banner_date_meta = vidcast_get_option('enable_banner_date_meta');
$enable_banner_post_description = vidcast_get_option('enable_banner_post_description');
$banner_button_text = vidcast_get_option('banner_button_text');
$banner_overlay_class = '';
if ($enable_banner_overlay) {
    $banner_overlay_class = 'swiper-slide-has-overlay';
}
?>
<section class="site-section site-banner-section">
    <div class="site-slider-wrapper d-flex">
        <?php
        $slider_pagenav = '';
        $banner_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($number_of_slider_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat)));
        if ($banner_post_query->have_posts()): ?>
            <div class="site-banner-hero swiper-banner-container swiper-container">
                <div class="swiper-wrapper">
                    <?php while ($banner_post_query->have_posts()): $banner_post_query->the_post(); ?>
                        <div class="swiper-slide swiper-hero-slide <?php echo $banner_overlay_class; ?>">
                            <div class="swiper-slide-image hero-slide-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php
                                    the_post_thumbnail('large', array(
                                        'alt' => the_title_attribute(array(
                                            'echo' => false,
                                        )),
                                    ));
                                    ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($site_fallback_image); ?>"
                                         alt="<?php echo esc_attr(get_the_title()); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="site-banner-description">
                                <div class="wrapper">
                                    <div class="column-row">
                                        <div class="column column-6 column-sm-12">
                                            <div class="entry-meta mb-10">
                                                <?php if ($enable_banner_tag_meta) { ?>
                                                    <?php
                                                    $tags_list = get_the_tag_list('', esc_html_x(' ', 'list item separator', 'vidcast'));
                                                    if ($tags_list) {
                                                        /* translators: 1: list of tags. */
                                                        printf('<span class="tags-links hide-on-mobile">' . esc_html__('%1$s', 'vidcast') . '</span>', $tags_list);
                                                    } ?>
                                                <?php } ?>
                                                <?php if ($enable_banner_cat_meta) { ?>
                                                    <span class="entry-categories">
                                                        <?php the_category(' '); ?>
                                                    </span>
                                                <?php } ?>
                                            </div>
                                            <?php the_title('<h3 class="entry-title entry-title-large"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                            <?php
                                            if ($enable_banner_post_description && has_excerpt()): ?>
                                                <div class="entry-content entry-content-big">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php elseif ($enable_banner_post_description): ?>
                                                <div class="entry-content entry-content-big">
                                                    <?php echo esc_html(wp_trim_words(get_the_content(), 30, '...')); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="entry-meta mb-20">
                                                <?php if ($enable_banner_date_meta) {
                                                    vidcast_posted_on();
                                                } ?>
                                                <?php if ($enable_banner_author_meta) {
                                                    vidcast_posted_by();
                                                } ?>
                                            </div>
                                            <?php if (!empty($banner_button_text)) { ?>
                                                    <a href="<?php the_permalink(); ?>" class="theme-button">
                                                        <span class="button-text"><?php echo esc_html($banner_button_text); ?></span>
                                                    </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $slider_pagenav .= '<div class="swiper-slide swiper-pagination-slide">';
                        $slider_pagenav .= '<figure class="featured-media featured-media-radius featured-media-big">';
                        if (has_post_thumbnail()) {
                            $slider_pagenav .= '<img src="' . get_the_post_thumbnail_url(get_the_ID(), 'medium_large') . '">';
                        } else {
                            $slider_pagenav .= '<img src="' . esc_url($site_fallback_image) . '">';
                        }
                        $slider_pagenav .= '</figure>';
                        $slider_pagenav .= '</div>';
                        ?>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="site-pagination-panel banner-pagination-panel">
            <div class="banner-pagination-slider swiper-pagination-container swiper-container">
                <div class="swiper-wrapper">
                    <?php echo $slider_pagenav; ?>
                </div>
                <div class="theme-swiper-control swiper-control">
                    <div class="swiper-button-prev banner-slider-prev"></div>
                    <div class="swiper-button-next banner-slider-next"></div>
                </div>
            </div>
        </div>
    </div>
</section>
