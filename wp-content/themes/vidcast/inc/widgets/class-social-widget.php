<?php

if (!defined('ABSPATH')) {
    exit;
}

class Vidcast_Social_Menu extends Vidcast_Widget_Base
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'vidcast-widget-social-menu';
        $this->widget_description = __("Displays social menu if you have set it.", 'vidcast');
        $this->widget_id = 'vidcast_social_menu';
        $this->widget_name = __('Vidcast: Social Menu', 'vidcast');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'vidcast'),
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
     * Output widget.
     *
     * @see WP_Widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        ob_start();

        $this->widget_start($args, $instance);

        do_action( 'vidcast_before_social_menu');

        $style = $instance['style'];

        ?>
        <div class="vidcast-social-menu-widget <?php echo esc_attr($style);?>">
            <?php

            if ( has_nav_menu( 'social-menu' ) ) {
                wp_nav_menu(array(
                    'theme_location' => 'social-menu',
                    'container_class' => 'footer-navigation',
                    'fallback_cb' => false,
                    'depth' => 1,
                    'menu_class' => 'vidcast-social-icons reset-list-style',
                    'link_before' => '<span class="social-media-title">',
                    'link_after' => '</span>',
                ) );
            }else{
                esc_html_e( 'Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'vidcast' );
            }
            ?>
        </div>
        <?php

        do_action( 'vidcast_after_social_menu');

        $this->widget_end($args);

        echo ob_get_clean();
    }
}