<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'glazov_dynamic_styles' ) ) {
  function glazov_dynamic_styles() {

    // Typography
    $glazov_vt_get_typography  = glazov_vt_get_typography();

    // Logo
    $brand_logo_top     = cs_get_option( 'brand_logo_top' );
    $brand_logo_bottom  = cs_get_option( 'brand_logo_bottom' );

    // Layout
    $bg_type = cs_get_option('theme_layout_bg_type');
    $bg_pattern = cs_get_option('theme_layout_bg_pattern');
    $bg_image = cs_get_option('theme_layout_bg');
    $bg_overlay_color = cs_get_option('theme_bg_overlay_color');

  ob_start();

global $post;
$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );

/* Layout - Theme Options - Background */
if ($bg_type === 'bg-image') {

  $layout_boxed = ( ! empty( $bg_image['image'] ) ) ? 'background-image: url('. $bg_image['image'] .');' : '';
  $layout_boxed .= ( ! empty( $bg_image['repeat'] ) ) ? 'background-repeat: '. $bg_image['repeat'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['position'] ) ) ? 'background-position: '. $bg_image['position'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['attachment'] ) ) ? 'background-attachment: '. $bg_image['attachment'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['size'] ) ) ? 'background-size: '. $bg_image['size'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['color'] ) ) ? 'background-color: '. $bg_image['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}
if ($bg_type === 'bg-pattern') {
$custom_bg_pattern = cs_get_option('custom_bg_pattern');
$layout_boxed = ( $bg_pattern === 'custom-pattern' ) ? 'background-image: url('. $custom_bg_pattern .');' : 'background-image: url('. GLAZOV_IMAGES . '/patterns/'. $bg_pattern .'.png);';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}

/* Header - Customizer */
$header_bg_color  = cs_get_customize_option( 'header_bg_color' );
if ($header_bg_color) {
echo <<<CSS
  .no-class {}
  .dont-transparent .header-wrap, .is-sticky .glzv-header,
  .transparent-header .is-sticky .glzv-header {
    background-color: {$header_bg_color};
  }
CSS;
}
// Text Logo Color
$txt_logo_color  = cs_get_customize_option( 'txt_logo_color' );
if ($txt_logo_color) {
echo <<<CSS
  .no-class {}
  .glzv-brand .text-logo {
    color: {$txt_logo_color};
  }
CSS;
}
$txt_logo_hover_color  = cs_get_customize_option( 'txt_logo_hover_color' );
if ($txt_logo_hover_color) {
echo <<<CSS
  .no-class {}
  .glzv-brand .text-logo:hover {
    color: {$txt_logo_hover_color};
  }
CSS;
}

$header_link_color  = cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = cs_get_customize_option( 'header_link_hover_color' );
if($header_link_color || $header_link_hover_color) {
echo <<<CSS
  .no-class {}
  .navigation-style-one .navigation > li > a {
    color: {$header_link_color};
  }
  .navigation-style-one .navigation > li:hover > a, .navigation-style-one .navigation > li.active > a,
  .navigation-style-one .navigation > li:hover > a, .navigation-style-one .navigation > li.active > a {
    color: {$header_link_hover_color};
  }
CSS;
}
// Metabox - Header Transparent
if ($glazov_meta) {
  $transparent_header = $glazov_meta['transparency_header'];
  $transparent_menu_color = $glazov_meta['transparent_menu_color'];
  $transparent_menu_hover = $glazov_meta['transparent_menu_hover_color'];
} else {
  $transparent_header = '';
  $transparent_menu_color = '';
  $transparent_menu_hover = '';
}
if ($transparent_header) {
if($transparent_menu_color){
  echo <<<CSS
  .no-class {}
  .transparent-header .navigation > li > a{
    color: {$transparent_menu_color};
  }
CSS;
}
if($transparent_menu_hover){
  echo <<<CSS
  .no-class {}
  .transparent-header .navigation > li > a:hover,
  .transparent-header .navigation > li > a:focus,
  .transparent-header .navigation > li.active {
    color: {$transparent_menu_hover};
  }
CSS;
}
}

$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_border_color  = cs_get_customize_option( 'submenu_border_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_bg_color || $submenu_border_color || $submenu_link_color || $submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .navigation-style-one .dropdown-menu > li > a {
    color: {$submenu_link_color};
  }
  .navigation-style-one .dropdown-nav > li:hover > a,
  .navigation-style-one .dropdown-nav > li.active > a {
    color: {$submenu_link_hover_color};
  }
  .navigation-style-one .dropdown-nav {
    background-color: {$submenu_bg_color};
  }
  .navigation-style-one .dropdown-nav > li > a {
    color: {$submenu_link_color};
  }
  .navigation-style-one .dropdown-nav > li > a {
    border-bottom-color: {$submenu_border_color};
  }
CSS;
}

