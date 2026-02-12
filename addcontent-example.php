<?php
// Assuming the post ID is available or get it from the global $post object
$post_id = get_the_ID();

// Fetch the values of 'remove-gallery' and 'renove-gallery' custom fields for the current post
$remove_gallery = get_post_meta($post_id, 'remove-gallery', true);
$renove_gallery = get_post_meta($post_id, 'renove-gallery', true);

// Check if both custom fields are not set to 'gallery_off'
if ($remove_gallery !== 'gallery_off' && $renove_gallery !== 'gallery_off'):
?>

<div id="galleryslider" class="mx-fit py-0 sliderArea rel_lb <?php if (post_custom('gallery-caption') == 'caption_visible') echo 'caption_visible'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick-theme.css" media="screen">
  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.min.js"></script> 
  <script>
jQuery(function($){
$('#galleryslider .gallery-size-large').addClass('slider_thumb slider'); 
$('#galleryslider .gallery-size-thumbnail ').addClass('thumb wrapper mx-auto pb-3 pb-md-3'); 

$(document).ready(function () {
	$('.slider_thumb').slick({
		arrows:false,
		//		asNavFor:'.thumb',
		slidesToScroll: 1,
		arrows: true,
		dots: true,
		centerMode: true, //要素を中央寄せ
		centerPadding:'40%', //両サイドの見えている部分のサイズ
		autoplay:true, //自動再生
		slidesToShow: 1,
		autoplaySpeed:'5000',
		responsive: 
		[
		{
		breakpoint: 3000,
		settings: {
		centerPadding:'30%', //両サイドの見えている部分のサイズ
		slidesToShow: 1,
		},
		},
		{
		breakpoint: 2560,
		settings: {
		centerPadding:'27%', //両サイドの見えている部分のサイズ
		slidesToShow: 1,
		},
		},
		{

		breakpoint: 1280,
		settings: {
		centerPadding:'17%', //両サイドの見えている部分のサイズ
		slidesToShow: 1,
		},
		},
		{
		breakpoint: 768,
		settings: {
		centerPadding:'5%', //両サイドの見えている部分のサイズ
		slidesToShow: 1,
		},
		}
		]	  
	});
	$('.thumb').slick({
		slidesToScroll: 1,
		asNavFor: '.slider_thumb',
		focusOnSelect: true,
		slidesToShow: 12,
		responsive: [
		{
		breakpoint: 768, // 576px以下のサイズに適用
		settings: {
		slidesToShow: 8,
		},
		},
		{
		breakpoint: 576, // 576px以下のサイズに適用
		settings: {
		slidesToShow: 6,
		},
		},
		],
	});
	});
});
</script>
  <style>
.gallery-icon img {
border:0 !important;
}
</style>
  <?php
  $id = $post->ID;
  // デフォルトの除外リストを空の配列として初期化
  $excludes = array();
  // excludeパラメータが指定されている場合の処理
  if ( isset( $exclude ) && !empty( $exclude ) ) {
      // カンマ区切りの除外IDを配列に変換
      $excludes = explode( ',', $exclude );
  }
  // 除外される画像のIDを収集
  $eximages = get_children( array(
      'post_parent' => $id,
      'post_type' => 'attachment',
      'post_mime_type' => 'image',
      'numberposts' => -1,
  ) );
  foreach ( $eximages as $eximage ) {
      $post_custom = get_post_custom( $eximage->ID );
      if ( isset( $post_custom[ 'exclude' ] ) ) {
          $excludes[] = $eximage->ID;
      }
  }

  // カンマ区切りの除外IDを再び文字列に変換
  $exclude = implode( ',', $excludes );
  ?>
  <?php echo (do_shortcode('[gallery columns="0" link="file" title="true"  description="true" size="large" exclude="' . $exclude . '"]')); ?>
  <?php  echo (do_shortcode('[gallery columns="0" link="none" title="false" caption="false" description="false" size="thumbnail"  exclude="'.$exclude.'"]')); ?>
</div>
<!--example-slider-->
<?php endif ?>
<article id="example-content" class="py-4 py-md-5 rel_lb">
  <?php if(post_custom('catchcopy')) :?>
  <h2 class="title mt-3 py-md-5 px-sm-3"> <span class="catchcopy "> <?php echo nl2br ( post_custom('catchcopy') ); ?> </span> </h2>
  <?php endif ;?>
  <?php if (post_custom('example-name') || post_custom('example-family') || post_custom('example-area') || post_custom('example-kouhou') || post_custom('example-shikichi') || post_custom('example-yuka') || post_custom ('example-C') || post_custom ('example-Q') || post_custom ('example-UA') ) : ?>
  <div class="row justify-content-between mx-auto px-0 pt-5">
    <div class="example-entry  order-1 order-md-2 ">
      <?php the_content(); ?>
    </div>
    <div  class=" order-2 order-md-1" id="example-data">
      <h3 class="ttl small mt-md-0">Data</h3>
      <table class="mt-0 ml-sm-3">
        <p class="example-area_name">
        <span>
        
        <?php if (post_custom('example-name')) :?>
        <caption class="my-4">
        <?php echo post_custom('example-name'); ?>様邸
        </caption>
        <?php endif ; ?>
        <?php if (post_custom('example-family')) :?>
        <tr>
          <th>家族構成</th>
          <td><?php echo wpautop(post_custom('example-family')); ?></td>
        </tr>
        <?php endif ; ?>
        <?php if (post_custom('example-area')) :?>
        <tr>
          <th>施工エリア</th>
          <td><?php echo post_custom('example-area'); ?></td>
        </tr>
        <?php endif ; ?>
        <?php if (post_custom('example-kouhou')) :?>
        <tr>
          <th>工法・構造</th>
          <td><?php echo post_custom('example-kouhou'); ?></td>
        </tr>
        <?php endif ; ?>
        <?php if (post_custom('example-taishin')) :?>
        <tr>
          <th>耐震等級</th>
          <td><?php echo post_custom('example-taishin'); ?></td>
        </tr>
        <?php endif ; ?>
        <?php if (post_custom('example-shikichi')) :?>
        <tr>
          <th>敷地面積</th>
          <td><?php echo post_custom('example-shikichi'); ?></td>
        </tr>
        <?php endif ; ?>
        <?php if (post_custom('example-yuka')) :?>
        <tr>
          <th>床面積</th>
          <td><?php echo post_custom('example-yuka'); ?></td>
        </tr>
        <?php endif ; ?>
        <?php if (post_custom('example-madori')) :?>
        <tr>
          <th>間取</th>
          <td><?php echo post_custom('example-madori'); ?></td>
        </tr>
        <?php endif ; ?>
        <?php if (post_custom('example-C')) :?>
        <tr>
          <th>C値</th>
          <td><?php echo post_custom('example-C'); ?></td>
        </tr>
        <?php endif ;?>
        <?php if (post_custom('example-Q')) :?>
        <tr>
          <th>Q値</th>
          <td><?php echo post_custom('example-Q'); ?></td>
        </tr>
        <?php endif ;?>
        <?php if (post_custom('example-UA')) :?>
        <tr>
          <th>UA値</th>
          <td><?php echo post_custom('example-UA'); ?></td>
        </tr>
        <?php endif ;?>
      </table>
    </div>
    <!--example-data--> 
    
  </div>
  <?php else:?>
  <?php the_content(); ?>
  <?php endif ; ?>
</article>
