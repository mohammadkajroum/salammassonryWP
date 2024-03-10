<?php
if (!defined('ABSPATH')) {
    exit;
}

class Vidcast_Carousel_Widget extends Vidcast_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'vidcast-widget-carousel';
        $this->widget_description = __("Displays featured posts with an image on slider", 'vidcast');
        $this->widget_id = 'Vidcast_Carousel_Widget';
        $this->widget_name = __('Vidcast: Carousel Widget', 'vidcast');
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
            'image_size' => array(
                'type' => 'select',
                'label' => __('Image Size', 'vidcast'),
                'options' => array(
                    'featured-media-big' => __('Big', 'vidcast'),
                    'featured-media-medium' => __('Medium', 'vidcast'),
                    'featured-media-small' => __('Small', 'vidcast'),
                ),
                'std' => 'featured-media-medium',
            ),
            'title_size' => array(
                'type' => 'select',
                'label' => __('Title Size', 'vidcast'),
                'options' => array(
                    'entry-title-large' => __('Large', 'vidcast'),
                    'entry-title-big' => __('Big', 'vidcast'),
                    'entry-title-medium' => __('Medium', 'vidcast'),
                    'entry-title-small' => __('Small', 'vidcast'),
                    'entry-title-xsmall' => __('Extra Small', 'vidcast'),
                ),
                'std' => 'entry-title-xsmall',
            ),
            'number' => array(
                'type' => 'number',
                'step' => 1,
                'min' => 2,
                'max' => 12,
                'std' => 8,
                'label' => __('Number of posts to show', 'vidcast'),
            ),
            'slider_per_view' => array(
                'type' => 'number',
                'step' => 1,
                'min' => 2,
                'max' => 5,
                'std' => 4,
                'label' => __('Slides Per View', 'vidcast'),
            ),
            'centered_slides' => array(
                'type' => 'checkbox',
                'label' => __('Centered Slides', 'vidcast'),
                'std' => false,
            ),
            'autoplay' => array(
                'type' => 'checkbox',
                'label' => __('Autoplay', 'vidcast'),
                'std' => true,
            ),
            'space_between' => array(
                'type' => 'select',
                'label' => __('space Between', 'vidcast'),
                'options' => array(
                    '0' => __('0', 'vidcast'),
                    '5' => __('5', 'vidcast'),
                    '10' => __('10', 'vidcast'),
                    '15' => __('15', 'vidcast'),
                    '20' => __('20', 'vidcast'),
                    '25' => __('25', 'vidcast'),
                    '30' => __('30', 'vidcast'),
                ),
                'std' => '30',
            ),
            'pagination' => array(
                'type' => 'checkbox',
                'label' => __('Pagination', 'vidcast'),
                'std' => true,
            ),
            'show_category' => array(
                'type' => 'checkbox',
                'label' => __('Show Category', 'vidcast'),
                'std' => false,
            ),
            'show_author' => array(
                'type' => 'checkbox',
                'label' => __('Show Author', 'vidcast'),
                'std' => false,
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
            'bg_color_option' => array(
                'type' => 'color',
                'label' => __('Background Color', 'vidcast'),
                'std' => '#121212',
            ),
            'text_color_option' => array(
                'type' => 'color',
                'label' => __('Text Color', 'vidcast'),
                'std' => '#a5acb8',
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
        return new WP_Query(apply_filters('Vidcast_Carousel_Widget_query_args', $query_args));
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
            if (is_active_widget(false, false, $this->id_base, true)) {
                $dynamic_css = 'background-color: '.$instance['bg_color_option'].'; color: '.$instance['text_color_option'].';'; // Replace with your dynamic styles
                $args['before_widget'] = preg_replace('/class="/', 'style="'. $dynamic_css . '" class="', $args['before_widget'], 1);
            }

            echo $args['before_widget'];
            do_action('vidcast_before_carousel_widget');
            $site_fallback_image = vidcast_get_option('site_fallback_image');
            ?>

            <?php if ($instance['title']) : ?>
                <header class="section-header site-section-header">
                    <h2 class="site-section-title">
                        <?php echo esc_html($instance['title']); ?>
                    </h2>
                </header>
            <?php endif; ?>
            <div class="section-content">
                <div class="widget-carousel-init swiper-container" data-swiper='{
                "breakpoints": {
                "320": { "slidesPerView": 1 },
                "575": { "slidesPerView": 2 },
                "991": { 
                    <?php if (!empty($instance['slider_per_view'])) { ?>"slidesPerView": <?php echo isset($instance['slider_per_view']) ? $instance['slider_per_view'] : 1; ?> } } <?php } ?>
                    <?php if (!empty($instance['centered_slides'])) { ?>, "centeredSlides": <?php echo ($instance['centered_slides']) ? "true" : "false"; ?> <?php }?>
                    <?php if (!empty($instance['space_between'])) { ?> , "spaceBetween": <?php echo isset($instance['space_between']) ? $instance['space_between'] : 0; ?> <?php } ?>
                    <?php if ($instance['autoplay']) { ?> ,"autoplay": {"delay": 2000}<?php } ?>
                    <?php if ($instance['pagination']) { ?> , "pagination": {"el": ".widget-carousel-pagination", "clickable": true } <?php } ?> 
                    }'>
                    <div class="swiper-wrapper">
                        <?php
                        while ($posts->have_posts()): $posts->the_post();
                            ?>
                            <div class="swiper-slide">
                                <article id="carousel-article-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-carousel-post'); ?>>
                                        <div class="entry-image mb-10">
                                            <figure class="featured-media featured-media-radius <?php echo esc_attr($instance['image_size']); ?>">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <?php
                                                        the_post_thumbnail('medium_large', array(
                                                            'alt' => the_title_attribute(array(
                                                                'echo' => false,
                                                            )),
                                                        ));
                                                        ?>
                                                    <?php else : ?>
                                                        <img src="<?php echo esc_url($site_fallback_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                                    <?php endif; ?>
                                                </a>
                                                <?php vidcast_play_button(get_the_ID());?>
                                            </figure>

                                            <?php if ($instance['show_share']) { ?>
                                                <?php vidcast_social_share(); ?>
                                            <?php } ?>
                                        </div>
                                    <?php if ($instance['show_category']) { ?>
                                        <div class="entry-categories">
                                            <?php the_category(' '); ?>
                                        </div><!-- .entry-categories -->
                                    <?php } ?>
                                    <?php the_title('<h3 class="entry-title ' . $instance['title_size'] . '"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
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
                                        <?php if ($instance['show_author']) {
                                            vidcast_posted_by();
                                        } ?>

                                        <?php if ($instance['show_post_view']) { ?>
                                            <?php vidcast_post_view_count(); ?>
                                        <?php } ?>
                                    </div>

                                </article>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>


                    <div class="swiper-pagination theme-swiper-pagination widget-carousel-pagination"></div>

                    <div class="swiper-button-prev carousel-slider-prev"></div>
                    <div class="swiper-button-next carousel-slider-next"></div>

                </div>
            </div>
            <?php if (!empty($instance['category'])) { ?>
                <footer class="section-footer site-section-footer">
                    <a href="<?php echo esc_url(get_category_link($instance['category'])); ?>"
                       class="section-footer-btn">
                        <?php vidcast_theme_svg('chevron-down'); ?>
                    </a>
                </footer>
            <?php } ?>

            <?php
            do_action('vidcast_after_carousel_widget');
            echo $args['after_widget'];
        }
        echo ob_get_clean();
    }
}