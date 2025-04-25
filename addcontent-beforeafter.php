<?php
/**
 * addcontent-reform.php
 *
 * @更新日付	2025.04.07
 *
 */
?>
<div id="addcontent-reform" class="mx-fit py-0 rel_lb">
  <?php $fields = SCF::get('reform-gallery'); ?>
  <?php if ($fields): ?>
  <!-- はい（true）を選択した場合に表示したい内容 -->
  <div id="galleryslider" class="mx-fit py-0 rel_lb <?php if (post_custom('gallery-caption') == 'caption_visible') echo 'caption_visible'; ?>">
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
    $excludes = array();

    if ( isset( $exclude ) && !empty( $exclude ) ) {
      $excludes = explode( ',', $exclude );
    }

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

    $exclude = implode( ',', $excludes );
    ?>
    <?php echo do_shortcode('[gallery columns="0" link="file" title="true"  description="true" size="large" exclude="' . $exclude . '"]'); ?> <?php echo do_shortcode('[gallery columns="0" link="none" title="false" caption="false" description="false" size="thumbnail"  exclude="' . $exclude . '"]'); ?> </div>
  <?php endif; ?>
  <div id="reform-meta" class="py-4 maxw-1000 mx-auto px-3 px-xl-0">
    <div class="reform-cf_itens py-4">
      <?php
      $area = SCF::get( 'reform-area' );
      $name = SCF::get( 'reform-name' );
      $madori = SCF::get( 'reform-madori' );
      $yuka = SCF::get( 'reform-yuka' );
      $kasho = SCF::get( 'reform-kasho' );
      $kikan = SCF::get( 'reform-kikan' );
      $yosan = SCF::get( 'reform-yosan' );
      ?>
      <?php if ($name) : ?>
      <span class="example-area_name">[ <span class="example-area"><?php echo esc_html($area); ?></span>&nbsp;&nbsp; <span class="example-name"><?php echo esc_html($name); ?></span> ] </span>
      <?php endif ?>
      <?php if ($madori) : ?>
      <span class="example-yuka">間取：<?php echo esc_html($madori); ?></span>
      <?php endif ?>
      <?php if ($yuka) : ?>
      <span class="example-yuka">総工事床面積：<?php echo esc_html($yuka); ?></span>
      <?php endif ?>
      <?php if ($kasho) : ?>
      <span class="reform-kasho">施工箇所：<?php echo esc_html($kasho); ?></span>
      <?php endif ?>
      <?php if ($kikan) : ?>
      <span class="example-yosan">施工期間：<?php echo esc_html($kikan); ?></span>
      <?php endif ?>
      <?php if ($yosan) : ?>
      <span class="example-yosan">工事予算：<?php echo esc_html($yosan); ?>万円</span>
      <?php endif ?>
    </div>
    <?php
    $youbou = SCF::get( 'reform-youbou' );
    $kaiketsusaku = SCF::get( 'reform-kaiketsusaku' );
    ?>
    <?php if ($youbou) : ?>
    <dl class="reform-youbou mb-4">
      <dt class="title">■ お客様のご要望・お悩み</dt>
      <dd class="ml-3 pl-3"><?php echo wpautop(esc_html($youbou)); ?></dd>
    </dl>
    <?php endif ?>
    <?php if ($kaiketsusaku) : ?>
    <dl class="reform-kaiketsusaku mb-4">
      <dt class="title">■ <?php echo esc_html(get_option('profile_shop_name')); ?>からの解決策</dt>
      <dd class="ml-3 pl-3"><?php echo wpautop(esc_html($kaiketsusaku)); ?></dd>
    </dl>
    <?php endif ?>
  </div>
</div>

<!--　beforeafter表示-->
<?php $ba = SCF::get('ba'); ?>
<?php if (!empty($ba)): ?>
<div id="before-after" class="rel_lb py-5">
  <?php foreach ($ba as $fields): ?>
  <?php if (!empty($fields['ba_before']) || !empty($fields['add_contents'])): ?>
  <?php
  $ba_before = $fields[ 'ba_before' ];
  $ba_after = $fields[ 'ba_after' ];
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
      <figure class="w100"> <span class="ttl pt-1 pt-md-2 pb-md-1">施工前</span> <a href="<?php echo wp_get_attachment_url($ba_before, 'large'); ?>"> <img src="<?php echo wp_get_attachment_url($ba_before, 'thumbnail'); ?>"> </a> </figure>
    </div>
    <div class="col-1 px-0 arrow text-center align-self-center"> <span class="material-icons">arrow_forward_ios</span> </div>
    <div class="col-7 px-0 after-image">
      <figure class="w100"> <span class="ttl pt-1 pt-md-2 pb-md-1">施工後</span> <a href="<?php echo wp_get_attachment_url($ba_after, 'large'); ?>"> <img src="<?php echo wp_get_attachment_url($ba_after, 'large'); ?>"> </a> </figure>
    </div>
  </div>
  <?php endif; ?>
  <?php endforeach; ?>
</div>
<?php endif; ?>
