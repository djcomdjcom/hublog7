<?php
$post_id = get_the_ID();

/**
 * remove-gallery / remove_gallery 両対応
 */
$remove_gallery =
    get_post_meta($post_id, 'remove_gallery', true);

if ($remove_gallery === '') {
    $remove_gallery =
        get_post_meta($post_id, 'remove-gallery', true);
}

/**
 * renove-gallery / renove_gallery 両対応
 */
$renove_gallery =
    get_post_meta($post_id, 'renove_gallery', true);

if ($renove_gallery === '') {
    $renove_gallery =
        get_post_meta($post_id, 'renove-gallery', true);
}

/**
 * gallery_off でなければ表示
 */
if ($remove_gallery !== 'gallery_off' && $renove_gallery !== 'gallery_off') :
?>

<?php
$gallery_caption = get_post_meta(get_the_ID(), 'gallery_caption', true);
?>
<div id="galleryslider"
     class="mx-fit py-0 sliderArea rel_lb
     <?php if ($gallery_caption === 'caption_visible') echo 'caption_visible'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick-theme.css" media="screen">
  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.min.js"></script> 
  <script>
jQuery(function($){
$('#galleryslider .gallery-size-large').addClass('slider_thumb slider'); 
$('#galleryslider .gallery-size-thumbnail ').addClass('thumb wrapper mx-auto py-3 py-md-3'); 

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
  <h2 class="title mt-3 py-md-5 px-sm-0"> <span class="catchcopy "> <?php echo nl2br ( post_custom('catchcopy') ); ?> </span> </h2>
  <?php endif ;?>
<?php
$fields = [
    'remove-gallery',
    'example-name',
    'example-family',
    'example-area',
    'example-kouhou',
    'example-shikichi',
    'example-yuka',
    'example-C',
    'example-Q',
    'example-UA',
    'example_etaAC',
    'example_BEI',
    'example_BELS_star',
    'example_BELS_note'
];

$has_data = array_filter(array_map(function($key) use ($post_id) {
    // アンダースコア版
    $underscore = str_replace('-', '_', $key);
    $val = get_post_meta($post_id, $underscore, true);

    // ハイフン版
    if ($val === '') {
        $val = get_post_meta($post_id, $key, true);
    }

    return $val;
}, $fields));

if (!empty($has_data)) :
?>    
  <div class="row justify-content-between mx-auto px-0 pt-5">
    <div class="example-entry  order-1 order-md-2 ">
      <?php the_content(); ?>
    </div>
    <div  class=" order-2 order-md-1" id="example-data">
      <h3 class="ttl small mt-md-0">Data</h3>
        
<?php
if (!function_exists('hublog_meta')) {
    function hublog_meta($post_id, $base_key) {

        // アンダースコア版
        $underscore = str_replace('-', '_', $base_key);
        $val = get_post_meta($post_id, $underscore, true);

        // ハイフン版
        if ($val === '') {
            $val = get_post_meta($post_id, $base_key, true);
        }

        return $val;
    }
}
?>
<table class="mt-0 ml-sm-3">

<?php if (hublog_meta($post_id, 'example-name')) : ?>
<caption class="my-4">
<?php echo esc_html(hublog_meta($post_id, 'example-name')); ?>様邸
</caption>
<?php endif; ?>

<?php if (hublog_meta($post_id, 'example-family')) : ?>
<tr>
  <th>家族構成</th>
  <td><?php echo wpautop(hublog_meta($post_id, 'example-family')); ?></td>
</tr>
<?php endif; ?>

<?php if (hublog_meta($post_id, 'example-area')) : ?>
<tr>
  <th>施工エリア</th>
  <td><?php echo esc_html(hublog_meta($post_id, 'example-area')); ?></td>
</tr>
<?php endif; ?>

<?php if (hublog_meta($post_id, 'example-kouhou')) : ?>
<tr>
  <th>工法・構造</th>
  <td><?php echo esc_html(hublog_meta($post_id, 'example-kouhou')); ?></td>
</tr>
<?php endif; ?>

<?php if (hublog_meta($post_id, 'example-taishin')) : ?>
<tr>
  <th>耐震等級</th>
  <td><?php echo esc_html(hublog_meta($post_id, 'example-taishin')); ?></td>
</tr>
<?php endif; ?>

<?php if (hublog_meta($post_id, 'example-shikichi')) : ?>
<tr>
  <th>敷地面積</th>
  <td><?php echo esc_html(hublog_meta($post_id, 'example-shikichi')); ?></td>
</tr>
<?php endif; ?>

<?php if (hublog_meta($post_id, 'example-yuka')) : ?>
<tr>
  <th>床面積</th>
  <td><?php echo esc_html(hublog_meta($post_id, 'example-yuka')); ?></td>
</tr>
<?php endif; ?>

<?php if (hublog_meta($post_id, 'example-madori')) : ?>
<tr>
  <th>間取</th>
  <td><?php echo esc_html(hublog_meta($post_id, 'example-madori')); ?></td>
</tr>
<?php endif; ?>

</table>
        
<?php
// =======================
// 建物性能まとめ
// =======================

$bels_star = hublog_meta($post_id, 'example_BELS_star');
$bels_note = hublog_meta($post_id, 'example_BELS_note');

$c_value  = hublog_meta($post_id, 'example-C');
$q_value  = hublog_meta($post_id, 'example-Q');
$ua_value = hublog_meta($post_id, 'example-UA');
$eta_ac   = hublog_meta($post_id, 'example_etaAC');
$bei      = hublog_meta($post_id, 'example_BEI');

if (
    $bels_star || $c_value || $q_value ||
    $ua_value || $eta_ac || $bei
) :
?>
<table class="mt-0 ml-sm-3 mt-5">
<caption class="my-3">
建物性能
</caption>
<tbody>
    <?php if ($bels_star && is_numeric($bels_star)) : ?>
    <tr>
  <th colspan="2" class="performance-badge text-center">
        BELS</th>
    </tr>
    <tr>
    <td colspan="2" class="text-center">
                <?php
        $bels_star = (int)$bels_star;
        echo '<span class="bels_stars">';
        echo str_repeat('★', $bels_star) . str_repeat('☆', 5 - $bels_star);
        echo '</span>';
        if ($bels_note) {
            echo '（' . esc_html($bels_note) . '）';
        }
        ?>
</td></tr>
    <?php endif; ?>

    <?php if ($c_value) : ?>
      <tr class="performance-badge">
        <th>C値</th><td>
        <?php echo esc_html($c_value); ?>
      </td></tr>
    <?php endif; ?>

    <?php if ($q_value) : ?>
      <tr class="performance-badge">
        <th>Q値</th><td>
        <?php echo esc_html($q_value); ?>
      </td></tr>
    <?php endif; ?>

    <?php if ($ua_value) : ?>
      <tr class="performance-badge">
        <th>UA値</th><td>
        <?php echo esc_html($ua_value); ?>
      </td></tr>
    <?php endif; ?>

    <?php if ($eta_ac) : ?>
      <tr class="performance-badge">
        <th>ηAC値</th><td>
        <?php echo esc_html($eta_ac); ?>
      </td>
    </tr>
    <?php endif; ?>
    <?php if ($bei && is_numeric($bei)) : ?>
        <tr class="example-bei"><td colspan="2" class=""><span>一次エネルギー削減率　</span><?php echo round((1 - $bei) * 100); ?>%</td></tr>
    <?php endif; ?>

  </tbody>
</table>
<?php endif; ?>
        
        
        
        
    </div>
    <!--example-data--> 
    
  </div>
  <?php else:?>
  <?php the_content(); ?>
  <?php endif ; ?>
</article>
