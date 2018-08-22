<?php
/*
 * The template for displaying all single portfolios.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
global $post;
$glazov_single_pagination = cs_get_option('portfolio_single_pagination');
// Metabox
$glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );
$portfolio_meta  = get_post_meta( $glazov_id, 'portfolio_single_metabox', true );
// Translation
if ($portfolio_meta) {
  $portfolio_title = $portfolio_meta['portfolio_title'];
  $portfolio_sub_title = $portfolio_meta['portfolio_sub_title'];
  $view_portfolio_txt = $portfolio_meta['view_portfolio_txt'];
  $view_portfolio_link = $portfolio_meta['view_portfolio_link'];
  $gallery_col = $portfolio_meta['portfolio_single_column'];
  $portfolio_single_width = $portfolio_meta['portfolio_single_width'];
  $portfolio_share = $portfolio_meta['portfolio_share'];
  if($portfolio_meta['port_single_images']) {
    $portfolio_single_images = explode(',', $portfolio_meta['port_single_images']);
  } else {
    $portfolio_single_images = '';
  }
} else {
  $portfolio_title = '';
  $portfolio_sub_title = '';
  $view_portfolio_txt = '';
  $view_portfolio_link = '';
  $gallery_col = '3';
  $portfolio_single_width = '';
  $portfolio_share = '';
  $portfolio_single_images = '';
}

if ($portfolio_single_width == 'fullwidth') {
  $full_class = 'full-detail';
}else{
  $full_class = '';
}

$portfolio_title = $portfolio_title ? $portfolio_title : get_the_title();
$view_project_txt = $view_portfolio_txt ? $view_portfolio_txt : 'View Project';

while( have_posts() ) : the_post();
?>
 <!-- glzv mid wrap (glzv portfolio detail, full-detail) -->
  <div class="glzv-mid-wrap">
    <div class="mid-wrap-inner inner-space-six">
      <div class="glzv-portfolio-detail portfolio-fullwidth fullwidth-style-two">
      <?php if ($portfolio_single_width != 'fullwidth') {
        echo'<div class="container">';
      } ?>
          <div class="portfolio-detail-wrap">
            <div class="glzv-info-title">
              <h1 class="info-title"><?php echo esc_attr($portfolio_title); ?></h1>
              <p><?php echo esc_attr($portfolio_sub_title); ?></p>
            </div>
            <p><?php echo esc_attr(the_excerpt()); ?></p>
            <div class="portfolio-short-details">
              <?php glazov_portfolio_information_meta('portfolio_single_metabox', 'portfolio_informations'); ?>
            </div>
            <div class="more-portfolio-detail">
            <?php if($view_portfolio_link){
              echo '<div class="view-project-link"><a href="'.esc_url($view_portfolio_link).'">'.esc_attr($view_project_txt).'</a></div>';
            } else {
              echo '<div class="view-project-link"><span>'.esc_attr($view_project_txt).'</span></div>';
            }
            echo do_shortcode($portfolio_share); ?>
            </div>
          </div>
          <div class="glzv-masonry glzv-lightgallery glzv-panr" data-item="<?php echo esc_attr($gallery_col); ?>" data-space="10">
            <?php
              if ( !empty( $portfolio_single_images ) ) {
                foreach ($portfolio_single_images as $key => $img) {
                $image = wp_get_attachment_image_src( $img, 'full');
                if (!empty( $image )) {
                  if(class_exists('Aq_Resize')) {
                    $images = aq_resize( $image[0], '500', '500', true );
                  } else {$images = $image[0];}
                  $images = $images ? $images : GLAZOV_IMAGES.'/500x500.png';
                } else {
                  $images = GLAZOV_IMAGES.'/500x500.png';
                }

                $glazov_alt = get_post_meta($img, '_wp_attachment_image_alt', true);
                $image_media_link = get_post_meta($img, '_image_media_link', true);
                $image_media_class = get_post_meta($img, 'image_media_class', true);
                if ( $image_media_link ) {
                  $largimage = $image_media_link;
                } else {
                  $largimage = $images;
                }

              ?>
                <div class="masonry-item" data-category="nature-item">
                <div class="gallery-item">
                  <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
                    <a href="<?php echo esc_url( $largimage ); ?>" data-rel="lightGallery">
                      <img src="<?php echo esc_url( $images ); ?>" alt="<?php echo esc_attr($glazov_alt); ?>">
                    </a>
                  </div>
                </div>
              </div>
            <?php } } ?>
          </div>
          <?php
          if(!$glazov_single_pagination){} else {
            echo glazov_portfolio_next_prev();
          }
          if ($portfolio_single_width != 'fullwidth') {
            echo '</div>';
          } ?>
      </div>
    </div>
  </div>
<?php
endwhile;
