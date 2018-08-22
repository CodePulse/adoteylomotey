<?php
/*
 * All Back-End Helper Functions for Glazov Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Validate px entered in field */
if( ! function_exists( 'glazov_check_px' ) ) {
  function glazov_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}

/* Escape Strings */
if( ! function_exists( 'glazov_vt_esc_string' ) ) {
  function glazov_vt_esc_string( $num ) {
    return preg_replace('/\D/', '', $num);
  }
}

/* Escape Numbers */
if( ! function_exists( 'glazov_vt_esc_number' ) ) {
  function glazov_vt_esc_number( $num ) {
    return preg_replace('/[^a-zA-Z]/', '', $num);
  }
}

/* Compress CSS */
if ( ! function_exists( 'glazov_compress_css_lines' ) ) {
  function glazov_compress_css_lines( $css ) {
    $css  = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css  = str_replace( ': ', ':', $css );
    $css  = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }
}

/* Inline Style */
global $glazov_all_inline_styles;
$glazov_all_inline_styles = array();
if( ! function_exists( 'glazov_add_inline_style' ) ) {
  function glazov_add_inline_style( $style ) {
    global $glazov_all_inline_styles;
    array_push( $glazov_all_inline_styles, $style );
  }
}

/* Support WordPress uploader to following file extensions */
if( ! function_exists( 'glazov_vt_upload_mimes' ) ) {
  function glazov_vt_upload_mimes( $mimes ) {

    $mimes['ttf']   = 'font/ttf';
    $mimes['eot']   = 'font/eot';
    $mimes['woff']  = 'font/woff';
    $mimes['otf']   = 'font/otf';

    return $mimes;

  }
  add_filter( 'upload_mimes', 'glazov_vt_upload_mimes' );
}

/* WordPress admin login logo link */
if( ! function_exists( 'glazov_login_url' ) ) {
  function glazov_login_url() {
    return site_url();
  }
  add_filter( 'login_headerurl', 'glazov_login_url', 10, 4 );
}

/* WordPress admin login logo link */
if( ! function_exists( 'glazov_login_title' ) ) {
  function glazov_login_title() {
    return get_bloginfo('name');
  }
  add_filter('login_headertitle', 'glazov_login_title');
}

/**
 * TinyMCE Editor
 */

// Enable font size & font family selects in the editor
if ( ! function_exists( 'glazov_tinymce_btns_font' ) ) {
  function glazov_tinymce_btns_font( $buttons ) {
    array_unshift( $buttons, 'fontselect' ); // Add Font Select
    array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
    return $buttons;
  }
  add_filter( 'mce_buttons_2', 'glazov_tinymce_btns_font' );
}

// Customize mce editor font sizes
if ( ! function_exists( 'glazov_tinymce_sizes' ) ) {
  function glazov_tinymce_sizes( $initArray ){
    $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
    return $initArray;
  }
  add_filter( 'tiny_mce_before_init', 'glazov_tinymce_sizes' );
}

// Customize mce editor font family
if ( ! function_exists( 'glazov_tinmymce_family' ) ) {
  function glazov_tinmymce_family( $initArray ) {
      $initArray['font_formats'] = 'Amiri=Amiri,serif;Montserrat=Montserrat,sans-serif;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
            return $initArray;
  }
  add_filter( 'tiny_mce_before_init', 'glazov_tinmymce_family' );
}

/* HEX to RGB */
if( ! function_exists( 'glazov_vt_hex2rgb' ) ) {
  function glazov_vt_hex2rgb( $hexcolor, $opacity = 1 ) {

    if( preg_match( '/^#[a-fA-F0-9]{6}|#[a-fA-F0-9]{3}$/i', $hexcolor ) ) {

      $hex    = str_replace( '#', '', $hexcolor );

      if( strlen( $hex ) == 3 ) {
        $r    = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
        $g    = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
        $b    = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
      } else {
        $r    = hexdec( substr( $hex, 0, 2 ) );
        $g    = hexdec( substr( $hex, 2, 2 ) );
        $b    = hexdec( substr( $hex, 4, 2 ) );
      }

      return ( isset( $opacity ) && $opacity != 1 ) ? 'rgba('. $r .', '. $g .', '. $b .', '. $opacity .')' : ' ' . $hexcolor;

    } else {

      return $hexcolor;

    }

  }
}