// Menu Style Two
$menu_color_two  = cs_get_customize_option( 'menu_color_two' );
if ($menu_color_two) {
echo <<<CSS
  .no-class {}
  .navigation-style-two .navigation > li > a {
    color: {$menu_color_two};
  }
CSS;
}

$menu_hover_color_two  = cs_get_customize_option( 'menu_hover_color_two' );
if ($menu_hover_color_two) {
echo <<<CSS
  .no-class {}
  .navigation-style-two .navigation > li > a:hover {
    color: {$menu_hover_color_two};
  }
CSS;
}

$sub_menu_color_two  = cs_get_customize_option( 'sub_menu_color_two' );
if ($sub_menu_color_two) {
echo <<<CSS
  .no-class {}
  .navigation-style-two .dropdown-nav > li > a {
    color: {$sub_menu_color_two};
  }
CSS;
}

$sub_menu_hover_color_two  = cs_get_customize_option( 'sub_menu_hover_color_two' );
if ($sub_menu_hover_color_two) {
echo <<<CSS
  .no-class {}
  .navigation-style-two .dropdown-nav > li:hover > a,
  .navigation-style-two .dropdown-nav > li.active > a {
    color: {$sub_menu_hover_color_two};
  }
CSS;
}

$menu_bg_color  = cs_get_customize_option( 'menu_bg_color' );
if ($menu_bg_color) {
echo <<<CSS
  .no-class {}
  .navigation-wrap {
    background-color: {$menu_bg_color};
  }
CSS;
}

$menu_copyright_color  = cs_get_customize_option( 'menu_copyright_color' );
if ($menu_copyright_color) {
echo <<<CSS
  .no-class {}
  .navigation-bottom-wrap .pull-left {
    color: {$menu_copyright_color};
  }
CSS;
}

$menu_copyright_link_color  = cs_get_customize_option( 'menu_copyright_link_color' );
if ($menu_copyright_link_color) {
echo <<<CSS
  .no-class {}
  .navigation-bottom-wrap .pull-left a {
    color: {$menu_copyright_link_color};
  }
CSS;
}

$menu_copyright_link_hover_color  = cs_get_customize_option( 'menu_copyright_link_hover_color' );
if ($menu_copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .navigation-bottom-wrap .pull-left a:hover {
    color: {$menu_copyright_link_hover_color};
  }
CSS;
}
// Toggle Button Colors
$toggle_icon_color  = cs_get_customize_option( 'toggle_icon_color' );
if ($toggle_icon_color) {
echo <<<CSS
  .no-class {}
  .transparent-header .toggle-separator, .transparent-header .toggle-separator:before,
  .transparent-header .toggle-separator:after,
  .close-btn a:before, .close-btn a:after {
    background: {$toggle_icon_color};
  }
CSS;
}

$toggle_bg_color  = cs_get_customize_option( 'toggle_bg_color' );
if ($toggle_bg_color) {
echo <<<CSS
  .no-class {}
  .close-btn a {
    background-color: {$toggle_bg_color};
  }
CSS;
}

$toggle_bg_hover_color  = cs_get_customize_option( 'toggle_bg_hover_color' );
if ($toggle_bg_hover_color) {
echo <<<CSS
  .no-class {}
  .close-btn a:hover {
    background-color: {$toggle_bg_hover_color};
  }
  .close-btn a {
    border-color: {$toggle_bg_hover_color};
  }
CSS;
}

/* Title Area - Theme Options - Background */
$titlebar_bg = cs_get_option('titlebar_bg');
$title_heading_color  = cs_get_customize_option( 'titlebar_title_color' );
if ($titlebar_bg) {

  $title_area = ( ! empty( $titlebar_bg['image'] ) ) ? 'background-image: url('. $titlebar_bg['image'] .');' : '';
  $title_area .= ( ! empty( $titlebar_bg['repeat'] ) ) ? 'background-repeat: '. $titlebar_bg['repeat'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['position'] ) ) ? 'background-position: '. $titlebar_bg['position'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['attachment'] ) ) ? 'background-attachment: '. $titlebar_bg['attachment'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['size'] ) ) ? 'background-size: '. $titlebar_bg['size'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['color'] ) ) ? 'background-color: '. $titlebar_bg['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .glzv-title-area {
    {$title_area}
  }
