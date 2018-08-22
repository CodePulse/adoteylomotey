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
  $notify_txt = $glazov_c_gallery_metabox['notify_txt'];
  $notify_link = $glazov_c_gallery_metabox['notify_link'];
  $hide_zoom_icon = $glazov_c_gallery_metabox['hide_zoom_icon'];
  $gallery_single_width = $glazov_c_gallery_metabox['gallery_single_width'];
  if($glazov_c_gallery_metabox['gallery_images_for_galleries']) {
    $gallery_imagess = explode(',', $glazov_c_gallery_metabox['gallery_images_for_galleries']);
  } else {
    $gallery_imagess = array();
  }
}else{
  $gallery_col = '4';
  $notify_txt = '';
  $notify_link = '';
  $hide_zoom_icon = '';
  $gallery_single_width = '';
  $gallery_imagess = array();
}
// $notify_txt = $notify_txt ? $notify_txt : 'Notify Photographer';
?>
<div class="glzv-mid-wrap <?php echo esc_attr($glazov_content_padding); ?>" style="<?php echo esc_attr($glazov_custom_padding); ?>">
  <?php if ($gallery_single_width != 'fullwidth') {
    echo'<div class="container">';
  } ?>
    <div class="mid-wrap-inner inner-space-three">
      <div class="glzv-info-title">
        <h1 class="info-title"><?php echo esc_attr(get_the_title()); ?></h1>
        <?php glazov_gallery_client_information_meta('gallery_single_metabox', 'gallery_informations'); ?>
      </div>
      <?php if ( !empty( $gallery_imagess ) ) { ?>
      <div class="masonry-filters">
        <ul>
          <li><a href="javascript:void(0);" data-filter="*" class="active"><span><?php echo esc_html__( 'ALL', 'glazov' ); ?></span></a></li>
          <li><a href="javascript:void(0);" data-filter=".approved-item"><span><?php echo esc_html__( 'APPROVED', 'glazov' ); ?></span></a></li>
          <li><a href="javascript:void(0);" data-filter=".rejected-item"><span><?php echo esc_html__( 'REJECTED', 'glazov' ); ?></span></a></li>
        </ul>
      </div>
      <?php } ?>
      <div class="glzv-gallery glzv-proofing-gallery glzv-lightgallery">
        <div class="glzv-masonry" data-item="<?php echo esc_attr($gallery_col); ?>">
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
            $image_id = glazov_get_image_id($images);
            $attachment = get_post( $image_id );
            $image_title = $attachment->post_title;
            $image_media_class = get_post_meta($image, 'image_media_class', true);
            $image_media_link = get_post_meta($image, '_image_media_link', true);
            if ( $image_media_link ) {
              $largeimage = $image_media_link;
            } else {
              $largeimage = $imagess[0];
            }
          ?>
          <div class="masonry-item <?php echo esc_attr($image_media_class); ?>" data-category="<?php echo esc_attr($image_media_class); ?>">
            <div class="gallery-item">
              <div class="glzv-image"><img src="<?php echo esc_url($images); ?>" alt="<?php echo esc_attr($glazov_alt); ?>"></div>
              <div class="proof-gallery-info">
              <?php if($hide_zoom_icon == false){ ?>
                <div class="proof-gallery-link">
                  <a href="<?php echo esc_url($largeimage); ?>" data-rel="lightGallery">
                    <img src="<?php echo esc_url($largeimage); ?>" alt="<?php echo esc_attr($glazov_alt); ?>">
                  </a>
                </div>
                <?php } ?>
                <div class="proof-gallery-number"><?php echo esc_attr($post->ID); ?></div>
                <div class="proof-gallery-action"><a href="javascript:void(0);"></a></div>
              </div>
            </div>
          </div>
          <?php } } ?>
        </div>
        <div class="container">
          <?php if($notify_txt){
            if($notify_link){
              echo '<div class="notify-photographer"><a href="'.esc_attr($notify_link).'" class="glzv-btn glzv-btn-medium glzv-btn-dark-gray"><i class="fa fa-envelope-o" aria-hidden="true"></i>'.esc_attr($notify_txt).'</a></div>';
            } else {
              echo '<div class="notify-photographer"><span class="glzv-btn glzv-btn-medium glzv-btn-dark-gray"><i class="fa fa-envelope-o" aria-hidden="true"></i>'.esc_attr($notify_txt).'</span></div>';
            }

          }
          if ( comments_open() || get_comments_number() ) :
            comments_template(); // GroppeWP
          endif;
          ?>
        </div>
      </div>
    </div>
  <?php if ($gallery_single_width != 'fullwidth') {
    echo'</div>';
  } ?>
</div>
<?php
