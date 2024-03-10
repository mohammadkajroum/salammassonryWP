<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/widgets/widget-base/widgetbase.php';

require get_template_directory() . '/inc/widgets/class-recent-widget.php';
require get_template_directory() . '/inc/widgets/class-social-widget.php';
require get_template_directory() . '/inc/widgets/class-newsletter-widget.php';
require get_template_directory() . '/inc/widgets/class-author-widget.php';
require get_template_directory() . '/inc/widgets/class-tab-widget.php';
require get_template_directory() . '/inc/widgets/class-cta-widget.php';
require get_template_directory() . '/inc/widgets/class-image-widget.php';
require get_template_directory() . '/inc/widgets/class-advanced-recent-widget.php';
require get_template_directory() . '/inc/widgets/class-carousel-widget.php';
require get_template_directory() . '/inc/widgets/class-metro-post-widget.php';
require get_template_directory() . '/inc/widgets/class-slider-widget.php';





/* Register site widgets */
if ( ! function_exists( 'vidcast_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function vidcast_widgets() {
        register_widget( 'Vidcast_Recent_Posts' );
        register_widget( 'Vidcast_Social_Menu' );
        register_widget( 'Vidcast_Author_Info' );
        register_widget( 'Vidcast_Mailchimp_Form' );
        register_widget( 'Vidcast_Tab_Posts' );
        register_widget( 'Vidcast_Call_To_Action' );
        register_widget( 'Vidcast_Image_Widget' );
        register_widget( 'Vidcast_Advanced_Recent_Widget' );
        register_widget( 'Vidcast_Carousel_Widget' );
        register_widget( 'Vidcast_Metro_Post_Widget' );
        register_widget( 'Vidcast_Slider_Widget' );
    }
endif;
add_action( 'widgets_init', 'vidcast_widgets' );