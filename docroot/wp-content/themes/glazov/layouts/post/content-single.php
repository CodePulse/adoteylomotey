<?php
/**
 * Single Post.
 */

// Single Theme Option
$glazov_single_featured_image = cs_get_option('single_featured_image');
$glazov_single_author_info = cs_get_option('single_author_info');
$glazov_single_share_option = cs_get_option('single_share_option');
// Metabox
$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );

if ($glazov_meta) {
	$glazov_content_padding = $glazov_meta['content_spacings'];
} else { $glazov_content_padding = ''; }
// Padding - Metabox
if ($glazov_content_padding && $glazov_content_padding !== 'padding-none') {
	$glazov_content_top_spacings = $glazov_meta['content_top_spacings'];
	$glazov_content_bottom_spacings = $glazov_meta['content_bottom_spacings'];
	if ($glazov_content_padding === 'padding-custom') {
		$glazov_content_top_spacings = $glazov_content_top_spacings ? 'padding-top:'. glazov_check_px($glazov_content_top_spacings) .';' : '';
		$glazov_content_bottom_spacings = $glazov_content_bottom_spacings ? 'padding-bottom:'. glazov_check_px($glazov_content_bottom_spacings) .';' : '';
		$glazov_custom_padding = $glazov_content_top_spacings . $glazov_content_bottom_spacings;
	} else {
		$glazov_custom_padding = '';
	}
} else {
	$glazov_custom_padding = '';
}

// Theme Options
$glazov_sidebar_position = cs_get_option('single_sidebar_position');

// Sidebar Position
	if ($glazov_sidebar_position === 'sidebar-hide') {
		$glazov_layout_class = 'col-md-12';
		$glazov_sidebar_class = 'glzv-hide-sidebar';
	} elseif ($glazov_sidebar_position === 'sidebar-left') {
		$glazov_layout_class = 'col-md-9';
		$glazov_sidebar_class = 'left-sidebar';
	} else {
		$glazov_layout_class = 'col-md-9';
		$glazov_sidebar_class = 'glzv-right-sidebar';
	}
$glazov_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
if($glazov_post_type) {
	$featured_img_type = $glazov_post_type['blog_single_featured_img_type'];
} else {
	$featured_img_type = cs_get_option('blog_single_featured_img_type');
}
if($glazov_post_type && $featured_img_type != 'default') {
	$featured_img_type = $glazov_post_type['blog_single_featured_img_type'];
} else {
	$featured_img_type = cs_get_option('blog_single_featured_img_type');
}

$glazov_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$glazov_large_image = $glazov_large_image[0];
$image_media_class = get_post_meta(get_post_thumbnail_id(get_the_ID()), 'image_media_class', true);
if($glazov_large_image) {
	if ($glazov_single_featured_image) {
		if($featured_img_type === 'banner') { ?>
		<div class="glzv-banner banner-style-three glzv-parallax" data-parallax-background-ratio=".5" style="background-image: url(<?php echo esc_url($glazov_large_image); ?>)"></div>
	<?php }
	}
} ?>
<div class="glzv-unit-fix <?php echo esc_attr($glazov_content_padding .' '. $glazov_sidebar_class); ?>" style="<?php echo esc_attr($glazov_custom_padding); ?>">
	<div class="container">
		<div class="glzv-primary <?php echo esc_attr($glazov_layout_class); ?>">
		  <div class="glzv-blog-detail">
				<div id="post-<?php the_ID(); ?>" <?php post_class('glzv-blog-post'); ?>>
					<div class="blog-detail-wrap">
						<?php
							if($glazov_large_image) {
								if ($glazov_single_featured_image) {
									if($featured_img_type !== 'banner') { ?>
										<div class="glzv-post_image <?php echo esc_attr($image_media_class); ?>">
											<img src="<?php echo esc_url($glazov_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
										</div>
							<?php }
								}
							} ?><h1 class="blog-title"><?php echo esc_attr(get_the_title()); ?></h1><?php
							echo glazov_post_metas();
							the_content();
							echo glazov_wp_link_pages();

								$tag_list = get_the_tags();
							  if($tag_list) { ?>
								<div class="glzv-sigltags_warp">
									<span><?php echo esc_html__('Tags:', 'glazov' ); ?></span>
									<p class="glzv-sigl_tags">
										<?php echo the_tags( '', '', '' ); ?>
									</p>
								</div>
							<?php }
							if ($glazov_single_share_option) {
								if ( function_exists( 'glazov_wp_share_option' ) ) {
									echo glazov_wp_share_option();
								}
							}
						?>
					</div>
					<!-- Author Info -->
					<?php
						if ($glazov_single_author_info) {
							echo glazov_author_info();
						}
						echo glazov_related_post();
						if ( comments_open() || get_comments_number() ) :
							comments_template();
					  endif;
					?>
				</div><!-- #post-## -->
			</div><!-- Blog Div -->
				<?php
			    glazov_paging_nav();
			    wp_reset_postdata(); // avoid errors further down the page
				?>
		</div><!-- Content Area -->
			<?php
				if ($glazov_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
			?>
	</div>
</div>