/* Yoast Plugin Metabox Low */
if( ! function_exists( 'glazov_vt_yoast_metabox' ) ) {
  function glazov_vt_yoast_metabox() {
    return 'low';
  }
  add_filter( 'wpseo_metabox_prio', 'glazov_vt_yoast_metabox' );
}

if( ! function_exists( 'glazov_is_post_type' ) ) {
  function glazov_is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
  }
}

/**
 * If WooCommerce Plugin Activated
 */
if ( ! function_exists( 'glazov_is_woocommerce_activated' ) ) {
  function glazov_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
  }
}

/**
 * If is WooCommerce Shop
 */
if ( ! function_exists( 'glazov_is_woocommerce_shop' ) ) {
  function glazov_is_woocommerce_shop() {
    if ( glazov_is_woocommerce_activated() && is_shop() ) { return true; } else { return false; }
  }
}

/**
 * If is WPML is active
 */
if ( ! function_exists( 'glazov_is_wpml_activated' ) ) {
  function glazov_is_wpml_activated() {
    if ( class_exists( 'SitePress' ) ) { return true; } else { return false; }
  }
}

/**
 * Remove Rev Slider Metabox
 */
if ( is_admin() ) {

  if( ! function_exists( 'glazov_remove_rev_slider_meta_boxes' ) ) {
    function glazov_remove_rev_slider_meta_boxes() {
      remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'team', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'testimonial', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'portfolio', 'normal' );
    }
    add_action( 'do_meta_boxes', 'glazov_remove_rev_slider_meta_boxes' );
  }

}

// Media custom options
function glazov_gallery_attachment_field_credit( $form_fields, $post ) {
  $form_fields['image-media-link'] = array(
    'label' => esc_html__('Large Image URL', 'glazov'),
    'input' => 'text',
    'value' => get_post_meta( $post->ID, '_image_media_link', true ),
    'helps' =>  esc_html__('Add large image URL', 'glazov'),
  );
  $form_fields['image-media-info'] = array(
    'label' => 'Image Info',
    'input' => 'textarea',
    'shortcode' => true,
    'value' => get_post_meta( $post->ID, 'image_media_info', true ),
    'helps' => 'If provided, photo information will be displayed. <a href="#">Shortcode</a>',
  );
  $form_fields['image-media-cat'] = array(
    'label' => 'Image Category',
    'input' => 'textarea',
    'shortcode' => true,
    'value' => get_post_meta( $post->ID, 'image_media_cat', true ),
    'helps' => 'If provided, photo category will be displayed. <a href="#">Shortcode</a>',
  );
  $form_fields['image-media-class'] = array(
    'label' => 'Image Custom Class',
    'input' => 'text',
    'shortcode' => true,
    'value' => get_post_meta( $post->ID, 'image_media_class', true ),
    'helps' => 'If provided, custom class will be added to image',
  );

  return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'glazov_gallery_attachment_field_credit', 10, 3 );

function glazov_gallery_attachment_field_credit_save( $post, $attachment ) {
  if( isset( $attachment['image-media-link'] ) )
    update_post_meta( $post['ID'], '_image_media_link', $attachment['image-media-link'] );
  if( isset( $attachment['image-media-info'] ) )
    update_post_meta( $post['ID'], 'image_media_info', $attachment['image-media-info'] );
  if( isset( $attachment['image-media-cat'] ) )
    update_post_meta( $post['ID'], 'image_media_cat', $attachment['image-media-cat'] );
  if( isset( $attachment['image-media-class'] ) )
    update_post_meta( $post['ID'], 'image_media_class', $attachment['image-media-class'] );
  return $post;
}

add_filter( 'attachment_fields_to_save', 'glazov_gallery_attachment_field_credit_save', 10, 3 );

// retrieves the attachment ID from the file URL
function glazov_get_image_id($image_url) {
  global $wpdb;
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
  return $attachment;
}
