<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vidcast
 */
$site_fallback_image = vidcast_get_option('site_fallback_image');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if (is_single()) {
		global $post;
		$vidcast_post_layout = esc_html( get_post_meta( $post->ID, 'vidcast_post_layout', true ) ); 
		if (empty($vidcast_post_layout)) {
		    $vidcast_post_layout = 'layout-2';
		}
		if ($vidcast_post_layout == "layout-1") { ?>

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

	                    <?php foreach ($video as $video_html) : ?>
	                        <div class="entry-video">
	                            <?php echo vidcast_iframe_escape($video_html); ?>
	                        </div>
	                    <?php break;
	                     endforeach; ?>

	            <?php else : ?>
	                <div class="entry-image">
	                    <figure class="featured-media featured-media-radius featured-media-large">
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
            <header class="entry-header">
                <?php
                if ( is_singular() ) :
                    the_title( '<h1 class="entry-title entry-title-large">', '</h1>' );
                else :
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;

                if ( 'post' === get_post_type() ) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        vidcast_posted_on();
                        vidcast_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->
		<?php } ?>
	<?php } else { ?>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title entry-title-large">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					vidcast_posted_on();
					vidcast_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php vidcast_post_thumbnail(); ?>
	<?php } ?>
	<div class="entry-content">
		<?php
		if (is_single()) {
			add_filter('the_content', 'vidcast_remove_embed_block_content');
			the_content();
		}else {
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'vidcast' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
		}
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vidcast' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php vidcast_entry_footer_all(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
