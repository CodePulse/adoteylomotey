<?php
/*
 * The main template file.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

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
$glazov_sidebar_position = cs_get_option('blog_sidebar_position');

// Sidebar Position
if ($glazov_sidebar_position === 'sidebar-hide') {
	$layout_class = 'col-md-12';
	$glazov_sidebar_class = 'glzv-hide-sidebar';
} elseif ($glazov_sidebar_position === 'sidebar-left') {
	$layout_class = 'col-md-9';
	$glazov_sidebar_class = 'left-sidebar';
} else {
	$layout_class = 'col-md-9';
	$glazov_sidebar_class = 'right-sidebar';
}
?>
<div class="glzv-mid-wrap <?php echo esc_attr($glazov_sidebar_class); ?> <?php echo esc_attr($glazov_content_padding); ?>" style="<?php echo esc_attr($glazov_custom_padding); ?>">
	<div class="mid-wrap-inner">
		<div class="container">
		<div class="row">
		  <div class="glzv-primary <?php echo esc_attr($layout_class); ?>">
				<div class="blog-items-wrap">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'layouts/post/content' );
						endwhile;
					else :
						get_template_part( 'layouts/post/content', 'none' );
					endif; ?>
				</div><!-- Blog Div -->
				<?php
					glazov_paging_nav();
			    wp_reset_postdata();  // avoid errors further down the page
				?>
			</div><!-- Content Area -->
			<?php
			if ($glazov_sidebar_position !== 'sidebar-hide') {
				get_sidebar(); // Sidebar
			}
			?>
		</div>
		</div>
	</div>
</div>

<?php
get_footer();
