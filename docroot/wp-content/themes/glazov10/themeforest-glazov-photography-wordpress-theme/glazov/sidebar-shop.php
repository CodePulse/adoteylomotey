<?php
/*
 * The sidebar only for WooCommerce pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$glazov_woo_widget = cs_get_option('woo_widget');
$glazov_sidebar_type = cs_get_option('woo_sidebar_type');
	if ($glazov_sidebar_type) {
	  $sidebar_type_cls = ' glzv-floating-sidebar';
	} else {
		$sidebar_type_cls = '';
	}
?>
<div class="col-md-3 glzv-secondary <?php echo esc_attr($sidebar_type_cls); ?>">
	<?php if ($glazov_woo_widget) {
		if (is_active_sidebar($glazov_woo_widget)) {
			dynamic_sidebar($glazov_woo_widget);
		}
	} else {
		if (is_active_sidebar( 'sidebar-shop' )) {
			dynamic_sidebar( 'sidebar-shop' );
		}
	} ?>
</div><!-- #secondary -->
<?php
