<?php
/**
 * Template part for displaying posts.
 */
$glazov_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$glazov_large_image = $glazov_large_image[0];
$image_media_class = get_post_meta(get_post_thumbnail_id(get_the_ID()), 'image_media_class', true);

$glazov_read_more_text = cs_get_option('read_more_text');
$glazov_read_text = $glazov_read_more_text ? $glazov_read_more_text : esc_html__( 'Read More', 'glazov' );
$glazov_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$glazov_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
if(is_sticky()){
  $sticky_cls = ' tag-sticky';
} else {
  $sticky_cls = '';
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(' blog-item '.esc_attr($sticky_cls).''); ?>>
<?php if($glazov_large_image){ ?>
	<div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
		<a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($glazov_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
	</div>
	<?php } ?>
	<div class="blog-info">
		<h3 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h3>
		<?php echo glazov_post_metas(); ?>
		<div class="glazov-blog-excerpt"><?php
			$blog_excerpt = cs_get_option('theme_blog_excerpt');
			if ($blog_excerpt) {
				$blog_excerpt = $blog_excerpt;
			} else {
				$blog_excerpt = '55';
			}
			glazov_excerpt($blog_excerpt);
			echo glazov_wp_link_pages();
			?></div>
		<div class="blog-action-link">
			<div class="pull-left">
				<a href="<?php echo esc_url( get_permalink() ); ?>">
					<?php echo esc_attr($glazov_read_text); ?>
				</a>
			</div>
			<div class="pull-right">
				<div class="blog-like"><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></div>
			</div>
		</div>
	</div>
</div><!-- #post-## -->
