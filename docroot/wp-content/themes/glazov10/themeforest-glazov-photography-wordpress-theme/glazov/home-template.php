<?php
/* Template Name: Home
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Metabox
$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );
$glazov_gallery_metabox  = get_post_meta( $glazov_id, 'page_gallery_metabox', true );
if ( $glazov_gallery_metabox ) {
	$home_template = $glazov_gallery_metabox['gallery_layout'];
} else {
	$home_template = '';
}
get_header();
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			get_template_part('layouts/home/'.$home_template );
		endwhile;
	else :
		get_template_part( 'layouts/post/content', 'none' );
	endif;
	wp_reset_postdata();  // avoid errors further down the page
get_footer();
