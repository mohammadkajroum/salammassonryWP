<?php
/**
* Sidebar Metabox.
*
* @package Vidcast
*/
if( !function_exists( 'vidcast_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function vidcast_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('vidcast_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function vidcast_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists( 'vidcast_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function vidcast_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;


if( !function_exists( 'vidcast_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function vidcast_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

add_action( 'add_meta_boxes', 'vidcast_metabox' );

if( ! function_exists( 'vidcast_metabox' ) ):


    function  vidcast_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'vidcast' ),
            'vidcast_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'vidcast' ),
            'vidcast_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$vidcast_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'vidcast' ),
    'layout-2' => esc_html__( 'Banner Layout', 'vidcast' ),
);

$vidcast_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'vidcast' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'vidcast' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'vidcast' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'vidcast' ),
                ),
);

$vidcast_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'vidcast' ),
    'layout-2' => esc_html__( 'Banner Layout', 'vidcast' ),
);

$vidcast_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'vidcast' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'vidcast' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'vidcast_post_metafield_callback' ) ):
    
    function vidcast_post_metafield_callback() {
        global $post, $vidcast_post_sidebar_fields, $vidcast_post_layout_options,  $vidcast_page_layout_options, $vidcast_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'vidcast_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-appearance"  class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'vidcast'); ?>

                        </a>
                    </li>

                    <?php if ($post_type != 'page') { ?>
                        <li>
                            <a id="metabox-navbar-general" href="javascript:void(0)">

                                <?php esc_html_e('General Settings', 'vidcast'); ?>

                            </a>
                        </li>
                    <?php } ?>


                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'vidcast'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','vidcast'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $vidcast_post_sidebar = esc_html( get_post_meta( $post->ID, 'vidcast_post_sidebar_option', true ) ); 
                            if( $vidcast_post_sidebar == '' ){ $vidcast_post_sidebar = 'global-sidebar'; }

                            foreach ( $vidcast_post_sidebar_fields as $vidcast_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="vidcast_post_sidebar_option" value="<?php echo esc_attr( $vidcast_post_sidebar_field['value'] ); ?>" <?php if( $vidcast_post_sidebar_field['value'] == $vidcast_post_sidebar ){ echo "checked='checked'";} if( empty( $vidcast_post_sidebar ) && $vidcast_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $vidcast_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Banner Layout','vidcast'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $vidcast_page_layout = esc_html( get_post_meta( $post->ID, 'vidcast_page_layout', true ) ); 
                                if( $vidcast_page_layout == '' ){ $vidcast_page_layout = 'layout-1'; }

                                foreach ( $vidcast_page_layout_options as $key => $vidcast_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="vidcast_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $vidcast_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $vidcast_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','vidcast'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $vidcast_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'vidcast_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="vidcast-header-overlay" name="vidcast_ed_header_overlay" value="1" <?php if( $vidcast_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="vidcast-header-overlay"><?php esc_html_e( 'Enable Header Overlay','vidcast' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Title Layout','vidcast'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $vidcast_post_layout = esc_html( get_post_meta( $post->ID, 'vidcast_post_layout', true ) ); 
                                if( $vidcast_post_layout == '' ){ $vidcast_post_layout = 'layout-2'; }

                                foreach ( $vidcast_post_layout_options as $key => $vidcast_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="vidcast_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $vidcast_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $vidcast_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','vidcast'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $vidcast_header_overlay = esc_html( get_post_meta( $post->ID, 'vidcast_header_overlay', true ) ); 
                                if( $vidcast_header_overlay == '' ){ $vidcast_header_overlay = 'global-layout'; }

                                foreach ( $vidcast_header_overlay_options as $key => $vidcast_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="vidcast_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $vidcast_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $vidcast_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $vidcast_ed_post_views = esc_html( get_post_meta( $post->ID, 'vidcast_ed_post_views', true ) );
                    $vidcast_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'vidcast_ed_post_like_dislike', true ) );
                    $vidcast_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'vidcast_ed_post_author_box', true ) );
                    $vidcast_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'vidcast_ed_post_social_share', true ) );
                    $vidcast_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'vidcast_ed_post_reaction', true ) );
                    $vidcast_ed_post_rating = esc_html( get_post_meta( $post->ID, 'vidcast_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','vidcast'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="vidcast-ed-post-views" name="vidcast_ed_post_views" value="1" <?php if( $vidcast_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="vidcast-ed-post-views"><?php esc_html_e( 'Disable Post Views','vidcast' ); ?></label>

                            </div>


                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="vidcast-ed-post-like-dislike" name="vidcast_ed_post_like_dislike" value="1" <?php if( $vidcast_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="vidcast-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','vidcast' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="vidcast-ed-post-author-box" name="vidcast_ed_post_author_box" value="1" <?php if( $vidcast_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="vidcast-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','vidcast' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="vidcast-ed-post-social-share" name="vidcast_ed_post_social_share" value="1" <?php if( $vidcast_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="vidcast-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','vidcast' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="vidcast-ed-post-reaction" name="vidcast_ed_post_reaction" value="1" <?php if( $vidcast_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="vidcast-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','vidcast' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="vidcast-ed-post-rating" name="vidcast_ed_post_rating" value="1" <?php if( $vidcast_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="vidcast-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','vidcast' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'vidcast_save_post_meta' );

if( ! function_exists( 'vidcast_save_post_meta' ) ):

    function vidcast_save_post_meta( $post_id ) {

        global $post, $vidcast_post_sidebar_fields, $vidcast_post_layout_options, $vidcast_header_overlay_options,  $vidcast_page_layout_options;

        if ( !isset( $_POST[ 'vidcast_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['vidcast_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $vidcast_post_sidebar_fields as $vidcast_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'vidcast_post_sidebar_option', true ) ); 
                $new = isset( $_POST['vidcast_post_sidebar_option'] ) ? vidcast_sanitize_sidebar_option_meta( wp_unslash( $_POST['vidcast_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'vidcast_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'vidcast_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? vidcast_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $vidcast_post_layout_options as $vidcast_post_layout_option ) {  
            
            $vidcast_post_layout_old = esc_html( get_post_meta( $post_id, 'vidcast_post_layout', true ) ); 
            $vidcast_post_layout_new = isset( $_POST['vidcast_post_layout'] ) ? vidcast_sanitize_post_layout_option_meta( wp_unslash( $_POST['vidcast_post_layout'] ) ) : '';

            if ( $vidcast_post_layout_new && $vidcast_post_layout_new != $vidcast_post_layout_old ){

                update_post_meta ( $post_id, 'vidcast_post_layout', $vidcast_post_layout_new );

            }elseif( '' == $vidcast_post_layout_new && $vidcast_post_layout_old ) {

                delete_post_meta( $post_id,'vidcast_post_layout', $vidcast_post_layout_old );

            }
            
        }



        foreach ( $vidcast_header_overlay_options as $vidcast_header_overlay_option ) {  
            
            $vidcast_header_overlay_old = esc_html( get_post_meta( $post_id, 'vidcast_header_overlay', true ) ); 
            $vidcast_header_overlay_new = isset( $_POST['vidcast_header_overlay'] ) ? vidcast_sanitize_header_overlay_option_meta( wp_unslash( $_POST['vidcast_header_overlay'] ) ) : '';

            if ( $vidcast_header_overlay_new && $vidcast_header_overlay_new != $vidcast_header_overlay_old ){

                update_post_meta ( $post_id, 'vidcast_header_overlay', $vidcast_header_overlay_new );

            }elseif( '' == $vidcast_header_overlay_new && $vidcast_header_overlay_old ) {

                delete_post_meta( $post_id,'vidcast_header_overlay', $vidcast_header_overlay_old );

            }
            
        }


        $vidcast_ed_post_views_old = esc_html( get_post_meta( $post_id, 'vidcast_ed_post_views', true ) ); 
        $vidcast_ed_post_views_new = isset( $_POST['vidcast_ed_post_views'] ) ? absint( wp_unslash( $_POST['vidcast_ed_post_views'] ) ) : '';

        if ( $vidcast_ed_post_views_new && $vidcast_ed_post_views_new != $vidcast_ed_post_views_old ){

            update_post_meta ( $post_id, 'vidcast_ed_post_views', $vidcast_ed_post_views_new );

        }elseif( '' == $vidcast_ed_post_views_new && $vidcast_ed_post_views_old ) {

            delete_post_meta( $post_id,'vidcast_ed_post_views', $vidcast_ed_post_views_old );

        }





        $vidcast_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'vidcast_ed_post_like_dislike', true ) ); 
        $vidcast_ed_post_like_dislike_new = isset( $_POST['vidcast_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['vidcast_ed_post_like_dislike'] ) ) : '';

        if ( $vidcast_ed_post_like_dislike_new && $vidcast_ed_post_like_dislike_new != $vidcast_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'vidcast_ed_post_like_dislike', $vidcast_ed_post_like_dislike_new );

        }elseif( '' == $vidcast_ed_post_like_dislike_new && $vidcast_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'vidcast_ed_post_like_dislike', $vidcast_ed_post_like_dislike_old );

        }



        $vidcast_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'vidcast_ed_post_author_box', true ) ); 
        $vidcast_ed_post_author_box_new = isset( $_POST['vidcast_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['vidcast_ed_post_author_box'] ) ) : '';

        if ( $vidcast_ed_post_author_box_new && $vidcast_ed_post_author_box_new != $vidcast_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'vidcast_ed_post_author_box', $vidcast_ed_post_author_box_new );

        }elseif( '' == $vidcast_ed_post_author_box_new && $vidcast_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'vidcast_ed_post_author_box', $vidcast_ed_post_author_box_old );

        }



        $vidcast_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'vidcast_ed_post_social_share', true ) ); 
        $vidcast_ed_post_social_share_new = isset( $_POST['vidcast_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['vidcast_ed_post_social_share'] ) ) : '';

        if ( $vidcast_ed_post_social_share_new && $vidcast_ed_post_social_share_new != $vidcast_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'vidcast_ed_post_social_share', $vidcast_ed_post_social_share_new );

        }elseif( '' == $vidcast_ed_post_social_share_new && $vidcast_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'vidcast_ed_post_social_share', $vidcast_ed_post_social_share_old );

        }



        $vidcast_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'vidcast_ed_post_reaction', true ) ); 
        $vidcast_ed_post_reaction_new = isset( $_POST['vidcast_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['vidcast_ed_post_reaction'] ) ) : '';

        if ( $vidcast_ed_post_reaction_new && $vidcast_ed_post_reaction_new != $vidcast_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'vidcast_ed_post_reaction', $vidcast_ed_post_reaction_new );

        }elseif( '' == $vidcast_ed_post_reaction_new && $vidcast_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'vidcast_ed_post_reaction', $vidcast_ed_post_reaction_old );

        }



        $vidcast_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'vidcast_ed_post_rating', true ) ); 
        $vidcast_ed_post_rating_new = isset( $_POST['vidcast_ed_post_rating'] ) ? absint( wp_unslash( $_POST['vidcast_ed_post_rating'] ) ) : '';

        if ( $vidcast_ed_post_rating_new && $vidcast_ed_post_rating_new != $vidcast_ed_post_rating_old ){

            update_post_meta ( $post_id, 'vidcast_ed_post_rating', $vidcast_ed_post_rating_new );

        }elseif( '' == $vidcast_ed_post_rating_new && $vidcast_ed_post_rating_old ) {

            delete_post_meta( $post_id,'vidcast_ed_post_rating', $vidcast_ed_post_rating_old );

        }

        foreach ( $vidcast_page_layout_options as $vidcast_post_layout_option ) {  
        
            $vidcast_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'vidcast_page_layout', true ) ); 
            $vidcast_page_layout_new = isset( $_POST['vidcast_page_layout'] ) ? vidcast_sanitize_post_layout_option_meta( wp_unslash( $_POST['vidcast_page_layout'] ) ) : '';

            if ( $vidcast_page_layout_new && $vidcast_page_layout_new != $vidcast_page_layout_old ){

                update_post_meta ( $post_id, 'vidcast_page_layout', $vidcast_page_layout_new );

            }elseif( '' == $vidcast_page_layout_new && $vidcast_page_layout_old ) {

                delete_post_meta( $post_id,'vidcast_page_layout', $vidcast_page_layout_old );

            }
            
        }

        $vidcast_ed_header_overlay_old = absint( get_post_meta( $post_id, 'vidcast_ed_header_overlay', true ) ); 
        $vidcast_ed_header_overlay_new = isset( $_POST['vidcast_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['vidcast_ed_header_overlay'] ) ) : '';

        if ( $vidcast_ed_header_overlay_new && $vidcast_ed_header_overlay_new != $vidcast_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'vidcast_ed_header_overlay', $vidcast_ed_header_overlay_new );

        }elseif( '' == $vidcast_ed_header_overlay_new && $vidcast_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'vidcast_ed_header_overlay', $vidcast_ed_header_overlay_old );

        }

    }

endif;   