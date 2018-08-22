<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Theme Options
$glazov_error_heading = cs_get_option('error_heading');
$glazov_error_page_content = cs_get_option('error_page_content');
$glazov_error_page_bg = cs_get_option('error_page_bg');
$glazov_error_btn_text = cs_get_option('error_btn_text');

$glazov_error_heading = ( $glazov_error_heading ) ? $glazov_error_heading : esc_html__( 'Oops! Page Not Found!', 'glazov' );
$glazov_error_page_content = ( $glazov_error_page_content ) ? $glazov_error_page_content : esc_html__( 'It looks like nothing was found at this location. Click the link below to return home.', 'glazov' );
$glazov_error_page_bg = ( $glazov_error_page_bg ) ? wp_get_attachment_url($glazov_error_page_bg) : GLAZOV_IMAGES . '/backgrounds/background6.png';
$image_id = wp_get_attachment_url($glazov_error_page_bg);
$image_media_class = get_post_meta($image_id, 'image_media_class', true);
$glazov_error_btn_text = ( $glazov_error_btn_text ) ? $glazov_error_btn_text : esc_html__( 'BACK TO HOME', 'glazov' );

get_header(); ?>
<!-- Glzv Full Wrap -->
<!-- <div class="glzv-main-wrap glzv-full-page"> -->
	<div class="glzv-full-wrap">
		<div class="glzv-full-background <?php echo esc_attr($image_media_class); ?>" style="background-image: url(<?php echo esc_url($glazov_error_page_bg); ?>);">
			<div class="full-background-wrap">
				<div class="vertical-scroll">
					<div class="glzv-table-wrap">
						<div class="glzv-align-wrap">
							<div class="container">
								<div class="glzv-404-error">
									<h1 class="error-title"><?php esc_html_e('404', 'glazov'); ?></h1>
									<h2 class="error-subtitle"><?php echo esc_attr($glazov_error_heading); ?></h2>
									<p><?php echo esc_attr($glazov_error_page_content); ?></p>
									<a href="<?php echo esc_url(home_url( '/' )); ?>" class="glzv-btn"><?php echo esc_attr($glazov_error_btn_text); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- </div> -->
<?php
get_footer();
