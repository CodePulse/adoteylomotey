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
$glazov_gallery_metabox  = get_post_meta( $glazov_id, 'page_gallery_metabox', true );
if ($glazov_gallery_metabox) {
  // $gallery_images = $glazov_gallery_metabox['gallery_images'];
  $hide_zoom_icon = $glazov_gallery_metabox['hide_zoom_icon'];
  $hide_share = $glazov_gallery_metabox['hide_share'];
  $hide_next_prev = $glazov_gallery_metabox['hide_next_prev'];
  $gallery_imagess = explode(',', $glazov_gallery_metabox['gallery_images_for_galleries']);
} else {
  // $gallery_images = array();
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
<!-- sewl fullheight wrap -->
<div class="glzv-full-wrap">
  <div class="glzv-splitted-slider">
    <div class="ms-left">
    <?php
    $id = 1;
      if ( !empty( $gallery_imagess ) ) {
        $s=0;
        foreach ($gallery_imagess as $key => $image) {
          if(($s % 2) == 0){
          $imagess = wp_get_attachment_image_src( $image, 'full' );
          $glazov_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
          $page_url = get_the_permalink();
          $image_media_link = get_post_meta($image, '_image_media_link', true);
          if (!empty( $imagess )) {
            $imagess = $imagess[0];
          } else {
            $imagess = GLAZOV_IMAGES.'/grid-placeholder.jpg';
          }
          if ( $image_media_link ) {
            $largeimage = $image_media_link;
          } else {
            $largeimage = $imagess;
          }
          $image_id = glazov_get_image_id($imagess);
          $attachment = get_post( $image_id );
          $image_title = $attachment->post_title;
          $image_media_info = get_post_meta($image, 'image_media_info', true);
          $image_media_cat = get_post_meta($image, 'image_media_cat', true);
          $image_media_class = get_post_meta($image, 'image_media_class', true);
          $image_media_class = $image_media_class ? $image_media_class : ' dark';
        ?>
        <div class="ms-section <?php echo esc_attr($image_media_class); ?>" id="left<?php echo esc_attr($id); ?>">
          <div class="glzv-slide-wrap">
            <div class="glzv-background" style="background-image: url(<?php echo esc_url($imagess); ?>);"></div>
          </div>
        </div>
    <?php
     $id++;
     } $s++; } } ?>
    </div>
    <div class="ms-right">
      <?php
      $id = 1;
      if ( !empty( $gallery_imagess ) ) {
        $s=0;
        foreach ($gallery_imagess as $key => $image) {
          if(($s % 2) != 0){
          $imagess = wp_get_attachment_image_src( $image, 'full' );
          $glazov_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
          $page_url = get_the_permalink();
          $image_media_link = get_post_meta($image, '_image_media_link', true);
          if (!empty( $imagess )) {
            $imagess = $imagess[0];
          } else {
            $imagess = GLAZOV_IMAGES.'/grid-placeholder.jpg';
          }
          if ( $image_media_link ) {
            $largeimage = $image_media_link;
          } else {
            $largeimage = $imagess;
          }
          $image_id = glazov_get_image_id($imagess);
          $attachment = get_post( $image_id );
          $image_title = $attachment->post_title;
          $image_media_info = get_post_meta($image, 'image_media_info', true);
          $image_media_cat = get_post_meta($image, 'image_media_cat', true);
          $image_media_class = get_post_meta($image, 'image_media_class', true);
          $image_media_class = $image_media_class ? $image_media_class : ' dark';
        ?>
        <div class="ms-section <?php echo esc_attr($image_media_class); ?>" id="right<?php echo esc_attr($id); ?>">
          <div class="glzv-slide-wrap">
            <div class="glzv-background" style="background-image: url(<?php echo esc_url($imagess); ?>);"></div>
          </div>
        </div>
     <?php
     $id++;
     } $s++; } }?>
    </div>
  </div>
</div><?php
