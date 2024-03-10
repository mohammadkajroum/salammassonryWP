<?php
if (!defined('ABSPATH')) {
    exit;
}

class Vidcast_Recent_Posts extends Vidcast_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'vidcast-widget-recent-post';
        $this->widget_description = __("Displays recent posts with an image", 'vidcast');
        $this->widget_id = 'vidcast_recent_posts';
        $this->widget_name = __('Vidcast: Recent Posts', 'vidcast');
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
            'title_size' => array(
                'type' => 'select',
                'label' => __('Title Size', 'vidcast'),
                'options' => array(
                    'entry-title-medium' => __('Medium', 'vidcast'),
                    'entry-title-small' => __('Small', 'vidcast'),
                    'entry-title-xsmall' => __('Extra Small', 'vidcast'),
                ),
                'std' => 'entry-title-xsmall',
            ),
            'number' => array(
                'type' => 'number',
                'step' => 1,
                'min' => 1,
                'max' => '',
                'std' => 5,
                'label' => __('Number of posts to show', 'vidcast'),
            ),
            'orderby' => array(
                'type' => 'select',
                'std' => 'date',
                'label' => __('Order by', 'vidcast'),
                'options' => array(
                    'date' => __('Date', 'vidcast'),
                    'ID' => __('ID', 'vidcast'),
                    'title' => __('Title', 'vidcast'),
                    'rand' => __('Random', 'vidcast'),
                ),
            ),
            'order' => array(
                'type' => 'select',
                'std' => 'desc',
                'label' => __('Order', 'vidcast'),
                'options' => array(
                    'asc' => __('ASC', 'vidcast'),
                    'desc' => __('DESC', 'vidcast'),
                ),
            ),
            'show_date' => array(
                'type' => 'checkbox',
                'label' => __('Show Date', 'vidcast'),
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
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'vidcast'),
                'options' => array(
                    'style_1' => __('Style 1', 'vidcast'),
                    'style_2' => __('Style 2', 'vidcast'),
                    'style_3' => __('Style 3', 'vidcast'),
                ),
                'std' => 'style_1',
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
        $orderby = !empty($instance['orderby']) ? sanitize_text_field($instance['orderby']) : $this->settings['orderby']['std'];
        $order = !empty($instance['order']) ? sanitize_text_field($instance['order']) : $this->settings['order']['std'];
        $query_args = array(
            'posts_per_page' => $number,
            'post_status' => 'publish',
            'no_found_rows' => 1,
            'orderby' => $orderby,
            'order' => $order,
            'ignore_sticky_posts' => 1
        );
        if (!empty($instance['category']) && -1 != $instance['category'] && 0 != $instance['category']) {
            $query_args['tax_query'][] = array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $instance['category'],
            );
        }
        return new WP_Query(apply_filters('vidcast_recent_posts_query_args', $query_args));
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
            $this->widget_start($args, $instance);
            do_action('vidcast_before_recent_posts_with_image');
            $style = $instance['style'];
            ?>
            <div class="theme-recent-widget theme-widget-list <?php echo esc_attr($style); ?>">
                <?php
                while ($posts->have_posts()): $posts->the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-widget-article'); ?>>
                        <?php
                        if (has_post_thumbnail()) {
                            ?>
                            <div class="entry-image">
                                <figure class="featured-media featured-media-radius">
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                                        the_post_thumbnail('thumbnail', array(
                                            'alt' => the_title_attribute(array(
                                                'echo' => false,
                                            )),
                                        ));
                                        ?>
                                    </a>

                                </figure>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="entry-details">
                            <?php the_title( '<h3 class="entry-title ' . $instance['title_size'] . '"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
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
                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
            <?php
            do_action('vidcast_after_recent_posts_with_image');
            $this->widget_end($args);
        }
        echo ob_get_clean();
    }
}