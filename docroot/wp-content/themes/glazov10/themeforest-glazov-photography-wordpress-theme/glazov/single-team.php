<?php
/*
 * The template for displaying all single team.
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
// Padding - Theme Options
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
	$glazov_top_spacing = cs_get_option('team_top_spacing');
	$glazov_bottom_spacing = cs_get_option('team_bottom_spacing');
	if ($glazov_top_spacing || $glazov_bottom_spacing) {
		$glazov_top_spacing = $glazov_top_spacing ? 'padding-top:'. glazov_check_px($glazov_top_spacing) .';' : '';
		$glazov_bottom_spacing = $glazov_bottom_spacing ? 'padding-bottom:'. glazov_check_px($glazov_bottom_spacing) .';' : '';
		$glazov_custom_padding = $glazov_top_spacing . $glazov_bottom_spacing;
	} else {
		$glazov_custom_padding = '';
	}
}

// Sidebar Position
$glazov_layout_class = 'col-lg-12 no-padding';
?>
<div class="container glzv-content-area <?php echo esc_attr($glazov_content_padding); ?>" style="<?php echo esc_attr($glazov_custom_padding); ?>">
	<div class="row">
		<div class="<?php echo esc_attr($glazov_layout_class); ?> sngl-team-cnt">
			<div class="glzv-blog-one glzv-blog-list glzv-blog-col-1">
				<?php
					if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="col-md-4">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="col-md-8">
						<?php the_content(); ?>
					</div>
			    <?php
					endwhile;
					endif;
				?>
			</div><!-- Blog Div -->
			<?php
	    	wp_reset_postdata();  // avoid errors further down the page
			?>
		</div><!-- Content Area -->
	</div>
</div>
<?php
get_footer();
