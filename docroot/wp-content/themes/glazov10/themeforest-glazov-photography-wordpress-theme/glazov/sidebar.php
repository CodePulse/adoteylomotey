<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$glazov_blog_widget = cs_get_option('blog_widget');
$glazov_single_blog_widget = cs_get_option('single_blog_widget');
$glazov_team_widget = cs_get_option('team_widget');
$glazov_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
if(is_single()){
	if ($glazov_page_layout) {
		$glazov_single_sidebar_type = $glazov_page_layout['post_page_sidebar_type'];
	} else {
		$glazov_single_sidebar_type = cs_get_option('single_sidebar_type');
	}
	$glazov_single_sidebar_type = $glazov_single_sidebar_type ? $glazov_single_sidebar_type : cs_get_option('single_sidebar_type');

	if ($glazov_single_sidebar_type) {
	  $sidebar_type_cls = ' glzv-floating-sidebar';
	} else {
		$sidebar_type_cls = '';
	}
} elseif (is_page()) {
	// Page Layout Options
	if ($glazov_page_layout) {
		$glazov_sidebar_type = $glazov_page_layout['post_page_sidebar_type'];
	} else {
		$glazov_sidebar_type = '';
	}
		if ($glazov_sidebar_type) {
		  $sidebar_type_cls = ' glzv-floating-sidebar';
		} else {
			$sidebar_type_cls = '';
		}

} elseif ( !is_page()) {
	$glazov_sidebar_type = cs_get_option('blog_sidebar_type');
	if ($glazov_sidebar_type) {
	  $sidebar_type_cls = ' glzv-floating-sidebar';
	} else {
		$sidebar_type_cls = '';
	}
} else {
	$sidebar_type_cls = '';
}

if (is_page()) {
	// Page Layout Options
	$glazov_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
}
?>
<div class="col-md-3 glzv-secondary <?php echo esc_attr($sidebar_type_cls); ?>">
	<?php if (is_page() && $glazov_page_layout['page_sidebar_widget']) {
		if (is_active_sidebar($glazov_page_layout['page_sidebar_widget'])) {
			dynamic_sidebar($glazov_page_layout['page_sidebar_widget']);
		}
	} elseif (!is_page() && $glazov_blog_widget && !$glazov_single_blog_widget) {
		if (is_active_sidebar($glazov_blog_widget)) {
			dynamic_sidebar($glazov_blog_widget);
		}
	} elseif ($glazov_team_widget && is_singular('team')) {
		if (is_active_sidebar($glazov_team_widget)) {
			dynamic_sidebar($glazov_team_widget);
		}
	} elseif (is_single() && $glazov_single_blog_widget) {
		if (is_active_sidebar($glazov_single_blog_widget)) {
			dynamic_sidebar($glazov_single_blog_widget);
		}
	} else {
		if (is_active_sidebar('sidebar-1')) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
</div><!-- #secondary -->
