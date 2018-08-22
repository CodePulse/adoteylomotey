<?php
/*
 * Glazov Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Define - Folder Paths
 */
define( 'GLAZOV_THEMEROOT_PATH', get_template_directory() );
define( 'GLAZOV_THEMEROOT_URI', get_template_directory_uri() );
define( 'GLAZOV_CSS', GLAZOV_THEMEROOT_URI . '/assets/css' );
define( 'GLAZOV_IMAGES', GLAZOV_THEMEROOT_URI . '/assets/images' );
define( 'GLAZOV_SCRIPTS', GLAZOV_THEMEROOT_URI . '/assets/js' );
define( 'GLAZOV_FRAMEWORK', get_template_directory() . '/inc' );
define( 'GLAZOV_LAYOUT', get_template_directory() . '/layouts' );
define( 'GLAZOV_CS_IMAGES', GLAZOV_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'GLAZOV_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'GLAZOV_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$glazov_theme_child = wp_get_theme();
	$glazov_get_parent = $glazov_theme_child->Template;
	$glazov_theme = wp_get_theme($glazov_get_parent);
} else { // Parent Theme Active
	$glazov_theme = wp_get_theme();
}
define('GLAZOV_NAME', $glazov_theme->get( 'Name' ), true);
define('GLAZOV_VERSION', $glazov_theme->get( 'Version' ), true);
define('GLAZOV_BRAND_URL', $glazov_theme->get( 'AuthorURI' ), true);
define('GLAZOV_BRAND_NAME', $glazov_theme->get( 'Author' ), true);

/**
 * All Main Files Include
 */
require_once( GLAZOV_FRAMEWORK . '/init.php' );
