<?php
/*
 * The template for displaying all single portfolios.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
// Metabox
$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );
$portfolio_meta  = get_post_meta( $glazov_id, 'portfolio_single_metabox', true );
if ($portfolio_meta) {
	$portfolio_layout = $portfolio_meta['portfolio_single_layout'];
} else {
	$portfolio_layout = '';
}
get_header(); ?>
<div class="glzv-port-sngle-wrap">
<?php
	if ( !post_password_required() ) {
		get_template_part('layouts/portfolio-single/'.$portfolio_layout );
	} else {
		echo	get_the_password_form();
	} ?>
</div>
<?php
get_footer();