<?php
	// Main Text
	$glazov_footer_copyright_layout = cs_get_option('footer_copyright_layout');

	if ($glazov_footer_copyright_layout === 'copyright-1') {
		$glazov_copyright_layout_class = 'col-sm-6';
		$glazov_copyright_seclayout_class = 'pull-right';
	} elseif ($glazov_footer_copyright_layout === 'copyright-2') {
		$glazov_copyright_layout_class = 'col-sm-6 pull-right text-right';
		$glazov_copyright_seclayout_class = 'pull-left';
	} elseif ($glazov_footer_copyright_layout === 'copyright-3') {
		$glazov_copyright_layout_class = 'col-sm-12 text-center';
	} else {
		$glazov_copyright_layout_class = '';
		$glazov_copyright_seclayout_class = '';
	}
?>

<!-- Copyright Bar -->
<footer class="glzv-footer">
	<div class="footer-wrap">
		<div class="copy-pull-left <?php echo esc_attr($glazov_copyright_layout_class); ?>">
			<?php
				$glazov_copyright_text = cs_get_option('copyright_text');
				if ($glazov_copyright_text) {
					echo do_shortcode($glazov_copyright_text);
				} else {
					esc_html_e('&copy;', 'glazov');
					echo date('Y');
					esc_html_e(' Glazov. All Rights Reserved.', 'glazov');
				}
			?>
		</div>
		<?php if ($glazov_footer_copyright_layout != 'copyright-3') { ?>
		<div class="copy-pull-right <?php echo esc_attr($glazov_copyright_seclayout_class); ?>">
			<?php
				$glazov_secondary_text = cs_get_option('secondary_text');
				if($glazov_secondary_text){
					echo do_shortcode($glazov_secondary_text);
				}
			?>
		</div>
		<?php } ?>
	</div>
</footer>
<?php
