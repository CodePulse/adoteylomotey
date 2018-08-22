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
  $custom_title = $glazov_gallery_metabox['custom_title'];
  $hide_share = $glazov_gallery_metabox['hide_share'];
  $gallery_imagess = explode(',', $glazov_gallery_metabox['gallery_images_for_galleries']);
  $gallery_imagess_sec = explode(',', $glazov_gallery_metabox['gallery_images_for_galleries_sec']);
  $follow_title = $glazov_gallery_metabox['follow_title'];
  $social_icons_slide = $glazov_gallery_metabox['social_icons_slide'];
} else {
  $custom_title = '';
  $hide_share = '';
  $gallery_imagess = array();
  $gallery_imagess_sec = array();
  $follow_title ='';
  $social_icons_slide = '';
}

$follow_title = $follow_title ? $follow_title : esc_html__( 'Follow Me', 'glazov' );
$hide_share_icons = (array) cs_get_option('hide_share_icons');
$custom_title = $custom_title ? $custom_title : get_the_title(); ?>

<div class="glzv-sliding-showcase">
  <div class="enscroll-horizontal">
    <div class="showcase-item showcase-cover">
      <div class="glzv-image" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>);">
        <img src="<?php echo esc_url(GLAZOV_IMAGES); ?>/placeholders/placeholder1.png" alt="Placeholder">
        <div class="showcase-author glzv-fade-caption">
          <div class="showcase-author-wrap">
            <h1 class="showcase-author-name"><?php echo esc_attr($custom_title); ?></h1>
            <?php if (!$hide_share) {
            $page_url = get_the_permalink();
            $image = wp_get_attachment_image_url( get_the_post_thumbnail_url(), 'full', false ); ?>
            <div class="glzv-social">
              <span class="social-label"><?php echo esc_attr( $follow_title); ?></span>
               <?php
                    if ( ! empty( $social_icons_slide ) ) {
                    foreach ( $social_icons_slide as $social ) {
                      if(isset($social['social_open_link'])) {
                        $target = 'target="_blank"';
                      } else {
                        $target = '';
                      }
                  ?>
              <a href="<?php echo esc_url($social['icon_link']); ?>" <?php echo esc_attr($target); ?>><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
              <?php } } ?>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="showcase-half-row">
    <?php
      if ( !empty( $gallery_imagess ) ) {
        $s=1;
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
          if($s == 1){
        ?>
        <div class="showcase-item">
          <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
            <img src="<?php echo esc_url($imagess); ?>" alt="Gallery">
            <div class="showcase-info">
              <div class="glzv-table-wrap">
                <div class="glzv-align-wrap">
                  <div class="showcase-info-wrap">
                    <h4 class="showcase-title"><?php echo esc_attr($image_title); ?></h4>
                    <?php echo do_shortcode( $image_media_cat ); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } } $s++; } } ?>

      <div class="showcase-single-row">
      <?php
      if ( !empty( $gallery_imagess ) ) {
        $s=1;
        foreach ($gallery_imagess as $key => $image) {
          if((($s % 2) != 0) && ($s!=1)){
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
          ?>
          <div class="showcase-item">
            <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
              <img src="<?php echo esc_url($imagess); ?>" alt="Gallery">
              <div class="showcase-info">
                <div class="glzv-table-wrap">
                  <div class="glzv-align-wrap">
                    <div class="showcase-info-wrap">
                      <h4 class="showcase-title"><?php echo esc_attr($image_title); ?></h4>
                      <?php echo do_shortcode( $image_media_cat ); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } $s++; } } ?>
      </div>
      <div class="showcase-single-row">
      <?php
      if ( !empty( $gallery_imagess ) ) {
        $s=1;
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
          ?>
          <div class="showcase-item">
            <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
              <img src="<?php echo esc_url($imagess); ?>" alt="Gallery">
              <div class="showcase-info">
                <div class="glzv-table-wrap">
                  <div class="glzv-align-wrap">
                    <div class="showcase-info-wrap">
                      <h4 class="showcase-title"><?php echo esc_attr($image_title); ?></h4>
                      <?php echo do_shortcode( $image_media_cat ); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } $s++; } } ?>
      </div>
    </div>

    <div class="showcase-half-row">
    <?php
      if ( !empty( $gallery_imagess_sec ) ) {
        $s=1;
        foreach ($gallery_imagess_sec as $key => $image) {
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
          if($s == 1){
      ?>

      <div class="showcase-item">
        <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
          <img src="<?php echo esc_url($imagess); ?>" alt="Gallery">
          <div class="showcase-info">
            <div class="glzv-table-wrap">
              <div class="glzv-align-wrap">
                <div class="showcase-info-wrap">
                  <h4 class="showcase-title"><?php echo esc_attr($image_title); ?></h4>
                  <?php echo do_shortcode( $image_media_cat ); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } } $s++; } } ?>

      <div class="showcase-single-row">
      <?php
      if ( !empty( $gallery_imagess_sec ) ) {
        $s=1;
        foreach ($gallery_imagess_sec as $key => $image) {
          if((($s % 2) != 0) && ($s!=1)){
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
          ?>
            <div class="showcase-item">
              <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
                <img src="<?php echo esc_url($imagess); ?>" alt="Gallery">
                <div class="showcase-info">
                  <div class="glzv-table-wrap">
                    <div class="glzv-align-wrap">
                      <div class="showcase-info-wrap">
                        <h4 class="showcase-title"><?php echo esc_attr($image_title); ?></h4>
                       <?php echo do_shortcode( $image_media_cat ); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } $s++; } } ?>
      </div>
      <div class="showcase-single-row">
      <?php
      if ( !empty( $gallery_imagess_sec ) ) {
        $s=1;
        foreach ($gallery_imagess_sec as $key => $image) {
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
          ?>
            <div class="showcase-item">
              <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
                <img src="<?php echo esc_url($imagess); ?>" alt="Gallery">
                <div class="showcase-info">
                  <div class="glzv-table-wrap">
                    <div class="glzv-align-wrap">
                      <div class="showcase-info-wrap">
                        <h4 class="showcase-title"><?php echo esc_attr($image_title); ?></h4>
                        <?php echo do_shortcode( $image_media_cat ); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } $s++; } } ?>
      </div>
    </div>
  </div>
</div>
