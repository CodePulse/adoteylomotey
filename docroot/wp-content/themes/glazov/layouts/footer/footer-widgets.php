<?php if (is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )) { ?>
<!-- Footer Widgets -->
<div class="glzv-footer_top_widgets_warp">
	<div class="container">
		<div class="row glzv-footer_widgets">
			<?php echo glazov_vt_footer_widgets(); ?>
		</div>
	</div>
</div>
<!-- Footer Widgets -->
<?php }