CSS;
}
if ($title_heading_color) {
echo <<<CSS
  .no-class {}
  .banner-title {
    color: {$title_heading_color};
  }
CSS;
}

/* Footer */
$footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
if ($footer_bg_color) {
echo <<<CSS
  .no-class {}
  .glzv-footer_top_widgets_warp {background-color: {$footer_bg_color};}
CSS;
}

$footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
if ($footer_heading_color) {
echo <<<CSS
  .no-class {}
  .glzv-footer_widgets h1, .glzv-footer_widgets h2, .glzv-footer_widgets h3, .glzv-footer_widgets h4, .glzv-footer_widgets h5, .glzv-footer_widgets h6, .glzv-footer_top_widgets_warp .widget-title {color: {$footer_heading_color};}
CSS;
}

$footer_text_color  = cs_get_customize_option( 'footer_text_color' );
if ($footer_text_color) {
echo <<<CSS
  .no-class {}
  .glzv-footer_widgets .glzv-widget p,
  .glzv-footer_widgets .widget_rss .rssSummary, .glzv-footer_widgets .glzv-widget .post-info .post-time, .glzv-footer_widgets .glzv-widget select,
  .glzv-footer_widgets caption, .glzv-footer_widgets input[type="text"],
  .glzv-footer_widgets .widget_recent_comments ul li span, .glzv-footer_widgets .glzv-widget,
  .glzv-footer_widgets .widget_rss cite, .glzv-footer_widgets .widget_rss span,
  .glzv-footer_widgets input[type="search"], .glzv-footer_widgets .woocommerce ul.cart_list .woocommerce-Price-amount,
  .glzv-footer_widgets .woocommerce ul.product_list_widget .woocommerce-Price-amount, .glzv-footer_widgets #wp-calendar tbody,
  .glzv-footer_widgets #wp-calendar thead th,
  .glzv-footer_widgets .glzv-widget.woocommerce.widget_shopping_cart span.woocommerce-Price-amount.amount {color: {$footer_text_color};}
CSS;
}

$footer_link_color  = cs_get_customize_option( 'footer_link_color' );
if ($footer_link_color) {
echo <<<CSS
  .no-class {}
  .glzv-footer_widgets a, .glzv-footer_widgets .widget_categories ul li a, .glzv-footer_widgets .widget_archive ul li a,
  .glzv-footer_widgets .widget_meta ul li a, .glzv-footer_widgets .widget_recent_entries ul li a,
  .glzv-footer_widgets .widget_recent_comments ul li a, .glzv-footer_widgets .widget_pages ul li a,
  .glzv-footer_widgets .widget_rss ul li a, .glzv-footer_widgets .widget_nav_menu ul li a,
  .glzv-footer_widgets .widget_product_categories ul li a, .glzv-footer_widgets .woocommerce ul.cart_list li a,
  .glzv-footer_widgets .woocommerce ul.product_list_widget li a,
  .glzv-footer_widgets .widget_calendar tfoot a,
  .glzv-footer_widgets .glzv-widget.woocommerce.widget_shopping_cart ul li a {color: {$footer_link_color};}
CSS;
}

$footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );
if ($footer_link_hover_color) {
echo <<<CSS
  .no-class {}
  .glzv-footer_widgets a:hover,
  .glzv-footer_widgets .widget_categories ul li a:hover, .glzv-footer_widgets .widget_archive ul li a:hover, .glzv-footer_widgets .widget_meta ul li a:hover,
  .glzv-footer_widgets .widget_recent_entries ul li a:hover, .glzv-footer_widgets .widget_recent_comments ul li a:hover,
  .glzv-footer_widgets .widget_pages ul li a:hover, .glzv-footer_widgets .widget_rss ul li a:hover,
  .glzv-footer_widgets .widget_nav_menu ul li a:hover, .glzv-footer_widgets .widget_product_categories ul li a:hover,
  .glzv-footer_widgets .woocommerce.widget_products ul li a:hover, .glzv-footer_widgets .woocommerce.widget_recent_reviews ul li a:hover,
  .glzv-footer_widgets .woocommerce.widget_top_rated_products ul li a:hover,
  .glzv-footer_widgets .woocommerce ul.cart_list li a:hover,
  .glzv-footer_widgets .woocommerce ul.product_list_widget li a:hover,
  .glzv-footer_widgets .woocommerce ul.cart_list li a:focus,
  .glzv-footer_widgets .woocommerce ul.product_list_widget li a:focus,
  .glzv-footer_widgets .widget_calendar tfoot a:hover,
  .glzv-footer_widgets .widget_calendar tfoot a:focus,
  .glzv-footer_widgets .glzv-widget.woocommerce.widget_shopping_cart ul li a:hover,
  .glzv-footer_widgets .glzv-widget.woocommerce.widget_shopping_cart ul li a:focus {color: {$footer_link_hover_color};}
CSS;
}

