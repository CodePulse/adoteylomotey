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
$glazov_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ( !post_password_required() ) {
if ($glazov_page_layout) {

	$glazov_page_layout = $glazov_page_layout['page_layout'];
	if ($glazov_page_layout === 'extra-width') {
		$glazov_column_class = 'extra-width';
		$glazov_layout_class = 'container-fluid';
	} elseif($glazov_page_layout === 'left-sidebar' || $glazov_page_layout === 'right-sidebar') {
		$glazov_column_class = 'col-md-9';
		$glazov_layout_class = 'container';
	} else {
		$glazov_column_class = 'col-md-12';
		$glazov_layout_class = 'container';
	}

	// Page Layout Class
	if ($glazov_page_layout === 'left-sidebar') {
		$glazov_sidebar_class = 'left-sidebar';
	} elseif ($glazov_page_layout === 'right-sidebar') {
		$glazov_sidebar_class = 'glzv-right-sidebar';
	} elseif ($glazov_page_layout === 'extra-width') {
		$glazov_sidebar_class = 'glzv-extra-width';
	} else {
		$glazov_sidebar_class = 'glzv-full-width';
	}
} else {
	$glazov_column_class = 'col-md-12';
	$glazov_layout_class = 'container';
	$glazov_sidebar_class = 'glzv-full-width';
}

} else {
	$glazov_column_class = 'extra-width';
	$glazov_layout_class = 'container-fluid';
	$glazov_sidebar_class = 'glzv-full-width';
}

get_header();
 ?>

<div class="glzv-page-wrap glzv-mid-wrap <?php echo esc_attr($glazov_content_padding .' '. $glazov_sidebar_class); ?> glzv-content-area" style="<?php echo esc_attr($glazov_custom_padding); ?>">
<div class="mid-wrap-inner">
<div class="<?php echo esc_attr($glazov_layout_class); ?>">
	<div class="row">
		<?php
			// Left Sidebar
			if($glazov_page_layout === 'left-sidebar') {
	   		get_sidebar();
			}
		?>
		<div class="glzv-content-side glzv-primary <?php echo esc_attr($glazov_column_class); ?>">
			<?php
				while ( have_posts() ) : the_post();
					the_content();
					echo glazov_wp_link_pages();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
			?>
		</div><!-- Content Area -->
		<?php
			// Right Sidebar
			if($glazov_page_layout === 'right-sidebar') {
				get_sidebar();
			}
		?>
	</div>
</div>
</div>
</div>
<?php
get_footer();
