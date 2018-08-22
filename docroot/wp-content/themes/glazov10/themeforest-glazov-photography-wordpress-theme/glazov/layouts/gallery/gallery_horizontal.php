 <?php
/* Sub template for homepage
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Metabox
$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );
$glazov_c_gallery_metabox  = get_post_meta( $glazov_id, 'gallery_single_metabox', true );

if ($glazov_meta) {
  $glazov_content_padding = $glazov_meta['content_spacings'];
} else { $glazov_content_padding = ''; }
// Padding - Metabox
if ($glazov_content_padding && $glazov_content_padding !== 'padding-none') {
  $glazov_content_top_spacings = $glazov_meta['content_top_spacings'];
  $glazov_content_bottom_spacings = $glazov_meta['content_bottom_spacings'];
  if ($glazov_content_padding === 'padding-custom') {
    $glazov_content_top_spacings = $glazov_content_top_spacings ? 'padding-top:'. glazov_check_px($glazov_content_top_spacings) .';' : '';
    $glazov_content_bottom_spacings = $glazov_content_bottom_spacings ? 'padding-bottom:'. glazov_check_px($glazov_content_bottom_spacings) .';' : '';
    $glazov_custom_padding = $glazov_content_top_spacings . $glazov_content_bottom_spacings;
  } else {
    $glazov_custom_padding = '';
  }
} else {
  $glazov_custom_padding = '';
}

if ($glazov_c_gallery_metabox) {
  $hide_zoom_icon = $glazov_c_gallery_metabox['hide_zoom_icon'];
  if($glazov_c_gallery_metabox['gallery_images_for_galleries']) {
    $gallery_imagess = explode(',', $glazov_c_gallery_metabox['gallery_images_for_galleries']);
  } else {
    $gallery_imagess = array();
  }
}else{
  $hide_zoom_icon = '';
  $gallery_imagess = array();
}

?>
<div class="glzv-full-wrap <?php echo esc_attr($glazov_content_padding); ?>" style="<?php echo esc_attr($glazov_custom_padding); ?>">
  <div class="swiper-container horizontalslides keyboard mousewheel">
    <div class="swiper-wrapper">
    <?php
      if ( !empty( $gallery_imagess ) ) {
      foreach ($gallery_imagess as $key => $image) {
        $imagess = wp_get_attachment_image_src( $image, 'full' );
        $glazov_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
        if (!empty( $imagess )) {
          $images = $imagess[0];
        } else {
          $images = GLAZOV_IMAGES.'/grid-placeholder.jpg';
        }
        $image_id = glazov_get_image_id($imagess[0]);
        $attachment = get_post( $image_id );
        $image_title = $attachment->post_title;
        $image_media_info = get_post_meta($image, 'image_media_info', true);
        $image_media_cat = get_post_meta($image, 'image_media_cat', true);
        $image_media_class = get_post_meta($image, 'image_media_class', true);
        $image_media_link = get_post_meta($image, '_image_media_link', true);
        if ( $image_media_link ) {
          $largeimage = $image_media_link;
        } else {
          $largeimage = $imagess[0];
        }
      ?>
      <div class="swiper-slide">
        <div class="glzv-slide-wrap">
          <div class="glzv-background <?php echo esc_attr($image_media_class); ?>"><img src="<?php echo esc_url($images); ?>" class="swipe-img" alt="<?php echo esc_attr($glazov_alt); ?>"></div>
          <?php if($hide_zoom_icon == false){ ?>
          <div class="expand-btn"><a href="javascript:void(0);"><img src="<?php echo esc_url($largeimage); ?>" alt="<?php echo esc_attr($glazov_alt); ?>" class="zoom-popup"></a></div>
          <?php } ?>
          <div class="project-title-wrap">
            <h2 class="project-title"><span>
              <?php echo esc_attr($image_title); ?>
            </span></h2>
             <?php echo do_shortcode( $image_media_cat ); ?>
          </div>
        </div>
      </div>
    <?php } } ?>
    </div>
  </div>
</div>
<?php
