<?php
if (!defined('ABSPATH')) {
    exit;
}
class Vidcast_Slider_Widget extends Vidcast_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'vidcast-widget-slider';
        $this->widget_description = __("Displays featured posts with an image on slider", 'vidcast');
        $this->widget_id = 'Vidcast_Slider_Widget';
        $this->widget_name = __('Vidcast: Slider Widget', 'vidcast');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'vidcast'),
            ),
            'category' => array(
                'type' => 'dropdown-taxonomies',
                'label' => __('Select Category', 'vidcast'),
                'desc' => __('Leave empty if you don\'t want the posts to be category specific', 'vidcast'),
                'args' => array(
                    'taxonomy' => 'category',
                    'class' => 'widefat',
                    'hierarchical' => true,
                    'show_count' => 1,
                    'show_option_all' => __('&mdash; Select &mdash;', 'vidcast'),
                ),
            ),
            'number' => array(
                'type' => 'number',
                'step' => 1,
                'min' => 2,
                'max' => 12,
                'std' => 6,
                'label' => __('Number of posts to show', 'vidcast'),
            ),
            'show_category' => array(
                'type' => 'checkbox',
                'label' => __('Show Category', 'vidcast'),
                'std' => true,
            ),
            'show_description' => array(
                'type' => 'checkbox',
                'label' => __('Show Description', 'vidcast'),
                'std' => true,
            ),
            'show_author' => array(
                'type' => 'checkbox',
                'label' => __('Show Author', 'vidcast'),
                'std' => true,
            ),
            'show_date' => array(
                'type' => 'checkbox',
                'label' => __('Show Date', 'vidcast'),
                'std' => true,
            ),
            'show_share' => array(
                'type' => 'checkbox',
                'label' => __('Show Share', 'vidcast'),
                'std' => true,
            ),
            'show_post_view' => array(
                'type' => 'checkbox',
                'label' => __('Show Post View', 'vidcast'),
                'std' => true,
            ),
            'date_format' => array(
                'type' => 'select',
                'label' => __('Date Format', 'vidcast'),
                'options' => array(
                    'format_1' => __('Format 1', 'vidcast'),
                    'format_2' => __('Format 2', 'vidcast'),
                ),
                'std' => 'format_2',
            ),
            'show_overlay' => array(
                'type' => 'checkbox',
                'label' => __('Show Overlay', 'vidcast'),
                'std' => true,
            ),
            'button_text' => array(
                'type' => 'Button Text',
                'label' => __('Button Text', 'vidcast'),
            ),
        );
        parent::__construct();
    }
    /**
     * Query the posts and return them.
     * @param array $args
     * @param array $instance
     * @return WP_Query
     */
    public function get_posts($args, $instance)
    {
        $number = !empty($instance['number']) ? absint($instance['number']) : $this->settings['number']['std'];
        $query_args = array(
            'posts_per_page' => $number,
            'post_status' => 'publish',
            'no_found_rows' => 1,
            'ignore_sticky_posts' => 1
        );
        if (!empty($instance['category']) && -1 != $instance['category'] && 0 != $instance['category']) {
            $query_args['tax_query'][] = array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $instance['category'],
            );
        }
        return new WP_Query(apply_filters('Vidcast_Slider_Widget_query_args', $query_args));
    }
    /**
     * Output widget.
     *
     * @param array $args
     * @param array $instance
     * @see WP_Widget
     *
     */
    public function widget($args, $instance)
    {
        ob_start();
        if (($posts = $this->get_posts($args, $instance)) && $posts->have_posts()) {
            echo $args['before_widget'];
            do_action('vidcast_before_slider_widget');
            $site_fallback_image = vidcast_get_option('site_fallback_image');
            $banner_button_text = $instance['button_text'];
            $slider_pagenav = '';
            $banner_overlay = '';
            if ($instance['show_overlay']) {
                $banner_overlay = 'swiper-slide-has-overlay';
            }
            ?>
            <section class="site-section site-banner-section">
                <div class="site-slider-wrapper d-flex">
                    <?php if ($instance['title']) : ?>
                        <header class="section-header site-section-header">
                            <h2 class="site-section-title">
                                <?php echo esc_html($instance['title']); ?>
                            </h2>
                        </header>
                    <?php endif; ?>
                    <div class="site-widget-slider swiper-banner-container swiper-container">
                        <div class="swiper-wrapper">
                            <?php while ($posts->have_posts()): $posts->the_post(); ?>
                                <div class="swiper-slide swiper-hero-slide <?php echo esc_attr($banner_overlay); ?>">
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
                                            <img src="<?php echo esc_url($site_fallback_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="site-banner-description">
                                        <div class="column column-6 column-sm-12">
                                            <div class="entry-meta">
                                                <?php
                                                if ($instance['show_date']) { ?>
                                                    <span class="entry-meta-item entry-posted-on">
                                                        <?php
                                                        $date_format = $instance['date_format'];
                                                        if ('format_1' == $date_format) {
                                                            echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'vidcast'));
                                                        } else {
                                                            echo esc_html(get_the_date());
                                                        }
                                                        ?>
                                                    </span>
                                                <?php } ?>
                                            </div>
                                            <?php the_title('<h3 class="entry-title entry-title-large"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                            <?php
                                            if ($instance['show_description'] && has_excerpt()): ?>
                                                <div class="entry-content entry-content-big">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php elseif ($instance['show_description']): ?>
                                                <div class="entry-content entry-content-big">
                                                    <?php echo esc_html(wp_trim_words(get_the_content(), 50, '...')); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="entry-meta mb-20">
                                                <?php if ($instance['show_author']) {
                                                    vidcast_posted_by();
                                                } ?>
                                                <?php if ($instance['show_post_view']) {
                                                    vidcast_post_view_count();
                                                } ?>
                                            </div>
                                            <?php if (!empty($banner_button_text)) { ?>
                                                    <a href="<?php echo esc_url(get_category_link($instance['category'])); ?>" class="theme-button">
                                                        <span class="button-text"><?php echo esc_html($banner_button_text); ?></span>
                                                    </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $slider_pagenav .= '<div class="swiper-slide swiper-pagination-slide">';
                                $slider_pagenav .= '<figure class="featured-media featured-media-radius featured-media-medium">';
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
                    <div class="site-pagination-panel widget-pagination-panel">
                        <div class="site-widget-pagination swiper-pagination-container  swiper-container">
                            <div class="swiper-wrapper">
                                <?php echo $slider_pagenav; ?>
                            </div>
                            <div class="theme-swiper-control swiper-control">
                                <div class="swiper-button-prev widget-slider-prev"></div>
                                <div class="swiper-button-next widget-slider-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            do_action('vidcast_after_slider_widget');
            echo $args['after_widget'];
        }
        echo ob_get_clean();
    }
}