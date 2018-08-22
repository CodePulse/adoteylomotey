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
  $gallery_videos = $glazov_gallery_metabox['gallery_videos'];
  $hide_zoom_icon = $glazov_gallery_metabox['hide_zoom_icon'];
  $hide_project_info = $glazov_gallery_metabox['hide_project_info'];
  $hide_share = $glazov_gallery_metabox['hide_share'];
  $hide_next_prev = $glazov_gallery_metabox['hide_next_prev'];
}else{
  $gallery_videos = array();
  $hide_zoom_icon = '';
  $hide_project_info = '';
  $hide_share = '';
  $hide_next_prev = '';
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
  <div class="swiper-container fadeslides keyboard">
    <div class="swiper-wrapper">
      <?php
      if ( !empty( $gallery_videos ) ) {
        foreach ($gallery_videos as $key => $video_info) {
          $image = wp_get_attachment_image_url( $video_info['video_poster'], 'full', false );
          $page_url = get_the_permalink();
          $video_url = $video_info['video_source'];
          if (!empty( $image )) {
            $image = $image;
          } else {
            $image = GLAZOV_IMAGES.'/stack-placeholder.jpg';
          }
          $glazov_alt = get_post_meta( $video_info['video_poster'], '_wp_attachment_image_alt', true );
          $image_media_link = get_post_meta($video_info['video_poster'], '_image_media_link', true);
          $image_media_class = get_post_meta($video_info['video_poster'], 'image_media_class', true);
          if ( $image_media_link ) {
            $largeimage = $image_media_link;
          } else {
            $largeimage = $image;
          }

        ?>
        <div class="swiper-slide">
          <div class="glzv-slide-wrap">
            <div class="glzv-background <?php echo esc_attr($image_media_class); ?>"></div>
            <iframe src="<?php echo esc_url($video_url); ?>" frameborder="0" allowfullscreen class="glzv-full-video"></iframe>
            <?php if (!$hide_share) { ?>
            <div class="project-share">
              <div class="share-label"><?php echo esc_attr( $share_text ); ?></div>
              <div class="share-links">
                <?php if( !in_array('facebook', $hide_share_icons) ){ ?>
                  <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($image)); ?>" title="<?php echo esc_attr('Facebook', 'glazov'); ?>" target="_blank">
                    <span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-facebook"></i></span></span>
                  </a>
                <?php } if(!in_array('twitter', $hide_share_icons)){ ?>
                  <a href="//twitter.com/home?status=<?php print(urlencode($image)); ?>+<?php print(urlencode($page_url)); ?>" title="<?php  echo esc_attr('Twitter', 'glazov'); ?>" target="_blank"><span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-twitter"></i></span></span></a>
                <?php } if(!in_array('linkedin', $hide_share_icons)){  ?>
                  <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($image)); ?>" title="<?php echo esc_attr('Linkedin', 'glazov'); ?>" target="_blank"><span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-linkedin"></i></span></span></a>
                <?php } if(!in_array('pinterest', $hide_share_icons)){  ?>
                  <a href="//pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&media=<?php print(urlencode($image)); ?>" title="<?php echo esc_attr('Pinterest', 'glazov'); ?>" target="_blank"><span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-pinterest-p"></i></span></span></a>
                <?php } if(!in_array('googlel_plus', $hide_share_icons)){  ?>
                  <a href="//plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" title="<?php  echo esc_attr('Google+', 'glazov'); ?>" target="_blank"><span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-google-plus"></i></span></span></a>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
            <div class="slide-bottom-wrap">
              <?php if (!$hide_project_info){ ?>
              <div class="project-info-btn">
                <a href="javascript:void(0);"><i class="info-icon">i</i> <span><?php echo esc_attr($p_info_text); ?></span></a>
                <div class="project-info-popup">
                  <div class="close-btn"><a href="javascript:void(0);"></a></div>
                  <div class="project-popup-wrap">
                    <div class="glzv-table-wrap">
                      <div class="glzv-align-wrap">
                        <ul>
                          <?php echo do_shortcode( $video_info['video_information_left'] ); ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             <?php }
              echo do_shortcode( $video_info['video_proj_cat'] );
              if($hide_zoom_icon == false){ ?>
              <div class="expand-btn"><a href="javascript:void(0);"><img src="<?php echo esc_url($largeimage); ?>" alt="<?php echo esc_attr($glazov_alt); ?>" class="zoom-popup"></a></div>
              <?php } ?>
            </div>
          </div>
        </div>
    <?php
     } } ?>
    </div>
<?php
if($hide_next_prev == false){ ?>
  <div class="swiper-custom-controls">
    <div class="swiper-btn-pause"></div>
    <div class="swiper-btn-play"></div>
  </div>
  <div class="swiper-controls">
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
  </div>
<?php } ?>
  </div>
  </div>
<?php
