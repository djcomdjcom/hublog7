<?php
/**
 * addcontent-reform.php
 *
 * @更新日付	2023.04.15
 *
 */
?>
<div id="addcontent-reform" class="mx-fit py-0 sliderArea rel_lb ">
  <?php //if (post_custom('reform-gallery')) : ?>
	
	
<?php $fields = SCF::get('reform-gallery'); ?>
<?php if($fields): ?>
  <!-- はい（true）を選択した場合に表示したい内容 -->
	
<div id="galleryslider" class="mx-fit py-0 sliderArea rel_lb <?php if (post_custom('gallery-caption') == 'caption_visible') echo 'caption_visible'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick-theme.css" media="screen">
  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.min.js"></script> 
  <script>
jQuery(function($){
$('#galleryslider .gallery-size-large').addClass('slider_thumb slider'); 
$('#galleryslider .gallery-size-thumbnail ').addClass('thumb container mx-auto pb-3 pb-md-4'); 

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
<?php else: ?>
<?php endif; ?>


	
	
  <div id="reform-meta" class="py-4 maxw-1000 mx-auto px-3 px-xl-0">
    <div class="reform-cf_itens py-4">
      <?php if (post_custom('reform-name')) : ?>
      <span class="example-area_name">[ <span class="example-area"><?php echo post_custom('reform-area'); ?></span>&nbsp;&nbsp; <span class="example-name"><?php echo post_custom('reform-name'); ?></span> ] </span>
      <?php endif ?>
      <?php if (post_custom('reform-madori')) : ?>
      <span class="example-yuka">間取：<?php echo post_custom('reform-madori'); ?></span>
      <?php endif ?>
      <?php if (post_custom('reform-yuka')) : ?>
      <span class="example-yuka">総工事床面積：<?php echo post_custom('reform-yuka'); ?></span>
      <?php endif ?>
      <?php if (post_custom('reform-kasho')) : ?>
      <span class="reform-kasho">施工箇所：<?php echo post_custom('reform-kasho'); ?></span>
      <?php endif ?>
      <?php if (post_custom('reform-kikan')) : ?>
      <span class="example-yosan">施工期間：<?php echo post_custom('reform-kikan'); ?></span>
      <?php endif ?>
      <?php if (post_custom('reform-yosan')) : ?>
      <span class="example-yosan">工事予算：<?php echo post_custom('reform-yosan'); ?>万円</span>
      <?php endif ?>
    </div>
    <!--inbox-->
    
    <?php if (post_custom('reform-youbou')) : ?>
    <dl class="reform-youbou mb-4">
      <dt class="title">■ お客様のご要望・お悩み</dt>
      <dd class="ml-3 pl-3"> <?php echo wpautop(post_custom('reform-youbou')); ?> </dd>
    </dl>
    <?php endif ?>
    <!--reform-youbou-->
    
    <?php if (post_custom('reform-kaiketsusaku')) : ?>
    <dl class="reform-kaiketsusaku mb-4">
      <dt class="title">■ <?php echo get_option('profile_shop_name'); ?>からの解決策</dt>
      <dd class="ml-3 pl-3"><?php echo wpautop(post_custom('reform-kaiketsusaku')); ?> </dd>
    </dl>
    <?php endif ?>
  </div>
  <!--reform-meta--> 
  
</div>
<!--addcontent-reform--> 

<!--　beforeafter表示-->
<div id="before-after" class="rel_lb py-5">
  <?php $ba = SCF::get('ba'); // 二重取得を避けるために一回のみ呼び出す ?>
  <?php if (!empty($ba)): ?>
    <?php foreach ($ba as $fields): ?>
      <?php
      // $fields['ba_before'] または $fields['add_contents'] のいずれかが非空の場合に処理を行う
      if (!empty($fields['ba_before']) || !empty($fields['add_contents'])): ?>
        <?php
        $ba_before = $fields['ba_before'];
        $ba_after = $fields['ba_after'];
        ?>
        <div class="row maxw-1000 mx-auto p-0 ba-item py-3 mb-5">
          <div class="col-12 p-0">
            <?php if (!empty($fields['ba_title'])): ?>
              <h3 class="noicon ttl"><?php echo $fields['ba_title']; ?></h3>
            <?php endif; ?>
            <?php if (!empty($fields['ba_description'])): ?>
              <div class="description pb-4" id="description_01"><?php echo nl2br($fields['ba_description']); ?></div>
            <?php endif; ?>
          </div>
          <div class="col-4 px-0 before-image">
            <figure class="w100"> <span class="ttl pt-1 pt-md-2 pb-md-1">施工前</span> <a href="<?php echo wp_get_attachment_url($ba_before, 'large'); ?>"><img src="<?php echo wp_get_attachment_url($ba_before, 'thumbnail'); ?>"></a> </figure>
          </div>
          <div class="col-1 px-0 arrow text-center align-self-center"><span class="material-icons">arrow_forward_ios</span></div>
          <div class="col-7 px-0 after-image">
            <figure class="w100"> <span class="ttl pt-1 pt-md-2 pb-md-1">施工後</span> <a href="<?php echo wp_get_attachment_url($ba_after, 'large'); ?>"><img src="<?php echo wp_get_attachment_url($ba_after, 'large'); ?>"></a> </figure>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
<!--beforeafterここまで-->
