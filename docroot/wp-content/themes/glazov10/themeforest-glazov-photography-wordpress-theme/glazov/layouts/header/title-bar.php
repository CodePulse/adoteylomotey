<?php
// Metabox
$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );
if ($glazov_meta) {
	$glazov_title_area_height = $glazov_meta['title_area_height'];
} else { $glazov_title_area_height = ''; }
// Padding - Theme Options
if ($glazov_title_area_height && $glazov_title_area_height !== 'default-height') {
	$glazov_title_area_height = $glazov_meta['title_area_height'];
} else {
	$glazov_title_area_height = cs_get_option('title_area_height');
}

// Banner Type - Meta Box
if ($glazov_meta) {
	$glazov_banner_type = $glazov_meta['banner_type'];
} else { $glazov_banner_type = ''; }

// Overlay Color - Theme Options
if ($glazov_meta) {
	$glazov_bg_overlay_color = $glazov_meta['titlebar_bg_overlay_color'];
} else { $glazov_bg_overlay_color = ''; }
if ($glazov_bg_overlay_color) {
	if ($glazov_bg_overlay_color) {
		$glazov_overlay_color = $glazov_bg_overlay_color;
	} else {
		$glazov_overlay_color = '';
	}
} else {
	$glazov_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
	if ($glazov_bg_overlay_color) {
		$glazov_overlay_color = $glazov_bg_overlay_color;
	} else {
		$glazov_overlay_color = '';
	}
}

// Background - Type
if( $glazov_meta && isset( $glazov_meta['title_area_bg'] ) ) {
  extract( $glazov_meta['title_area_bg'] );
  $glazov_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
  $glazov_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
  $glazov_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
  $glazov_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
  $glazov_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
  $glazov_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
  $glazov_background_style       = ( ! empty( $image ) ) ? $glazov_background_image . $glazov_background_repeat . $glazov_background_position . $glazov_background_size . $glazov_background_attachment : '';
  $glazov_title_bg = ( ! empty( $glazov_background_style ) || ! empty( $glazov_background_color ) ) ? $glazov_background_style . $glazov_background_color : '';
} else {
	$glazov_title_bg = '';
  $image_media_class = '';
}
if($glazov_banner_type === 'hide-title-area' || is_404()) { // Hide Title Area
} else { ?>
	<!-- Banner & Title Area -->
<div class="glzv-banner glzv-parallax banner-style-two <?php echo esc_attr($glazov_banner_type . ' '.$glazov_title_area_height); ?>" style="<?php echo esc_attr($glazov_title_bg); ?>" data-parallax-background-ratio=".8">
	<?php if($glazov_bg_overlay_color) { ?>
		<div class="glzv-title-overlay"></div>
		<?php
			$bg_color = $glazov_bg_overlay_color;
		} else {
			$bg_color = '';
		} ?>
		<div class="banner-wrap" style="background-color:<?php echo esc_attr($bg_color); ?>;">
			<div class="glzv-table-wrap">
				<div class="glzv-align-wrap">
					<div class="container">
						<h1 class="banner-title"><?php echo glazov_title_area(); ?></h1>
					</div>
				</div>
			</div>
		</div>
</div>
<?php }
