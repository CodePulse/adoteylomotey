<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
	if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			if ( !post_password_required() ) {
				get_template_part( 'layouts/post/content', 'single' );
			} else {
				echo	get_the_password_form();
			}
		endwhile;
	else :
		get_template_part( 'layouts/post/content', 'none' );
	endif;
get_footer();
