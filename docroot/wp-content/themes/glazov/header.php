<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
?><!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php $glazov_viewport = cs_get_option('theme_responsive');
if ($glazov_viewport) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php }
// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(GLAZOV_IMAGES); ?>/favicon.png" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
$glazov_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($glazov_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($glazov_all_element_color); ?>">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
// Metabox
global $post;
$glazov_id    = ( isset( $post ) ) ? $post->ID : false;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $glazov_id : false;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );

// Parallax
$glazov_bg_parallax = cs_get_option('theme_bg_parallax');
$glazov_hav_parallax = $glazov_bg_parallax ? ' parallax-window' : '';
$glazov_parallax_speed = cs_get_option('theme_bg_parallax_speed');
$glazov_bg_parallax_speed = $glazov_parallax_speed ? $glazov_parallax_speed : '0.4';

// Header Style
if ($glazov_meta) {
  $glazov_sticky_header  = $glazov_meta['sticky_header'];
  $glazov_menu_style = $glazov_meta['menu_style'];
} else {
  $glazov_sticky_header  = cs_get_option('sticky_header');
  $glazov_menu_style = cs_get_option('menu_style');
}

if ($glazov_meta && $glazov_menu_style !== '') {
  $glazov_menu_style = $glazov_meta['menu_style'];
} else {
  $glazov_menu_style = cs_get_option('menu_style');
}
if ($glazov_menu_style === 'style-two') {
  $menu_style_class = ' navigation-style-two';
} else {
  $menu_style_class = ' navigation-style-one';
}

$glazov_sticky_header_class = !$glazov_sticky_header ? ' ' : ' glzv-sticky';

// Header Transparent
if ($glazov_meta) {
  $glazov_transparent_header = $glazov_meta['transparency_header'];
  $glazov_full_page = $glazov_meta['full_page'];
  $glazov_transparent_header = $glazov_transparent_header ? ' transparent-header' : ' dont-transparent';
  // Shortcode Banner Type
  $glazov_banner_type = ' '. $glazov_meta['banner_type'];
} else {
  $glazov_transparent_header = ' dont-transparent';
  $glazov_banner_type = '';
  $glazov_full_page = '';
 }
 $glazov_full_page = $glazov_full_page ? ' glzv-full-page' : '';

wp_head();
if(is_404() ||  post_password_required()) {
  $error_class = ' glzv-full-page dark-transparent-header dark-footer';
} else {
  $error_class = '';
}
?>
</head>
<body <?php echo body_class(); ?>>
<!-- Glzv Main Wrap, Glzv Full Page, Header Style Two -->
<div class="glzv-main-wrap <?php echo esc_attr($glazov_transparent_header . $glazov_banner_type . $menu_style_class .$error_class .$glazov_full_page); ?>">
  <!-- Glzv Header -->
  <header class="glzv-header <?php echo esc_attr($glazov_sticky_header_class); ?>">
    <div class="header-wrap">
      <?php get_template_part( 'layouts/header/logo' ); ?>
      <a href="javascript:void(0);" class="glzv-toggle"><span class="toggle-separator"></span></a>
      <?php get_template_part( 'layouts/header/menu', 'bar' ); ?>
    </div>
  </header>

  <?php if ( post_password_required() ) {} else {
    $venture_need_title_bar = cs_get_option('hide_title_bar');
    if ($venture_need_title_bar) {} else {
      get_template_part( 'layouts/header/title', 'bar' );
    }
  }
