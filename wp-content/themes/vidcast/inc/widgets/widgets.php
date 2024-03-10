<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vidcast_widgets_init() {
    $sidebar_args['sidebar'] = array(
        'name'          => __( 'Sidebar', 'vidcast' ),
        'id'            => 'sidebar-1',
        'description' => __( 'The sidebar will display any widgets that are added to this region.', 'vidcast' ),
    );

    $sidebar_args['offcanvas_sidebar'] = array(
        'name'          => __( 'Offcanvas Widgets', 'vidcast' ),
        'id'            => 'vidcast-offcanvas-widget',
        'description' => __( 'Any widgets that are placed in this area will be displayed on the offcanvas sidebar.', 'vidcast' ),
    );
    $enable_sticky_widget_area = vidcast_get_option( 'enable_sticky_widget_area'); 
    if ($enable_sticky_widget_area) {
        $sidebar_args['sticky_widget_area'] = array(
            'name'          => __( 'Navigation Sticky Widget', 'vidcast' ),
            'id'            => 'vidcast-navigation-widget',
            'description' => __( 'Any widgets that are placed in this area will be displayed below navigation area', 'vidcast' ),
        );
    }

    $sidebar_args['homepage_top_widget'] = array(
        'name'          => __( 'Homepage Widgets', 'vidcast' ),
        'id'            => 'vidcast-homepage-top-widget',
        'description' => __( 'Any widgets that are placed in this area will be displayed on the Top section of Homepage.', 'vidcast' ),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="wrapper">',
        'after_widget'  => "</div></div>",
    );

    /*Get homepage sidebar option from the customizer*/
    $front_page_enable_sidebar = vidcast_get_option('front_page_enable_sidebar');
    if($front_page_enable_sidebar){
        $sidebar_args['homepage_sidebar'] = array(
            'name'        => __( 'Homepage Sidebar', 'vidcast' ),
            'id'          => 'home-page-sidebar',
            'description' => __( 'The widgets added to this region will only be visible on the sidebar of the homepage.', 'vidcast' ),
        );
    }

    $sidebar_args['above_footer'] = array(
        'name'        => __( 'Footer Fullwidth', 'vidcast' ),
        'id'          => 'fullwidth-footer-widgetarea',
        'description' => __( 'Widgets added to this region will appear above the footer.', 'vidcast' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="wrapper">',
        'after_widget'  => "</div></div>",
    );

    /*Get the footer column from the customizer*/
    $footer_column_layout = vidcast_get_option('footer_column_layout');
    if($footer_column_layout){
        switch ($footer_column_layout) {
            case "footer_layout_1":
                $footer_column = 4;
                break;
            case "footer_layout_2":
            case "footer_layout_5":
                $footer_column = 3;
                break;
            case "footer_layout_3":
            case "footer_layout_4":
            case "footer_layout_6":
                $footer_column = 2;
                break;
            default:
                $footer_column = 4;
        }
    }else{
        $footer_column = 4;
    }

    $cols = intval( apply_filters( 'vidcast_footer_widget_columns', $footer_column ) );

    for ( $j = 1; $j <= $cols; $j++ ) {
        $footer   = sprintf( 'footer_%d', $j );

        $footer_region_name = sprintf( __( 'Footer Column %1$d', 'vidcast' ), $j );
        $footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of the footer.', 'vidcast' ), $j );

        $sidebar_args[ $footer ] = array(
            'name'        => $footer_region_name,
            'id'          => sprintf( 'footer-%d', $j ),
            'description' => $footer_region_description,
        );
    }


    $sidebar_args = apply_filters( 'vidcast_sidebar_args', $sidebar_args );

    foreach ( $sidebar_args as $sidebar => $args ) {
        $widget_tags = array(
            'before_widget' => '<div id="%1$s" class="widget vidcast-widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        );

        /**
         * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See example below.
         */
        $filter_hook = sprintf( 'vidcast_%s_widget_tags', $sidebar );
        $widget_tags = apply_filters( $filter_hook, $widget_tags );

        if ( is_array( $widget_tags ) ) {
            register_sidebar( $args + $widget_tags );
        }
    }
}
add_action( 'widgets_init', 'vidcast_widgets_init' );