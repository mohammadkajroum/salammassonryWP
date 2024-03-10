<?php
if (!defined('ABSPATH')) {
    exit;
}

class Vidcast_Image_Widget extends Vidcast_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'vidcast-widget-image';
        $this->widget_description = __("Adds image section", 'vidcast');
        $this->widget_id = 'vidcast_image_widget';
        $this->widget_name = __('Vidcast: Image Widget', 'vidcast');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Widget Title', 'vidcast'),
            ),
            'title_text' => array(
                'type' => 'text',
                'label' => __('Widget Description', 'vidcast'),
            ),
            'bg_image' => array(
                'type' => 'image',
                'label' => __('Background Image', 'vidcast'),
            ),
            'btn_text' => array(
                'type' => 'text',
                'label' => __('Button Text', 'vidcast'),
            ),
            'btn_link' => array(
                'type' => 'url',
                'label' => __('Link to URL', 'vidcast'),
                'desc' => __('Please make sure to provide a complete URL that includes either "http://" or "https://" to ensure the widget operates correctly.', 'vidcast'),
            ),
            'link_target' => array(
                'type' => 'checkbox',
                'label' => __('Open Link in new Tab', 'vidcast'),
                'std' => true,
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'vidcast'),
                'options' => array(
                    'style_1' => __('Style 1', 'vidcast'),
                    'style_2' => __('Style 2', 'vidcast'),
                ),
                'std' => 'style_1',
            ),
        );
        parent::__construct();
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
        $class = '';
        ob_start();
        echo $args['before_widget'];
        $class .= $instance['style'];
        do_action('vidcast_before_image');
        ?>
        <div class="vidcast-image-widget <?php echo esc_attr($class); ?>">
            <div class="widget-image-wrapper">
                <?php echo wp_get_attachment_image($instance['bg_image'], 'full'); ?>
            </div>
            <div class="widget-desc-wrapper">
                <?php if ($instance['title']) : ?>
                    <h2 class="entry-title">
                        <?php echo esc_html($instance['title']); ?>
                    </h2>
                <?php endif; ?>
                <?php if ($instance['title_text']) : ?>
                    <div class="entry-details">
                        <?php echo esc_html($instance['title_text']); ?>
                    </div>
                <?php endif; ?>
                <?php if ($instance['btn_text']) : ?>
                    <a href="<?php echo ($instance['btn_link']) ? esc_url($instance['btn_link']) : ''; ?>"
                       target="<?php echo ($instance['link_target']) ? "_blank" : '_self'; ?>"
                       class="theme-widget-button">
                        <?php echo esc_html(($instance['btn_text'])); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php
        do_action('vidcast_after_image');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}