<?php
/**
 * Displays recommended post on footer.
 *
 * @package Vidcast
 */
if ( class_exists( 'WooCommerce' ) ) {
    // Check if the current page is related to WooCommerce
    if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() || is_product() ) {
        return;
    }
}
$enable_category_meta = vidcast_get_option('enable_category_meta');
$enable_date_meta = vidcast_get_option('enable_date_meta');
$enable_view_count = vidcast_get_option('enable_view_count');
$enable_social_share = vidcast_get_option('enable_social_share');
$enable_post_excerpt = vidcast_get_option('enable_post_excerpt');
$enable_author_meta = vidcast_get_option('enable_author_meta');
$select_number_of_post = vidcast_get_option('select_number_of_post');
$select_number_of_col = vidcast_get_option('select_number_of_col');
$footer_recommended_post_title = vidcast_get_option('footer_recommended_post_title');
$select_cat_for_footer_recommended_post = vidcast_get_option('select_cat_for_footer_recommended_post');
$select_font_size = vidcast_get_option('select_font_size');
$select_image_size = vidcast_get_option('select_image_size');
?>
<section class="site-section site-recommendation-section">
    <div class="wrapper">
        <header class="section-header site-section-header">
            <h2 class="site-section-title">
                <?php echo esc_html($footer_recommended_post_title); ?>
            </h2>
        </header>
    </div>
    <div class="wrapper">
        <div class="column-row">
            <?php
            $footer_recommended_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($select_number_of_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($select_cat_for_footer_recommended_post)));
            if ($footer_recommended_post_query->have_posts()):
                while ($footer_recommended_post_query->have_posts()): $footer_recommended_post_query->the_post();
                    ?>
                    <div class="column column-sm-6 column-xs-12 mb-30 <?php echo esc_attr($select_number_of_col); ?>">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-recommended-post article-has-effect'); ?>>
                            <?php if (has_post_thumbnail()): ?>
                                <div class="entry-image mb-10">
                                    <figure class="featured-media featured-media-radius <?php echo esc_attr($select_image_size); ?>">
                                        <a href="<?php the_permalink() ?>">
                                            <?php
                                            the_post_thumbnail('medium_large', array(
                                                'alt' => the_title_attribute(array(
                                                    'echo' => false,
                                                )),
                                            ));
                                            ?>
                                        </a>
                                        <?php vidcast_play_button(get_the_ID());?>
                                    </figure>
                                    <?php if ($enable_social_share) {
                                        vidcast_social_share();
                                    } ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($enable_category_meta) { ?>
                                <div class="entry-categories">
                                    <?php the_category(' '); ?>
                                </div>
                            <?php } ?>
                            <?php the_title('<h3 class="entry-title ' . $select_font_size . ' "><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                            <?php if ($enable_post_excerpt) { ?>
                                <div class="entry-content">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php } ?>
                            <div class="entry-meta">
                                <?php if ($enable_date_meta) {
                                    vidcast_posted_on();
                                } ?>
                                <?php if ($enable_author_meta) {
                                    vidcast_posted_by();
                                } ?>
                                <?php if ($enable_view_count) {
                                    vidcast_post_view_count();
                                } ?>
                            </div>
                        </article>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
        </div>
    </div>
</section>
<?php endif; ?>