/* Copyright */
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );
if ($copyright_bg_color) {
echo <<<CSS
  .no-class {}
  .footer-wrap {background: {$copyright_bg_color};}
CSS;
}
if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .footer-wrap {color: {$copyright_text_color};}
CSS;
}
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .footer-wrap a {color: {$copyright_link_color};}
CSS;
}
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .footer-wrap a:hover {color: {$copyright_link_hover_color};}
CSS;
}

// Content Colors
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
  .glzv-primary p, .blog-meta a, .blog-meta,
  .author-content .author-pro,
  .entry-content textarea, .entry-content .comment-form label,
  .blog-detail-wrap p, .blog-detail-wrap blockquote p, blockquote,
  .glzv-comments-area .glzv-comments-meta .comments-date,
  input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="search"],
  input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"],
  input[type="url"], input[type="number"], textarea, select, .form-control,
  .glzv-sigltags_warp > span, .glzv-pagination span, .wp-link-pages > span,
  .glzv-full-wrap .swiper-container, .author-signature, .testimonial-author,
  .testimonial-author span, .testimonial-author span a, .archive-total-images, .proof-client-info,
  .proof-gallery-info, .glzv-mid-wrap p, .portfolio-detail-title, .portfolio-short-details,
  .portfolio-horizontal .portfolio-detail-wrap p, .portfolio-detail-sidebar .portfolio-detail-wrap p,
  .glzv-contact-form .glzv-section-title p, .woocommerce ul.products li.product .price,
  .woocommerce .woocommerce-result-count, .woocommerce-page .woocommerce-result-count,
  .woocommerce .woocommerce-ordering select, .woocommerce nav.woocommerce-pagination ul li span.current,
  .woocommerce div.product p.price, .woocommerce div.product span.price,
  .woocommerce .quantity .qty, .product_meta, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta,
  .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta time,
  .woocommerce #reviews #reply-title, .woocommerce #review_form #respond p label,
  .woocommerce-error, .woocommerce-info, .woocommerce-message, .woocommerce table.shop_table th,
  .woocommerce table.shop_table td, .woocommerce ul#shipping_method li label, .woocommerce table.shop_table tr.shipping th,
  .woocommerce form .form-row label, .woocommerce-page form .form-row label,
  .woocommerce form.woocommerce-checkout .form-row input.input-text, .woocommerce form.woocommerce-checkout .form-row select,
  .select2-container--default .select2-selection--single .select2-selection__rendered,
  .woocommerce form .form-row .required, form label,
  .woocommerce #add_payment_method #payment div.payment_box p, .woocommerce .woocommerce-cart #payment div.payment_box p, .woocommerce .woocommerce-checkout #payment div.payment_box p, .glzv-primary ul li, .glzv-primary address {color: {$body_color};}
