<?php
/**
 * hublog/loop-single-bukken.php
 * hublog6
 * 20230202
 */

if ( post_is_in_taxonomy_slug( 'rent', 'bukken' ) ) {
  $content_class[] = 'bukken-rent';
} elseif ( post_is_in_taxonomy_slug( 'sell', 'bukken' ) ) {
  $content_class[] = 'bukken-sell';
}

$soldout = ( post_custom( 'soldout' ) ) ? 'soldout' : '';
if ( !empty( $soldout ) ) {
  $content_class[] = 'soldout';
}
?>
<?php if ( function_exists( 'bread_crumb' ) ) : ?>
<div class="bread_crumb">
  <?php
  $bc_joint_string = '&gt;';
  $bread_crumb = bread_crumb( 'type=string&echo=0&$joint_string=' . $bc_joint_string );
  $bread_crumb_split = explode( $bc_joint_string, $bread_crumb );
  $bread_crumb = array();
  $linkback_category = $bread_crumb_split[ count( $bread_crumb_split ) - 2 ];
  for ( $bc_c = 0; $bc_c < count( $bread_crumb_split ) - 1; $bc_c++ ) {
    $bread_crumb[] = trim( $bread_crumb_split[ $bc_c ] );
  }
  echo join( ' ' . $bc_joint_string . ' ', $bread_crumb );
  ?>
</div>
<?php endif; ?>
<?php the_post(); ?>
<div id="post-title" class="clearfix" >
  <h1 class="entry-title">
    <?php if ( post_custom('catchcopy') ) : ?>
    <?php echo post_custom('catchcopy') ; ?>
    <?php else : ?>
    <?php the_title(); ?>
    <?php endif; ?>
  </h1>
  <span class="back-to-index"><?php echo $linkback_category; ?></span> </div>
<!-- #post-title -->

<div id="subtitle" class="clearfix">
  <div class="bukken-name"><?php echo post_custom('bukken-name'); ?></div>
  <div class="icon-features clearfix">
    <?php get_template_part('icon-features'); ?>
  </div>
  <?php if ( post_custom('rank') ) : ?>
  <div class="rank-large rank-<?php echo post_custom('rank'); ?>"></div>
  <?php endif; ?>
</div>
<!--subtitle--> 
<span class="date">掲載日：
<?php the_time('Y 年 n 月 j 日')  ?>
<?php edit_post_link(__('Edit'), ' (', ')'); ?>
</span>
<article id="post-<?php the_ID(); ?>" <?php post_class(join(' ',(array)$content_class)); ?>>
  <section id="single-left">
    <div id="spec_excerpt-box">
      <?php get_template_part('hublog-spec-excerpt', $in_cat); //物件情報抜粋 ?>
      <?php get_template_part('hublog-inquiry','single_bukken'); //問い合わせフック ?>
    </div>
    <!--spec_excerpt-box-->
    
    <?php get_template_part('hublog-spec-detail', $in_cat); //物件詳細 ?>
    <div id="spec_excerpt-btn" class="clearfix">
      <?php if ( post_custom('hanbaizumen') ) : ?>
      <div id="btn-spec-pdf"><a href="<?php echo esc_url(post_custom('hanbaizumen')); ?>">販売図面</a></div>
      <!--btn-spec-pdf-->
      <? endif ;?>
      <div id="btn-spec-print"><a href="#" onClick="window.print();return false">この物件の概要を印刷</a></div>
      <!--btn-spec-print--> 
      
    </div>
    <!--spec_excerpt-btn--> 
    
  </section>
  <!-- #single-left -->
  
  <section id="single-right" class="clearfix">
    <div id="topimage" class="clearfix gallery-set">
      <?php //targetable_gallery('thumbnail', array(620,465), 'onmouseover'); ?>
      <?php targetable_gallery('thumbnail', array(620,490), 'onmouseover', true); ?>
      <?php
      $images_zumen = get_planimgs();
      $c_pickupimg = 0;
      if ( count( $images_zumen ) ): ?>
      <div id="plans" class="clearfix">
        <h3 class="title">間取り図・案内図</h3>
        <?php foreach ( $images_zumen as $key => $value ) : ?>
        <div class="pickup-image pickup-image-<?php echo ++$c_pickupimg; ?> pickup-image-id-<?php echo $key; ?>"> <span class="title"><?php echo $value; ?></span> <a rel="lightbox[pickup]" href="<?php echo wp_get_attachment_url($key); ?>" ><?php echo wp_get_attachment_image($key,'medium') ?></a> </div>
        <?php endforeach; // $images_zumen ?>
      </div>
      <!-- #plans -->
      <?php endif; ?>
    </div>
    <!-- #topimage-->
    
    <article class="entry-content clearfix">
      <h2 class="entry-title">
        <?php the_title(); ?>
      </h2>
      <?php permalink_anchor(); ?>
      <?php the_content(); ?>
    </article>
    <!--entry-content -->
    
    <?php get_template_part('googlemaps', 'bukken'); ?>
    <?php if ( post_custom('loan-pay-month') ) : ?>
    <div id="loan-sample">
      <h3 class="title">ご返済の一例</h3>
      <div id="loan-sample-main" class="cleartype"> <span class="loan-pay-month"> <span class="number cleartype">月々<strong><?php echo post_custom_cft('loan-pay-month') ; ?></strong>のお支払い</span>　 </span> </div>
      <!--loan-sample-main-->
      
      <div id="loan-sample-sub"> <span class="loan-atamakin"> 頭金：<?php echo post_custom_cft('loan-deposit') ; ?> </span> &nbsp;&nbsp; <span class="loan-kariire"> 借入れ：<strong><?php echo post_custom_cft('loan-kariire') ; ?></strong> </span>
        <p class="loan-atamakin"> （金利：<strong><?php echo post_custom_cft('loan-kinri') ; ?></strong> <span class="loan-period">&nbsp;&nbsp;<?php echo post_custom_cft('loan-period') ; ?>返済の場合）</span> </p>
        <?php if ( post_custom('loan-caution') ) : ?>
        <p class="loan-caution"> ※&nbsp;<?php echo post_custom('loan-caution') ; ?> </p>
        <?php endif; ?>
      </div>
      <!--loan-sample-sub--> 
    </div>
    <!--loan-sample-->
    <?php endif; ?>
    <?php get_template_part('hublog-inquiry','single_bukken'); //問い合わせフック ?>
    <span class="back-to-index single-bottom"> <?php echo $linkback_category; ?> </span>
    <footer class="entry-utility page">
      <div class="entry-meta updated author"> <span class="date updated">
        <?php the_time('Y/n/j') ?>
        </span> <span class="author vcard">投稿者：<span class="fn">
        <?php the_author(); ?>
        </span></span> </div>
      <!--entry-meta-->
      <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>
    <!-- .entry-utility --> 
    
  </section>
  <!-- #single-right --> 
  
</article>
<!-- #post-## -->