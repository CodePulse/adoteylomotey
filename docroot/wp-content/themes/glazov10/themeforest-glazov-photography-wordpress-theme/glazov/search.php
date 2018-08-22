<?php
/*
 * The template for displaying search results pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

get_header();

// Theme Options
$glazov_sidebar_position = cs_get_option('blog_sidebar_position');

// Sidebar Position
if ($glazov_sidebar_position === 'sidebar-hide') {
	$glazov_layout_class = 'col-md-12';
	$glazov_sidebar_class = 'glzv-hide-sidebar';
} elseif ($glazov_sidebar_position === 'sidebar-left') {
	$glazov_layout_class = 'col-md-9';
	$glazov_sidebar_class = 'left-sidebar';
} else {
	$glazov_layout_class = 'col-md-9';
	$glazov_sidebar_class = 'glzv-right-sidebar';
}
?>

<div class="container glzv-content-area <?php echo esc_attr($glazov_sidebar_class); ?>">
	<div class="row">
		<?php
			if ($glazov_sidebar_position === 'sidebar-left' && $glazov_sidebar_position !== 'sidebar-hide') {
				get_sidebar(); // Sidebar
			}
		?>
		<div class="glzv-content-side <?php echo esc_attr($glazov_layout_class); ?>">
			<div class="blog-items-wrap">

				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'layouts/post/content' );
					endwhile;
				else :
					get_template_part( 'layouts/post/content', 'none' );
				endif; ?>

			</div><!-- Blog Div -->
			<?php
		    glazov_paging_nav();
		    wp_reset_postdata();  // avoid errors further down the page
			?>
		</div><!-- Content Area -->

			<?php
				if ($glazov_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
			?>
	</div>
</div>
<?php
get_footer();