CSS;
}
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) {
echo <<<CSS
  .no-class {}
  .glzv-primary a, .glzv-sigl_tags a, .glzv-full-wrap .swiper-container a, .glzv-sliding-showcase a,
  .proof-client-info ul li a, .glzv-mid-wrap a, .portfolio-short-details ul li a,
  .contact-info p a, .woocommerce-product-rating .woocommerce-review-link, .product_tags .glzv-social a,
  .woocommerce div.product .woocommerce-tabs ul.tabs li a {color: {$body_links_color};}
CSS;
}
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {
echo <<<CSS
  .no-class {}
  .glzv-primary a:hover, .glzv-primary a:focus
  .glzv-pagination a:hover, .glzv-pagination a:focus, .wp-link-pages a:hover,
  .wp-link-pages a:focus,
  .glzv-full-wrap .swiper-container a:hover, .glzv-sliding-showcase a:hover,
  .glzv-full-wrap .swiper-container a:focus, .glzv-sliding-showcase a:focus,
  .proof-client-info ul li a:hover, .proof-client-info ul li a:focus, .masonry-filters ul li a.active,
  .glzv-mid-wrap a:hover, .glzv-mid-wrap a:focus, .portfolio-short-details ul li a:hover,
  .portfolio-short-details ul li a:focus, .contact-info p a:hover,
  .contact-info p a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover,
  .woocommerce nav.woocommerce-pagination ul li a:focus, .product_tags .glzv-social a:hover,
  .product_tags .glzv-social a:focus, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
  .woocommerce div.product .woocommerce-tabs ul.tabs li a:focus,
  .woocommerce div.product .woocommerce-tabs ul.tabs li.r-tabs-state-active a {color: {$body_link_hover_color};}

  .woocommerce div.product .woocommerce-tabs ul.tabs li.r-tabs-state-active a {
    border-bottom-color:{$body_link_hover_color};
  }
CSS;
}
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .glzv-secondary .glzv-widget p,
  .glzv-secondary .widget_rss .rssSummary, .glzv-secondary .glzv-widget .post-info .post-time, .glzv-secondary .glzv-widget select,
  .glzv-secondary caption, .glzv-secondary input[type="text"],
  .glzv-secondary .widget_recent_comments ul li span, .glzv-secondary .glzv-widget,
  .glzv-secondary .widget_rss cite, .glzv-secondary .widget_rss span,
  .glzv-secondary input[type="search"], .glzv-secondary .woocommerce ul.cart_list .woocommerce-Price-amount,
  .glzv-secondary .woocommerce ul.product_list_widget .woocommerce-Price-amount, .glzv-secondary #wp-calendar tbody,
  .glzv-secondary #wp-calendar thead th {color: {$sidebar_content_color};}
CSS;
}

$sidebar_link_color  = cs_get_customize_option( 'sidebar_link_color' );
if ($sidebar_link_color) {
echo <<<CSS
  .no-class {}
  .glzv-secondary a, .glzv-secondary .widget_categories ul li a, .glzv-secondary .widget_archive ul li a, .glzv-secondary .widget_meta ul li a,
  .glzv-secondary .widget_recent_entries ul li a, .glzv-secondary .widget_recent_comments ul li a, .glzv-secondary .widget_pages ul li a,
  .glzv-secondary .widget_rss ul li a, .glzv-secondary .widget_nav_menu ul li a,
  .glzv-secondary .widget_product_categories ul li a, .glzv-secondary .woocommerce ul.cart_list li a,
  .glzv-secondary .woocommerce ul.product_list_widget li a {color: {$sidebar_link_color};}
CSS;
}

$sidebar_link_hover_color  = cs_get_customize_option( 'sidebar_link_hover_color' );
if ($sidebar_link_hover_color) {
echo <<<CSS
  .no-class {}
  .glzv-secondary a:hover,
  .glzv-secondary .widget_categories ul li a:hover, .glzv-secondary .widget_archive ul li a:hover, .glzv-secondary .widget_meta ul li a:hover,
  .glzv-secondary .widget_recent_entries ul li a:hover, .glzv-secondary .widget_recent_comments ul li a:hover,
  .glzv-secondary .widget_pages ul li a:hover, .glzv-secondary .widget_rss ul li a:hover,
  .glzv-secondary .widget_nav_menu ul li a:hover, .glzv-secondary .widget_product_categories ul li a:hover,
  .glzv-secondary .woocommerce.widget_products ul li a:hover, .glzv-secondary .woocommerce.widget_recent_reviews ul li a:hover,
  .glzv-secondary .woocommerce.widget_top_rated_products ul li a:hover,
  .glzv-secondary .woocommerce ul.cart_list li a:hover,
  .glzv-secondary .woocommerce ul.product_list_widget li a:hover,
  .glzv-secondary .woocommerce ul.cart_list li a:focus,
  .glzv-secondary .woocommerce ul.product_list_widget li a:focus {color: {$sidebar_link_hover_color};}
CSS;
}
// Heading Color
$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) {
echo <<<CSS
  .no-class {}
  .glzv-primary h1, .glzv-primary h2, .glzv-primary h3, .glzv-primary h4, .glzv-primary h5, .glzv-primary h6, .klst-related-post .blog-info h4,
  .glzv-password-protected h3, .glzv-info-title h1, .glzv-mid-wrap h1, .glzv-mid-wrap h2, .glzv-mid-wrap h3, .glzv-mid-wrap h4, .glzv-mid-wrap h5, .glzv-mid-wrap h6, .glzv-contact-form .section-title {color: {$content_heading_color};}
CSS;
}
$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) {
echo <<<CSS
  .no-class {}
  .glzv-secondary h1, .glzv-secondary h2, .glzv-secondary h3, .glzv-secondary h4, .glzv-secondary h5, .glzv-secondary h6 {color: {$sidebar_heading_color};}
CSS;
}

