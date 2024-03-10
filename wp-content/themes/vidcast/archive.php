<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vidcast
 */

get_header();

// Add a main container in case if sidebar is present
$class = '';
$page_layout = vidcast_get_page_layout();

$archive_style = vidcast_get_option('archive_style');
if (empty($archive_style)) {
    $archive_style = 'archive_style_1';
}
set_query_var('archive_style', $archive_style);
?>
    <main id="site-content" role="main">
        <div class="wrapper">
            <div id="primary" class="content-area theme-sticky-component">

                <?php if (have_posts()) : ?>

                    <header class="page-header">
                        <?php
                        the_archive_title('<h1 class="page-title">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->

                    <?php

                    echo '<div class="vidcast-article-wrapper vidcast-' . esc_attr($archive_style) . '">';
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', 'archive');

                    endwhile;

                    echo '</div><!-- .vidcast-article-wrapper -->';

                    get_template_part('template-parts/pagination');

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>

            </div> <!-- #primary -->

            <?php
            if ('no-sidebar' != $page_layout) {
                get_sidebar();
            }
            ?>
        </div>
    </main> <!-- #site-content-->
<?php
get_footer();