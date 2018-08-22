<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );

if ($glazov_meta) {
	$glazov_hide_footer  = $glazov_meta['hide_footer'];
	$glazov_hide_copyright = $glazov_meta['hide_copyright'];
} else {
	$glazov_hide_footer = '';
	$glazov_hide_copyright = '';
}
$glazov_gallery_metabox  = get_post_meta( $glazov_id, 'page_gallery_metabox', true );
if ( $glazov_gallery_metabox ) {
	$home_template = $glazov_gallery_metabox['gallery_layout'];
} else {
	$home_template = '';
}
$glazov_c_gallery_metabox  = get_post_meta( $glazov_id, 'gallery_single_metabox', true );
if ($glazov_c_gallery_metabox) {
	$gallery_layout = $glazov_c_gallery_metabox['gallery_layout'];
} else {
	$gallery_layout = '';
}
$portfolio_meta  = get_post_meta( $glazov_id, 'portfolio_single_metabox', true );
if ($portfolio_meta) {
	$portfolio_layout = $portfolio_meta['portfolio_single_layout'];
} else {
	$portfolio_layout = '';
}
?>

<div class="grop-footer_area">
	<?php
		if (!$glazov_hide_footer && !is_page_template('home-template.php') && $gallery_layout != 'gallery_kenburns' && $gallery_layout != 'gallery_horizontal' && $portfolio_layout != 'portfolio_horizontal') { // Hide Footer Metabox
			$footer_widget_block = cs_get_option('footer_widget_block');
			if ($footer_widget_block) {
	    	get_template_part( 'layouts/footer/footer', 'widgets' );
	    }
	  }
	  if ($glazov_hide_copyright) { // Hide Copyright Metabox
	  } else {
	  	$need_copyright = cs_get_option('need_copyright');
	  	if ($need_copyright) {
	    	get_template_part( 'layouts/footer/footer', 'copyright' );
	  	}
	  }
  ?>
</div>
<div class="glzv-back-top">
  <a href="javascript:void(0);"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php
// Glazov Preloader
glazov_pre_loader(); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
<?php
