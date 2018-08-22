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
  $portfolio_single_sidebar = $portfolio_meta['portfolio_single_sidebar'];
  $portfolio_title = $portfolio_meta['portfolio_title'];
  $portfolio_sub_title = $portfolio_meta['portfolio_sub_title'];
  $view_portfolio_txt = $portfolio_meta['view_portfolio_txt'];
  $view_portfolio_link = $portfolio_meta['view_portfolio_link'];
  $portfolio_share = $portfolio_meta['portfolio_share'];
  $gallery_col = $portfolio_meta['portfolio_single_column'];
  $portfolio_single_width = $portfolio_meta['portfolio_single_width'];
  if($portfolio_meta['port_single_images']) {
    $portfolio_single_images = explode(',', $portfolio_meta['port_single_images']);
  } else {
    $portfolio_single_images = '';
  }
} else {
  $portfolio_single_sidebar = '';
  $portfolio_title = '';
  $portfolio_sub_title = '';
  $view_portfolio_txt = '';
  $view_portfolio_link = '';
  $portfolio_share = '';
  $gallery_col = '3';
  $portfolio_single_width = '';
  $portfolio_single_images = '';
}

if ($portfolio_single_width == 'fullwidth') {
  $full_class = 'full-detail';
}else{
  $full_class = '';
}
if($portfolio_single_sidebar === 'right') {
  $sidebar_cls = '';
} else {
  $sidebar_cls = ' left-sidebar';
}
$portfolio_title = $portfolio_title ? $portfolio_title : get_the_title();
$view_project_txt = $view_portfolio_txt ? $view_portfolio_txt : 'View Project';

while( have_posts() ) : the_post();
?>
<div class="glzv-portfolio-detail portfolio-horizontal <?php echo esc_attr($sidebar_cls); ?>">
  <div class="swiper-container horizontalslides keyboard mousewheel">
    <div class="swiper-wrapper">
    <?php
      if ( !empty( $portfolio_single_images ) ) {
        foreach ($portfolio_single_images as $key => $img) {
        $image = wp_get_attachment_image_src( $img, 'full');
        if (!empty( $image )) {
          $images = $image[0];
        } else {
          $images = GLAZOV_IMAGES.'/grid-placeholder.jpg';
        }
        $glazov_alt = get_post_meta($img, '_wp_attachment_image_alt', true);
        $image_media_class = get_post_meta($img, 'image_media_class', true);
        $image_media_link = get_post_meta($img, '_image_media_link', true);
        if ( $image_media_link ) {
          $largimage = $image_media_link;
        } else {
          $largimage = $images;
        }
        ?>
        <div class="swiper-slide">
          <div class="glzv-slide-wrap">
            <div class="glzv-background <?php echo esc_attr($image_media_class); ?>"><img class="swipe-img" src="<?php echo esc_url( $images ); ?>" alt="<?php echo esc_attr( $glazov_alt ); ?>"></div>
          </div>
        </div>
      <?php } } ?>
    </div>
  </div>
  <div class="portfolio-detail-wrap">
    <div class="vertical-scroll">
      <div class="portfolio-detail-inner">
        <h3 class="portfolio-title"><?php echo esc_attr($portfolio_title); ?></h3>
        <p><?php esc_attr(the_excerpt()); ?></p>
        <div class="portfolio-short-details">
          <h4 class="short-details-label"><?php echo esc_html__('Details', 'glazov'); ?></h4>
          <?php glazov_portfolio_information_meta('portfolio_single_metabox', 'portfolio_informations'); ?>
        </div>
        <div class="more-portfolio-detail">
          <?php if($view_portfolio_link){
            echo '<div class="view-project-link"><a href="'.esc_url($view_portfolio_link).'" class="glzv-btn">'.esc_attr($view_project_txt).'</a></div>';
          } else {
            echo '<div class="view-project-link"><span class="glzv-btn">'.esc_attr($view_project_txt).'</span></div>';
          }
           echo do_shortcode($portfolio_share); ?>
        </div>
        <?php
          if(!$glazov_single_pagination){} else {
            echo glazov_portfolio_next_prev();
          }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
endwhile;
