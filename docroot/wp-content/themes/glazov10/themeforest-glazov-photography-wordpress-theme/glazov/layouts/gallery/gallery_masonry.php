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
  $gallery_col = $glazov_c_gallery_metabox['gallery_single_column'];
  $gallery_single_width = $glazov_c_gallery_metabox['gallery_single_width'];
  if($glazov_c_gallery_metabox['gallery_images_for_galleries']) {
    $gallery_imagess = explode(',', $glazov_c_gallery_metabox['gallery_images_for_galleries']);
  } else {
    $gallery_imagess = array();
  }
}else{
  $gallery_col = '4';
  $gallery_single_width = '';
  $gallery_imagess = array();
}

?>
<div class="glzv-mid-wrap <?php echo esc_attr($glazov_content_padding); ?>" style="<?php echo esc_attr($glazov_custom_padding); ?>">
    <?php if ($gallery_single_width != 'fullwidth') {
      echo'<div class="container">';
    } ?>
    <div class="glzv-gallery direction-hover glzv-glry-masonry">
      <div class="glzv-masonry" data-item="<?php echo esc_attr($gallery_col); ?>">
        <?php
        if ( !empty( $gallery_imagess ) ) {
        foreach ($gallery_imagess as $key => $image) {
          $imagess = wp_get_attachment_image_src( $image, 'full' );
          $glazov_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
          if (!empty( $imagess )) {
            $imagess = $imagess[0];
          } else {
            $imagess = GLAZOV_IMAGES.'/grid-placeholder.jpg';
          }
          $image_id = glazov_get_image_id($imagess);
          $attachment = get_post( $image_id );
          $image_title = $attachment->post_title;
          $image_media_info = get_post_meta($image, 'image_media_info', true);
          $image_media_cat = get_post_meta($image, 'image_media_cat', true);
          $image_media_class = get_post_meta($image, 'image_media_class', true);
        ?>

        <div class="masonry-item nature-item" data-category="nature-item">
          <div class="gallery-item">
            <div class="glzv-image <?php echo esc_attr($image_media_class); ?>"><img src="<?php echo esc_url($imagess); ?>" alt="<?php echo esc_attr($glazov_alt); ?>"></div>
            <div class="gallery-info">
              <div class="glzv-table-wrap">
                <div class="glzv-align-wrap">
                  <h4 class="gallery-title"><?php echo esc_attr($image_title); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php } } ?>
      </div>
    </div>
    <?php
    if ($gallery_single_width != 'fullwidth') {
      echo'</div>';
    } ?>
</div>
<?php
