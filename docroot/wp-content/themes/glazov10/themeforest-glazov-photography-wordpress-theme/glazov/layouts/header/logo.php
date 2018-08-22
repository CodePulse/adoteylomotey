<?php
// Logo Image
$glazov_brand_logo_default = cs_get_option('brand_logo_default');
$glazov_brand_logo_retina = cs_get_option('brand_logo_retina');

$glazov_logo_default_cls = $glazov_brand_logo_default ? ' hav-default-logo' : ' dhav-default-logo';
$glazov_default_retina_cls = $glazov_brand_logo_retina ? ' hav-d-retina-logo' : ' dhav-d-retina-logo';

// Mobile Logo
$glazov_mobile_logo = cs_get_option('mobile_logo_retina');
$glazov_mobile_width = cs_get_option('mobile_logo_width');
$glazov_mobile_height = cs_get_option('mobile_logo_height');
$glazov_mobile_logo_top = cs_get_option('mobile_logo_top');
$glazov_mobile_logo_bottom = cs_get_option('mobile_logo_bottom');
$glazov_mobile_class = $glazov_mobile_logo ? ' hav-mobile-logo' : ' dhve-mobile-logo';

// Transparent Header Logos
$glazov_transparent_logo = cs_get_option('transparent_logo_default');
$glazov_transparent_retina = cs_get_option('transparent_logo_retina');

$transparent_logo_class = $glazov_transparent_logo ? ' hav-transparent-logo' : ' dhav-transparent-logo';
$trans_retina_logo_class = $glazov_transparent_retina ? ' hav-trans-retina' : ' dhav-trans-retina';

// Metabox - Header Transparent
$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox'. true );
if ($glazov_meta) {
  $glazov_transparent_header = $glazov_meta['transparency_header'];
} else { $glazov_transparent_header = ''; }

// Retina Size
$glazov_retina_width = cs_get_option('retina_width');
$glazov_retina_height = cs_get_option('retina_height');

$retina_height_actual = $glazov_retina_height ? 'height ="'.$glazov_retina_height.'"' : '';
$retina_width_actual = $glazov_retina_width ? 'width ="'.$glazov_retina_width.'"' : '';