// Transparent Button Colors
$btn_txt_color  = cs_get_customize_option( 'btn_txt_color' );
if ($btn_txt_color) {
echo <<<CSS
  .no-class {}
  .glzv-btn, input[type="submit"], .glzv-social.rounded a,
  .glzv-full-background input[type="submit"] {color: {$btn_txt_color};}
CSS;
}
$btn_bg_color  = cs_get_customize_option( 'btn_bg_color' );
if ($btn_bg_color) {
echo <<<CSS
  .no-class {}
  .glzv-btn, input[type="submit"], .glzv-social.rounded a,
  .glzv-full-background input[type="submit"] {background-color: {$btn_bg_color};}
CSS;
}
$btn_border_color  = cs_get_customize_option( 'btn_border_color' );
if ($btn_border_color) {
echo <<<CSS
  .no-class {}
  .glzv-btn, input[type="submit"], .glzv-social.rounded a,
  .glzv-full-background input[type="submit"] {border-color: {$btn_border_color};}
CSS;
}
$btn_txt_hover_color  = cs_get_customize_option( 'btn_txt_hover_color' );
if ($btn_txt_hover_color) {
echo <<<CSS
  .no-class {}
  .glzv-btn:hover, .glzv-btn:focus, input[type="submit"]:hover, input[type="submit"]:focus,
  .glzv-social.rounded a:hover, .glzv-social.rounded a:focus,
  .glzv-full-background input[type="submit"]:hover, .glzv-full-background input[type="submit"]:focus {color: {$btn_txt_hover_color};}
CSS;
}
$btn_border_hover_color  = cs_get_customize_option( 'btn_border_hover_color' );
if ($btn_border_hover_color) {
echo <<<CSS
  .no-class {}
  .glzv-btn:hover, .glzv-btn:focus, input[type="submit"]:hover, input[type="submit"]:focus,
  .glzv-social.rounded a:hover, .glzv-social.rounded a:focus,
  .glzv-full-background input[type="submit"]:hover, .glzv-full-background input[type="submit"]:focus {border-color: {$btn_border_hover_color};}
CSS;
}
$btn_bg_hover_color  = cs_get_customize_option( 'btn_bg_hover_color' );
if ($btn_bg_hover_color) {
echo <<<CSS
  .no-class {}
  .glzv-btn:hover, .glzv-btn:focus, input[type="submit"]:hover, input[type="submit"]:focus,
  .widget_search form input[type="submit"]:hover, .widget_search form input[type="submit"]:focus,
  .glzv-social.rounded a:hover, .glzv-social.rounded a:focus,
  .glzv-full-background input[type="submit"]:hover, .glzv-full-background input[type="submit"]:focus {background-color: {$btn_bg_hover_color};}
CSS;
}

// Filled Button Colors
$fill_btn_txt_color  = cs_get_customize_option( 'fill_btn_txt_color' );
if ($fill_btn_txt_color) {
echo <<<CSS
  .no-class {}
  .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
  .woocommerce #review_form #respond .form-submit input, .woocommerce #respond input#submit, .woocommerce a.button,
  .woocommerce button.button, .woocommerce input.button,
  .woocommerce ul.products li.product .product-image-wrap a.added_to_cart.wc-forward {color: {$fill_btn_txt_color};}
CSS;
}
$fill_btn_bg_color  = cs_get_customize_option( 'fill_btn_bg_color' );
if ($fill_btn_bg_color) {
echo <<<CSS
  .no-class {}
  .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
  .woocommerce #review_form #respond .form-submit input, .woocommerce #respond input#submit, .woocommerce a.button,
  .woocommerce button.button, .woocommerce input.button,
  .woocommerce ul.products li.product .product-image-wrap a.added_to_cart.wc-forward {background-color: {$fill_btn_bg_color};}
CSS;
}
$fill_btn_border_color  = cs_get_customize_option( 'fill_btn_border_color' );
if ($fill_btn_border_color) {
echo <<<CSS
  .no-class {}
  .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
  .woocommerce #review_form #respond .form-submit input, .woocommerce #respond input#submit, .woocommerce a.button,
  .woocommerce button.button, .woocommerce input.button,
  .woocommerce ul.products li.product .product-image-wrap a.added_to_cart.wc-forward {border-color: {$fill_btn_border_color};}
CSS;
}

