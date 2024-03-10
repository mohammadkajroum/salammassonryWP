<?php
if (!defined('ABSPATH')) {
    exit;
}
class Vidcast_Call_To_Action extends Vidcast_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'vidcast-widget-cta';
        $this->widget_description = __("Adds Call to action section", 'vidcast');
        $this->widget_id = 'vidcast_call_to_action';
        $this->widget_name = __('Vidcast: Call To Action', 'vidcast');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('CTA Title', 'vidcast'),
            ),
            'title_text' => array(
                'type' => 'text',
                'label' => __('CTA Subtitle', 'vidcast'),
            ),
            'desc' => array(
                'type' => 'textarea',
                'label' => __('CTA Description', 'vidcast'),
                'rows' => 10,
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
                'label' => __('Link to url', 'vidcast'),
                'desc' => __('Enter a proper url with http: OR https:', 'vidcast'),
            ),
            'link_target' => array(
                'type' => 'checkbox',
                'label' => __('Open Link in new Tab', 'vidcast'),
                'std' => true,
            ),
            'msg' => array(
                'type' => 'message',
                'label' => __('Additonal Settings', 'vidcast'),
            ),
            'height' => array(
                'type' => 'number',
                'step' => 20,
                'min' => 300,
                'max' => 700,
                'std' => 500,
                'label' => __('Height: Between 300px and 700px (Default 500px)', 'vidcast'),
            ),
            'bg_color_option' => array(
                'type' => 'color',
                'label' => __('Background Color', 'vidcast'),
                'std' => '#000000',
            ),
            'text_color_option' => array(
                'type' => 'color',
                'label' => __('Text Color', 'vidcast'),
                'std' => '#ffffff',
            ),
            'text_align' => array(
                'type' => 'select',
                'label' => __('Text Alignment', 'vidcast'),
                'options' => array(
                    'left' => __('Left Align', 'vidcast'),
                    'center' => __('Center Align', 'vidcast'),
                    'right' => __('Right Align', 'vidcast'),
                ),
                'std' => 'left',
            ),
            'enable_fixed_bg' => array(
                'type' => 'checkbox',
                'label' => __('Enable Fixed Background Image', 'vidcast'),
                'std' => true,
            ),
            'bg_overlay_color' => array(
                'type' => 'color',
                'label' => __('Overlay Background Color', 'vidcast'),
                'std' => '#000000',
            ),
            'overlay_opacity' => array(
                'type' => 'number',
                'step' => 10,
                'min' => 0,
                'max' => 100,
                'std' => 50,
                'label' => __('Overlay Opacity (Default 50%)', 'vidcast'),
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
        ob_start();
        echo $args['before_widget'];
        do_action('vidcast_before_cta');
        $bg_color_option = "";
        if (isset($instance['bg_color_option'])) {
            $bg_color_option = $instance['bg_color_option'];
        }
        
        $style_text = 'color:' . $instance['text_color_option'] . ';';
        $style_text .= 'background-color:' . $bg_color_option . ';';
        $style_text .= 'min-height:' . $instance['height'] . 'px;';
        $style_text .= 'text-align:' . $instance['text_align'] . ';';
        $style = 'background-color:' . $instance['bg_overlay_color'] . ';';
        $style .= 'opacity:' . ($instance['overlay_opacity'] / 100) . ';';
        ?>
        <div class="vidcast-cta-widget vidcast-cover-block <?php echo ($instance['enable_fixed_bg']) ? 'vidcast-bg-image vidcast-bg-attachment-fixed' : ''; ?>" style="<?php echo esc_attr($style_text); ?>">
            <span aria-hidden="true" class="vidcast-block-overlay" style="<?php echo esc_attr($style); ?>"></span>
            <?php echo wp_get_attachment_image($instance['bg_image'], 'full'); ?>
            <div class="wrapper vidcast-cta-inner-wrapper vidcast-block-inner-wrapper">
                <div class="column-row">
                    <div class="column column-8 column-sm-12">
                        <?php if ($instance['title']) : ?>
                            <h2 class="entry-title entry-title-large">
                                <?php echo esc_html($instance['title']); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($instance['title_text']) : ?>
                            <h3 class="entry-title entry-title-big">
                                <?php echo esc_html($instance['title_text']); ?>
                            </h3>
                        <?php endif; ?>
                        <?php if ($instance['desc']) : ?>
                            <div class="entry-content entry-content-big">
                                <?php echo wpautop(wp_kses_post($instance['desc'])); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($instance['btn_text']) : ?>
                            <footer class="entry-footer">
                                <a href="<?php echo ($instance['btn_link']) ? esc_url($instance['btn_link']) : ''; ?>" target="<?php echo ($instance['link_target']) ? "_blank" : '_self'; ?>" class="theme-button theme-button-big">
                                    <?php echo esc_html(($instance['btn_text'])); ?>
                                </a>
                            </footer>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        do_action('vidcast_after_cta');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}