// Logo Spacings
$glazov_brand_logo_top = cs_get_option('brand_logo_top');
$glazov_brand_logo_bottom = cs_get_option('brand_logo_bottom');
if ($glazov_mobile_logo_top) {
	$glazov_brand_logo_top = 'padding-top:'. glazov_check_px($glazov_mobile_logo_top) .';';
} elseif ($glazov_brand_logo_top) {
	$glazov_brand_logo_top = 'padding-top:'. glazov_check_px($glazov_brand_logo_top) .';';
} else { $glazov_brand_logo_top = ''; }
if ($glazov_mobile_logo_bottom) {
	$glazov_brand_logo_bottom = 'padding-bottom:'. glazov_check_px($glazov_mobile_logo_bottom) .';';
} elseif ($glazov_brand_logo_bottom) {
	$glazov_brand_logo_bottom = 'padding-bottom:'. glazov_check_px($glazov_brand_logo_bottom) .';';
} else { $glazov_brand_logo_bottom = ''; }
?>
<div class="glzv-brand <?php echo esc_attr($glazov_mobile_class); ?><?php echo esc_attr($transparent_logo_class . $trans_retina_logo_class .$glazov_logo_default_cls .$glazov_default_retina_cls); ?>" style="<?php echo esc_attr($glazov_brand_logo_top); echo esc_attr($glazov_brand_logo_bottom); ?>">
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
	<?php
	if (isset($glazov_transparent_header) && isset($glazov_transparent_logo)) {
		if (isset($glazov_transparent_logo)){
			if (isset($glazov_transparent_retina)){
				$glazov_transparent_retina_alt = get_post_meta($glazov_transparent_retina, '_wp_attachment_image_alt', true);
				$image_media_class = get_post_meta($glazov_transparent_retina, 'image_media_class', true);
				echo '<img src="'. esc_url(wp_get_attachment_url($glazov_transparent_retina)) .'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).' alt="'. esc_attr($glazov_transparent_retina_alt) .'" class="transparent-retina-logo transparent-logo '.esc_attr($image_media_class).'">';
			}
			$glazov_transparent_logo_alt = get_post_meta($glazov_transparent_logo, '_wp_attachment_image_alt', true);
			$image_media_class = get_post_meta($glazov_transparent_logo, 'image_media_class', true);
			echo '<img src="'. esc_url(wp_get_attachment_url($glazov_transparent_logo)) .'" alt="'. esc_attr($glazov_transparent_logo_alt) .'" class="transparent-default-logo transparent-logo '.esc_attr($image_media_class).'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).'>';
		} elseif (isset($glazov_brand_logo_default)){
			if ($glazov_brand_logo_retina){
				$glazov_brand_logo_retina_alt = get_post_meta($glazov_brand_logo_retina, '_wp_attachment_image_alt', true);
				$image_media_class = get_post_meta($glazov_brand_logo_retina, 'image_media_class', true);
				echo '<img src="'. esc_url(wp_get_attachment_url($glazov_brand_logo_retina)) .'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).' alt="'. esc_attr($glazov_brand_logo_retina_alt) .'" class="retina-logo '.esc_attr($image_media_class).'">
					';
			}
			$glazov_brand_logo_default_alt = get_post_meta($glazov_brand_logo_default, '_wp_attachment_image_alt', true);
			$image_media_class = get_post_meta($glazov_brand_logo_default, 'image_media_class', true);
			echo '<img src="'. esc_url(wp_get_attachment_url($glazov_brand_logo_default)) .'" alt="'. esc_attr($glazov_brand_logo_default_alt) .'" class="default-logo '.esc_attr($image_media_class).'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).'>';
		} else {
			echo '<div class="text-logo">'. esc_attr(get_bloginfo( 'name' )) . '</div>';
		}
		if (isset($glazov_brand_logo_default)){
			if ($glazov_brand_logo_retina){
				$glazov_brand_logo_retina_alt = get_post_meta($glazov_brand_logo_retina, '_wp_attachment_image_alt', true);
				$image_media_class = get_post_meta($glazov_brand_logo_retina, 'image_media_class', true);
				echo '<img src="'. esc_url(wp_get_attachment_url($glazov_brand_logo_retina)) .'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).' alt="'. esc_attr($glazov_brand_logo_retina_alt) .'" class="retina-logo sticky-logo '.esc_attr($image_media_class).'">
					';
			}
			$glazov_brand_logo_default_alt = get_post_meta($glazov_brand_logo_default, '_wp_attachment_image_alt', true);
			$image_media_clss = get_post_meta($glazov_brand_logo_default, 'image_media_class', true);
			echo '<img src="'. esc_url(wp_get_attachment_url($glazov_brand_logo_default)) .'" alt="'. esc_attr($glazov_brand_logo_default_alt) .'" class="default-logo sticky-logo '.esc_attr($image_media_clss).'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).'>';
		}
	} elseif (isset($glazov_brand_logo_default)){
		if ($glazov_brand_logo_retina){
			$glazov_brand_logo_retina_alt = get_post_meta($glazov_brand_logo_retina, '_wp_attachment_image_alt', true);
			$image_media_class = get_post_meta($glazov_brand_logo_retina, 'image_media_class', true);
			echo '<img src="'. esc_url(wp_get_attachment_url($glazov_brand_logo_retina)) .'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).' alt="'. esc_attr($glazov_brand_logo_retina_alt) .'" class="retina-logo '.esc_attr($image_media_class).'">
				';
		}
		$glazov_brand_logo_default_alt = get_post_meta($glazov_brand_logo_default, '_wp_attachment_image_alt', true);
		$image_media_class = get_post_meta($glazov_brand_logo_default, 'image_media_class', true);
		echo '<img src="'. esc_url(wp_get_attachment_url($glazov_brand_logo_default)) .'" alt="'. esc_attr($glazov_brand_logo_default_alt) .'" class="default-logo '.esc_attr($image_media_class).'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).'>';
	} else {
		echo '<div class="text-logo">'. esc_attr(get_bloginfo( 'name' )) . '</div>';
	}
	if ($glazov_mobile_logo) {
		$glazov_mobile_logo_alt = get_post_meta($glazov_mobile_logo, '_wp_attachment_image_alt', true);
		$image_media_class = get_post_meta($glazov_mobile_logo, 'image_media_class', true);
		echo '<img src="'. esc_url(wp_get_attachment_url($glazov_mobile_logo)) .'" width="'. esc_attr($glazov_mobile_width) .'" height="'. esc_attr($glazov_mobile_height) .'" alt="'. esc_attr($glazov_mobile_logo_alt) .'" class="mobile-logo '.esc_attr($image_media_class).'">';
	}
	echo '</a>';
	?>
</div>
<?php
