<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'glazov_vt_scripts_styles' ) ) {
  function glazov_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', GLAZOV_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'bootstrap', GLAZOV_CSS .'/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'owl-carousel', GLAZOV_CSS .'/owl.carousel.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'jquery-mCustomScrollbar', GLAZOV_CSS .'/jquery.mCustomScrollbar.min.css', array(), GLAZOV_VERSION, 'all' );
    wp_enqueue_style( 'jquery-multiscroll', GLAZOV_CSS .'/jquery.multiscroll.min.css', array(), '0.1.8', 'all' );
    wp_enqueue_style( 'lightgallery', GLAZOV_CSS .'/lightgallery.min.css', array(), '1.5.0', 'all' );
    wp_enqueue_style( 'swiper', GLAZOV_CSS .'/swiper.min.css', array(), '3.4.0', 'all' );
    wp_enqueue_style( 'loaders', GLAZOV_CSS .'/loaders.min.css', array(), GLAZOV_VERSION, 'all' );
    wp_enqueue_style( 'meanmenu', GLAZOV_CSS .'/meanmenu.css', array(), '2.0.7', 'all' );
    wp_enqueue_style( 'glazov-style', GLAZOV_CSS .'/styles.css', array(), GLAZOV_VERSION, 'all' );
    wp_enqueue_style( 'glazov-google-fonts', '//fonts.googleapis.com/css?family=Ek+Mukta:300,400,500,600|Dosis:300,400,500,600,700', false );

    // Scripts
    wp_enqueue_script( 'bootstrap', GLAZOV_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
    wp_enqueue_script( 'jquery-meanmenu', GLAZOV_SCRIPTS . '/jquery.meanmenu.js', array( 'jquery' ), '2.0.8', true );
    wp_enqueue_script( 'jquery-easings', GLAZOV_SCRIPTS . '/jquery.easings.min.js', array( 'jquery' ), '1.9.2', true );
    wp_enqueue_script( 'jquery-multiscroll', GLAZOV_SCRIPTS . '/jquery.multiscroll.min.js', array( 'jquery' ), '0.1.8', true );
    wp_enqueue_script( 'html5shiv', GLAZOV_SCRIPTS . '/html5shiv.min.js', array( 'jquery' ), '3.7.0', true );
    wp_enqueue_script( 'respond', GLAZOV_SCRIPTS . '/respond.min.js', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_script( 'placeholders', GLAZOV_SCRIPTS . '/placeholders.min.js', array( 'jquery' ), '4.0.1', true );
    wp_enqueue_script( 'sticky', GLAZOV_SCRIPTS . '/sticky.min.js', array( 'jquery' ), '1.0.4', true );
    wp_enqueue_script( 'swiper', GLAZOV_SCRIPTS . '/swiper.min.js', array( 'jquery' ), '3.4.0', true );
    wp_enqueue_script( 'enscroll', GLAZOV_SCRIPTS . '/enscroll.min.js', array( 'jquery' ), '0.6.2', true );
    wp_enqueue_script( 'zoom-image', GLAZOV_SCRIPTS . '/zoom-image.min.js', array( 'jquery' ), GLAZOV_VERSION, true );
    wp_enqueue_script( 'mCustomScrollbar', GLAZOV_SCRIPTS . '/jquery.mCustomScrollbar.min.js', array( 'jquery' ), '3.1.5', true );
    wp_enqueue_script( 'parallax', GLAZOV_SCRIPTS . '/parallax.min.js', array( 'jquery' ), '0.6.2', true );
    wp_enqueue_script( 'isotope', GLAZOV_SCRIPTS . '/isotope.pkgd.min.js', array( 'jquery' ), '3.0.1', true );
    wp_enqueue_script( 'packery-mode', GLAZOV_SCRIPTS . '/packery-mode.pkgd.min.js', array( 'jquery' ), '2.0.0', true );
    wp_enqueue_script( 'jquery-hoverdir', GLAZOV_SCRIPTS . '/jquery.hoverdir.min.js', array( 'jquery' ), '1.1.2', true );
    wp_enqueue_script( 'panr', GLAZOV_SCRIPTS . '/jquery.panr.min.js', array( 'jquery' ), '0.0.1', true );
    wp_enqueue_script( 'lightgallery', GLAZOV_SCRIPTS . '/lightgallery.min.js', array( 'jquery' ), '1.6.0', true );
    wp_enqueue_script( 'theia-sticky-sidebar', GLAZOV_SCRIPTS . '/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.5.0', true );
    wp_enqueue_script( 'owl-carousel', GLAZOV_SCRIPTS . '/owl-carousel.min.js', array( 'jquery' ), '2.1.6', true );
    wp_enqueue_script( 'responsiveTabs', GLAZOV_SCRIPTS . '/jquery.responsiveTabs.min.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'matchHeight', GLAZOV_SCRIPTS . '/jquery.matchHeight.min.js', array( 'jquery' ), '0.7.2', true );
    wp_enqueue_script( 'loaders', GLAZOV_SCRIPTS . '/loaders.min.js', array( 'jquery' ), GLAZOV_VERSION, true );
    wp_enqueue_script( 'greensock', GLAZOV_SCRIPTS . '/greensock.min.js', array( 'jquery' ), '1.18.0', true );
    wp_enqueue_script( 'glazov-scripts', GLAZOV_SCRIPTS . '/scripts.js', array( 'jquery' ), GLAZOV_VERSION, true );

    // Comments
    wp_enqueue_script( 'validate', GLAZOV_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive
    wp_enqueue_style( 'glazov-responsive', GLAZOV_CSS .'/responsive.css', array(), GLAZOV_VERSION, 'all' );

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'glazov_vt_scripts_styles' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function glazov_add_editor_styles() {
  add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'glazov_add_editor_styles' );

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'glazov_vt_admin_scripts_styles' ) ) {
  function glazov_vt_admin_scripts_styles() {

    wp_enqueue_style( 'glazov-admin-main', GLAZOV_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'glazov-admin-scripts', GLAZOV_SCRIPTS . '/admin-scripts.js', true );
    wp_enqueue_script( 'tipTip', GLAZOV_SCRIPTS . '/jquery.tipTip.minified.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'glazov_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'glazov_vt_wp_enqueue_styles' ) ) {
  function glazov_vt_wp_enqueue_styles() {

    glazov_vt_google_fonts();
    add_action( 'wp_head', 'glazov_vt_custom_css', 99 );
    add_action( 'wp_head', 'glazov_vt_custom_js', 99 );
    if ( is_child_theme() ){
        wp_enqueue_style( 'glazov_framework_child', get_stylesheet_uri() );
    }

  }
  add_action( 'wp_enqueue_scripts', 'glazov_vt_wp_enqueue_styles' );
}
