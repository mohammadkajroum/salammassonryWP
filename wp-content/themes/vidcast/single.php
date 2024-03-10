<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Vidcast
 */

get_header();
// Add a main container in case if sidebar is present
$class = '';
$page_layout = vidcast_get_page_layout();
?>
<?php
global $post;
$vidcast_post_layout = esc_html(get_post_meta($post->ID, 'vidcast_post_layout', true));
if (empty($vidcast_post_layout)) {
    $vidcast_post_layout = 'layout-2';
}
$site_fallback_image = vidcast_get_option('site_fallback_image');
$author_id = get_post_field( 'post_author', get_the_ID() );
if ($vidcast_post_layout == "layout-2") { ?>
    <div class="single-featured-banner">
        <div class="featured-banner-media <?php echo (!empty($video)) ? 'featured-banner-image' : 'featured-banner-video'; ?>">
            <?php
            $content = apply_filters('the_content', get_the_content());
            $video = false;

            // Only get video from the content if a playlist isn't present.
            if (false === strpos($content, 'wp-playlist-script')) {
                $video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
            }

            if (!empty($video)) :
                ?>
                <div class="wrapper">
                    <?php foreach ($video as $video_html) : ?>
                        <div class="entry-video">
                            <?php echo vidcast_iframe_escape($video_html); ?>
                        </div>
                    <?php break;
                     endforeach; ?>
                </div>
            <?php else : ?>
                <div class="entry-image">
                    <figure class="featured-media featured-media-large">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php
                            the_post_thumbnail('full', [
                                'alt' => get_the_title(),
                                'class' => 'featured-banner-image',
                            ]);
                            ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url($site_fallback_image); ?>" class="featured-banner-image"
                                 alt="<?php echo esc_attr(get_the_title()); ?>">
                        <?php endif; ?>
                    </figure>
                </div>
            <?php endif; ?>
        </div>


        <div class="featured-banner-content">
            <div class="wrapper">

                <header class="entry-header">
                    <?php
                    if (is_singular()) :
                        the_title('<h1 class="entry-title entry-title-large">', '</h1>');
                    else :
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    endif;

                    if ('post' === get_post_type()) :
                        ?>
                        <div class="entry-meta">
                            <?php
                            vidcast_posted_on(); ?>
                            <?php echo esc_html_x('by ', 'post author', 'vidcast'); ?>
                            <span class="author vcard"><a class="url fn n" href="<?php echo esc_url(get_author_posts_url($author_id));?>"><?php echo esc_html(get_the_author_meta( 'display_name', $author_id )); ?></a></span>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </header><!-- .entry-header -->
            </div>
        </div>
    </div>
<?php } ?>

    <main id="site-content" role="main">
        <div class="wrapper">
            <div id="primary" class="content-area theme-sticky-component">

                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', get_post_type());

                    the_post_navigation(
                        array(
                            'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'vidcast') . '</span> <span class="nav-title">%title</span>',
                            'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'vidcast') . '</span> <span class="nav-title">%title</span>',
                        )
                    );

                    if ('post' === get_post_type()) :

                        // Get Author Info & related/Author posts
                        $show_author_info = vidcast_get_option('show_author_info');
                        $show_related_posts = vidcast_get_option('show_related_posts');
                        $show_author_posts = vidcast_get_option('show_author_posts');

                        if ($show_author_info):
                            get_template_part('template-parts/single/author-info');
                        endif;

                        if ($show_related_posts):
                            get_template_part('template-parts/single/related-posts');
                        endif;

                        if ($show_author_posts):
                            get_template_part('template-parts/single/author-posts');
                        endif;

                    endif;

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

            </div><!-- #primary -->
            <?php
            if ('no-sidebar' != $page_layout) {
                get_sidebar();
            }
            ?>
        </div>
    </main>


    <!--sticky-article-navigation starts-->
<?php $show_sticky_article_navigation = vidcast_get_option('show_sticky_article_navigation');
if ($show_sticky_article_navigation) {
    $next_post = get_next_post();
    $prev_post = get_previous_post(); ?>
    <div class="sticky-article-navigation">
        <?php if (isset($prev_post->ID)) {

            $prev_link = get_permalink($prev_post->ID); ?>
            <a class="sticky-article-link sticky-article-prev" href="<?php echo esc_url($prev_link); ?>">
                <div class="sticky-article-icon">
                    <?php vidcast_theme_svg('arrow-left'); ?>
                </div>
                <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-sticky-article'); ?>>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="entry-image">
                            <figure class="featured-media featured-media-thumbnail">
                                <?php if (get_the_post_thumbnail($prev_post->ID, 'medium')) { ?>
                                    <?php echo wp_kses_post(get_the_post_thumbnail($prev_post->ID, 'medium')); ?>
                                <?php } ?>
                            </figure>
                        </div>
                    <?php endif; ?>
                    <div class="entry-details">
                        <h3 class="entry-title entry-title-small">
                            <?php echo esc_html(get_the_title($prev_post->ID)); ?>
                        </h3>
                    </div>
                </article>
            </a>

        <?php }

        if (isset($next_post->ID)) {

            $next_link = get_permalink($next_post->ID); ?>

            <a class="sticky-article-link sticky-article-next" href="<?php echo esc_url($next_link); ?>">
                <div class="sticky-article-icon">
                    <?php vidcast_theme_svg('arrow-right'); ?>
                </div>
                <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-sticky-article'); ?>>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="entry-image">
                            <figure class="featured-media featured-media-thumbnail">
                                <?php if (get_the_post_thumbnail($next_post->ID, 'medium')) { ?>
                                    <?php echo wp_kses_post(get_the_post_thumbnail($next_post->ID, 'medium')); ?>
                                <?php } ?>
                            </figure>
                        </div>
                    <?php endif; ?>
                    <div class="entry-details">
                        <h3 class="entry-title entry-title-small">
                            <?php echo esc_html(get_the_title($next_post->ID)); ?>
                        </h3>
                    </div>
                </article>
            </a>

            <?php
        } ?>
    </div>


<?php } ?>
    <!--sticky-article-navigation ends-->
<?php
vidcast_set_post_views(get_the_ID());//single.php
?>
<?php
get_footer();
