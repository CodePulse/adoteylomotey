 <?php
/* Sub template for homepage horizontal slider
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Metabox
$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );
$glazov_gallery_metabox  = get_post_meta( $glazov_id, 'page_gallery_metabox', true );
if ($glazov_gallery_metabox) {
  $hide_zoom_icon = $glazov_gallery_metabox['hide_zoom_icon'];
  $hide_share = $glazov_gallery_metabox['hide_share'];
  $hide_next_prev = $glazov_gallery_metabox['hide_next_prev'];
  $gallery_imagess = explode(',', $glazov_gallery_metabox['gallery_images_for_galleries']);
} else {
  $hide_zoom_icon = '';
  $hide_share = '';
  $hide_next_prev = '';
  $gallery_imagess = array();
}

$share_text = cs_get_option('share_text');
$share_text = $share_text ? $share_text : esc_html__( 'Share', 'glazov' );
$close_text = cs_get_option('close_text');
$share_on_text = cs_get_option('share_on_text');
$share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'glazov' );
$close_text = $close_text ? $close_text : esc_html__( 'Close', 'glazov' );
$p_info_text = cs_get_option('p_info_text');
$p_info_text = $p_info_text ? $p_info_text : esc_html__( 'Project Info', 'glazov' );
$hide_share_icons = (array) cs_get_option('hide_share_icons');
?>
<div class="glzv-full-wrap">
  <div class="swiper-container horizontalslides keyboard mousewheel">
    <div class="swiper-wrapper">
      <?php
      if ( !empty( $gallery_imagess ) ) {
        foreach ($gallery_imagess as $key => $image) {
          $imagess = wp_get_attachment_image_src( $image, 'full' );
          $glazov_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
          $image_media_link = get_post_meta($image, '_image_media_link', true);
          if ( $image_media_link ) {
            $largeimage = $image_media_link;
          } else {
            $largeimage = $imagess[0];
          }
          $image_id = glazov_get_image_id($imagess[0]);
          $attachment = get_post( $image_id );
          $image_title = $attachment->post_title;
          $image_media_cat = get_post_meta($image, 'image_media_cat', true);
          $image_media_class = get_post_meta($image, 'image_media_class', true);
      ?>
      <div class="swiper-slide item-5">
        <div class="glzv-slide-wrap">
          <div class="glzv-background <?php echo esc_attr($image_media_class); ?>"><img src="<?php echo esc_url($imagess[0]); ?>" class="swipe-img" alt=""></div>
          <?php if($hide_zoom_icon == false){ ?>
          <div class="expand-btn"><a href="javascript:void(0);"><img src="<?php echo esc_url($largeimage); ?>" alt="<?php echo esc_attr($glazov_alt); ?>" class="zoom-popup"></a></div>
          <?php } ?>
          <div class="project-title-wrap">
            <h2 class="project-title"><span>
              <span><?php echo esc_attr($image_title);?></span>
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
