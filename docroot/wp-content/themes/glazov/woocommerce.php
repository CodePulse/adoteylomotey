<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

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

// Page Layout Options
$glazov_woo_columns = cs_get_option('woo_product_columns');
$glazov_woo_sidebar = cs_get_option('woo_sidebar_position');

$glazov_woo_columns = $glazov_woo_columns ? $glazov_woo_columns : '4';

if ($glazov_woo_sidebar === 'left-sidebar') {
	$glazov_column_class = 'col-md-9';
	$glazov_sidebar_class = 'left-sidebar';
} elseif ($glazov_woo_sidebar === 'right-sidebar') {
	$glazov_column_class = 'col-md-9';
	$glazov_sidebar_class = 'glzv-right-sidebar';
} else {
	$glazov_column_class = 'col-md-12';
	$glazov_sidebar_class = 'glzv-hide-sidebar';
}

get_header();
?>
<div class="glzv-mid-wrap woo-col-<?php echo esc_attr($glazov_woo_columns); ?> <?php echo esc_attr($glazov_content_padding); ?> <?php echo esc_attr($glazov_sidebar_class); ?>" style="<?php echo esc_attr($glazov_custom_padding); ?>">
	<div class="mid-wrap-inner woo-mid-wrap">
		<div class="woocommerce woocommerce-page glzv-primary woo-shop-page <?php echo esc_attr($glazov_column_class); ?>">
			<div class="grop-wooco_content_warp">
				<?php
				if ( have_posts() ) :
					woocommerce_content();
				endif; // End of the loop.
				?>
			</div><!-- Content Area -->
		</div>
		<?php
			// Right Sidebar
			if($glazov_woo_sidebar == 'left-sidebar' || $glazov_woo_sidebar == 'right-sidebar') {
				get_sidebar('shop');
			}
		?>
	</div>
</div>

<?php
get_footer();
