<?php 

// Don't show the title if the post-format is `aside` or `status`.
$post_format = get_post_format();
if($archive_style != 'archive_style_4'){
    if ( 'aside' === $post_format || 'status' === $post_format ) {
        return;
    }
}
$enabled_post_meta = array();
$archive_style = vidcast_get_option('archive_style');
switch ($archive_style) {
    case 'archive_style_1':
        $enabled_post_meta = vidcast_get_option('archive_post_meta_1');
    break;
    case 'archive_style_2':
        $enabled_post_meta = vidcast_get_option('archive_post_meta_2');
    break;
    case 'archive_style_3':
        $enabled_post_meta = vidcast_get_option('archive_post_meta_3');
    break;
    case 'archive_style_4':
        $enabled_post_meta = vidcast_get_option('archive_post_meta_4');
    break;
    
    default:
        // code...
        break;
}

?>

<header class="entry-header">
    <?php if ( in_array('category', $enabled_post_meta) && has_category() ) :?>
        <div class="entry-categories">
                <?php the_category( ' ' ); ?>
        </div><!-- .entry-categories -->
    <?php endif; ?>

    <?php the_title( '<h2 class="entry-title entry-title-big"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );?>
    
    <?php if ( 'post' === get_post_type() ) :?>
        <div class="entry-meta">
            <?php vidcast_post_meta_info($enabled_post_meta); ?>
        </div><!-- .entry-meta -->
    <?php endif; ?>
</header><!-- .entry-header -->

<?php 
if($archive_style != 'archive_style_4'){
    if ( 'gallery' === $post_format || 'audio' === $post_format || 'video' === $post_format ) {
        return;
    }
}
?>
<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
    <div class="entry-image">
        <figure class="featured-media">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('full'); ?>
            </a>

            <?php
            $caption = get_the_post_thumbnail_caption();
            if ( $caption ) {
                ?>
                <figcaption class="wp-caption-text"><?php echo wp_kses_post( $caption ); ?></figcaption>
                <?php
            }
            ?>
        </figure><!-- .featured-media -->

    </div><!-- .entry-image -->
<?php endif; ?>