$fill_btn_txt_hover_color  = cs_get_customize_option( 'fill_btn_txt_hover_color' );
if ($fill_btn_txt_hover_color) {
echo <<<CSS
  .no-class {}
  .woocommerce #respond input#submit.alt:hover, .woocommerce #respond input#submit.alt:focus, .woocommerce a.button.alt:hover,
  .woocommerce a.button.alt:focus, .woocommerce button.button.alt:hover, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:hover,
  .woocommerce input.button.alt:focus, .woocommerce #review_form #respond .form-submit input:hover,
  .woocommerce #review_form #respond .form-submit input:focus, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover,
  .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:focus, .woocommerce a.button:focus,
  .woocommerce button.button:focus, .woocommerce input.button:focus,
  .woocommerce ul.products li.product .product-image-wrap a.added_to_cart.wc-forward:hover,
  .woocommerce ul.products li.product .product-image-wrap a.added_to_cart.wc-forward:focus {color: {$fill_btn_txt_hover_color};}
CSS;
}
$fill_btn_border_hover_color  = cs_get_customize_option( 'fill_btn_border_hover_color' );
if ($fill_btn_border_hover_color) {
echo <<<CSS
  .no-class {}
  .woocommerce #respond input#submit.alt:hover, .woocommerce #respond input#submit.alt:focus, .woocommerce a.button.alt:hover,
  .woocommerce a.button.alt:focus, .woocommerce button.button.alt:hover, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:hover,
  .woocommerce input.button.alt:focus, .woocommerce #review_form #respond .form-submit input:hover,
  .woocommerce #review_form #respond .form-submit input:focus, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover,
  .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:focus, .woocommerce a.button:focus,
  .woocommerce button.button:focus, .woocommerce input.button:focus,
  .woocommerce ul.products li.product .product-image-wrap a.added_to_cart.wc-forward:hover,
  .woocommerce ul.products li.product .product-image-wrap a.added_to_cart.wc-forward:focus {border-color: {$fill_btn_border_hover_color};}
CSS;
}
$fill_btn_bg_hover_color  = cs_get_customize_option( 'fill_btn_bg_hover_color' );
if ($fill_btn_bg_hover_color) {
echo <<<CSS
  .no-class {}
  .woocommerce #respond input#submit.alt:hover, .woocommerce #respond input#submit.alt:focus, .woocommerce a.button.alt:hover,
  .woocommerce a.button.alt:focus, .woocommerce button.button.alt:hover, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:hover,
  .woocommerce input.button.alt:focus, .woocommerce #review_form #respond .form-submit input:hover,
  .woocommerce #review_form #respond .form-submit input:focus, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover,
  .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:focus, .woocommerce a.button:focus,
  .woocommerce button.button:focus, .woocommerce input.button:focus,
  .woocommerce ul.products li.product .product-image-wrap a.added_to_cart.wc-forward:hover,
  .woocommerce ul.products li.product .product-image-wrap a.added_to_cart.wc-forward:focus {background-color: {$fill_btn_bg_hover_color};}
CSS;
}

// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
if ($maintenance_mode_bg) {
  $maintenance_css = ( ! empty( $maintenance_mode_bg['image'] ) ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['repeat'] ) ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['position'] ) ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['attachment'] ) ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['size'] ) ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['color'] ) ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : '';
echo <<<CSS
  .no-class {}
  .vt-maintenance-mode {
    {$maintenance_css}
  }
CSS;
}

// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '767';

echo <<<CSS
  .no-class {}
