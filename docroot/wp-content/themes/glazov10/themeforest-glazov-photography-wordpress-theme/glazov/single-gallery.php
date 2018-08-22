<?php
/* Single Template for gallery
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Metabox
$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );
$glazov_c_gallery_metabox  = get_post_meta( $glazov_id, 'gallery_single_metabox', true );
if ($glazov_c_gallery_metabox) {
	$gallery_layout = $glazov_c_gallery_metabox['gallery_layout'];
} else {
	$gallery_layout = '';
}

get_header();
	if ( have_posts() ) : 	while ( have_posts() ) : the_post();
		if ( !post_password_required() ) {
			get_template_part('layouts/gallery/'.$gallery_layout );
		} else {
			echo	get_the_password_form();
		}	endwhile;
	else :
		get_template_part( 'layouts/post/content', 'none' );
	endif;
	    wp_reset_postdata();  // avoid errors further down the page
get_footer();