@media (max-width: {$breakpoint}px) {
  .top-nav-icons,
  .glzv-nav-search,
  .hav-mobile-logo.glzv-logo img.default-logo,
  .hav-mobile-logo.glzv-logo img.retina-logo,
  .is-sticky .glzv-logo img.default-logo.sticky-logo,
  .is-sticky .glzv-logo img.retina-logo.sticky-logo,
  .header-transparent .glzv-logo.hav-mobile-logo img.transparent-default-logo.transparent-logo,
  .header-transparent .is-sticky .glzv-logo.hav-mobile-logo img.transparent-default-logo.sticky-logo,
  .glzv-logo.hav-mobile-logo img.transparent-default-logo.sticky-logo {display: none;}
  .mean-container .top-nav-icons,
  .mean-container .glzv-logo,
  .mean-container .glzv-nav-search,
  .hav-mobile-logo.glzv-logo img.mobile-logo {display: block;}
  .mean-container .container {width: 100%;}
  .glzv-header-two .mean-container .glzv-logo {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 99999;
    padding: 0 20px;
  }
  .glzv-header-two .mean-container .glzv-navigation {
    position: absolute;
    right: 73px;
    top: 0;
    z-index: 9999;
  }
  .mean-container .glzv-nav-search {
    float: left;
    left: 0;right: auto;
    background-color: rgba(0,0,0,0.4);
  }
  .mean-container .glzv-search-three {
    position: absolute;
    width: 100%;
    left: 0;top: 0;
    z-index: 9999;
  }
  .mean-container .glzv-search-three input {
    position: absolute;
    left: 0;top: 0;
    background: rgba(0,0,0,0.4);
  }
  .glzv-header-two .mean-container .top-nav-icons {
    position: absolute;
    left: 0;
    z-index: 999999;
  }
  .hav-mobile-logo .transparent-default-logo,
  .hav-mobile-logo .default-logo {
    display: none;
  }
  .hav-mobile-logo img.mobile-logo {
    display: block;
  }
  .glzv-header-two .glzv-brand {padding-top: 20px;padding-bottom: 0;}
  .transparent-header .navigation > li > a {
    color: #151515;
  }
  .transparent-header .navigation > li:hover > a, .transparent-header .navigation > li.active > a {
    color: #000000;
    opacity: 1;
  }
  .glzv-toggle {
    display: block;
  }
  .navigation-style-two .navigation > li > a {
    color: #ffffff;
  }
  .navigation-style-two .navigation > li:hover > a, .navigation-style-two .navigation > li.active > a {
    color: #ffffff;
    opacity: 0.8;
  }
  .navigation-style-two .glzv-navigation {
    left: auto;
    width: auto;
    padding: 0;
    background: none;
    -webkit-box-shadow: none;
    -ms-box-shadow: none;
    box-shadow: none;
  }
  .navigation-style-two .glzv-navigation.open {
    top: 0;
  }
  .navigation-style-two .navigation > li {
    border-bottom: none;
  }
  .glzv-navigation {
    position: absolute;
    top: 150%;
    left: 0;
    width: 100%;
    height: 50vh;
    background: #ffffff;
    padding: 0 30px;
    overflow: auto;
    opacity: 0;
    visibility: hidden;
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.15);
    -ms-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.15);
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.15);
    -webkit-transition: all 600ms cubic-bezier(0.645, 0.045, 0.095, 1.08);
    -ms-transition: all 600ms cubic-bezier(0.645, 0.045, 0.095, 1.08);
    transition: all 600ms cubic-bezier(0.645, 0.045, 0.095, 1.08);
    z-index: 3;
  }
  .glzv-navigation.open {
    top: 100%;
    opacity: 1;
    visibility: visible;
  }
  .navigation > li {
    float: none;
    overflow: hidden;
    clear: both;
    border-bottom: 1px solid #e8e8e8;
  }
  .navigation > li:last-child {
    border-bottom: none;
  }
  .navigation > li > a {
    padding: 14px 0;
    position: relative;
  }
  .navigation > .has-dropdown > a:after {
    position: absolute;
    top: 50%;
    right: 0;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    z-index: 1;
  }
  .navigation > li > .dropdown-menu {
    border-bottom: none;
  }
  .navigation .dropdown-nav {
    display: none;
    position: static;
    min-width: 100%;
    padding: 10px 0;
  }
  .dropdown-nav > li {
    padding: 0 25px;
  }
}
CSS;

  echo $glazov_vt_get_typography;

  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'glazov_custom_font_load' ) ) {
  function glazov_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. esc_url($font['ttf']) .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. esc_url($font['eot']) .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. esc_url($font['woff']) .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. esc_url($font['otf']) .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'glazov_vt_custom_css' ) ) {
  function glazov_vt_custom_css() {
    $output  = glazov_custom_font_load();
    $output .= glazov_dynamic_styles();
    $custom_css = glazov_compress_css_lines( $output );

    wp_add_inline_style( 'glazov-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'glazov_vt_custom_js' ) ) {
  function glazov_vt_custom_js() {
    if ( ! wp_script_is( 'jquery', 'done' ) ) {
      wp_enqueue_script( 'jquery' );
    }
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'glazov_vt_custom_js' );
}
