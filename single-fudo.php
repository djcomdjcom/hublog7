<?php
/**
 * single-fudo.php
 * hublog6
 * 20230202
 */

get_header();
?>

<?php the_post(); ?>
<header id="fudo_header" class="clearfix">
  <div class="r-box">
    <?php the_post_thumbnail('large'); ?>
  </div>
  <!--R-->
  
  <div class="l-box">
    <h1 class="entry-title">
      <?php if ( post_custom('catchcopy') ) : ?>
      <?php echo post_custom('catchcopy') ; ?>
      <?php else : ?>
      <?php the_title(); ?>
      <?php endif; ?>
    </h1>
    <?php get_template_part('hublog-spec-excerpt', $in_cat); //物件情報抜粋 ?>
  </div>
  <!--L--> 
  
</header>
<?php if (post_custom ('madorizu1') || post_custom ('madorizu2') || post_custom ('madorizu3') || post_custom ('madorizu4') || post_custom ('madorizu4-title') || post_custom ('kukakuzu'))  :?>
<section id="bukken_plan" class="clearfix shadow">
  <h2 class="title">PLAN　プラン</h2>
  <div class="flexbox bukken_plan_cells">
    <?php if ( post_custom('madorizu1') ) : ?>
    <div class="madorizu1 bukken_plan_cell"> <?php echo wp_get_attachment_link(post_custom('madorizu1'),array(500, 500));?> <span class="title">1階</span> </div>
    <?php endif; ?>
    <?php if ( post_custom('madorizu2') ) : ?>
    <div class="madorizu2 bukken_plan_cell"> <?php echo wp_get_attachment_link(post_custom('madorizu2'),array(500, 500));?> <span class="title">2階</span> </div>
    <?php endif; ?>
    <?php if ( post_custom('madorizu3') ) : ?>
    <div class="madorizu3 bukken_plan_cell"> <?php echo wp_get_attachment_link(post_custom('madorizu3'),array(500, 500));?> <span class="title">3階</span> </div>
    <?php endif; ?>
    <?php if ( post_custom('madorizu4') ) : ?>
    <div class="madorizu4 bukken_plan_cell"> <?php echo wp_get_attachment_link(post_custom('madorizu4'),array(500, 500));?> <span class="title"><?php echo ( post_custom('madorizu4-title') ); ?></span> </div>
    <?php endif; ?>
    <?php if ( post_custom('kukakuzu') ) : ?>
    <div class="kukakuzu bukken_plan_cell"> <?php echo wp_get_attachment_link(post_custom('kukakuzu'),array(500, 500));?> <span class="title">区画図</span> </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(join(' ',(array)$content_class)); ?>>
<article class="entry-content clearfix">
  <h2 class="entry-title">
    <?php the_title(); ?>
  </h2>
  <?php permalink_anchor(); ?>
  <?php the_content(); ?>
</article>
<!--entry-content -->

<?php if (post_custom ('bukken_process1') || post_custom ('bukken_process2') || post_custom ('bukken_process3') || post_custom ('bukken_process4'))  :?>
<section id="bukken_process" class="clearfix shadow">
  <h2 class="title">この建物の施工の様子</h2>
  <div class="flexbox">
    <?php if ( post_custom('bukken_process1') ) : ?>
    <div class="bukken_process_cell"> <span class="attachment"> <?php echo wp_get_attachment_link(post_custom('bukken_process1'),array(150, 150));?> <span class="title">工事前</span> </span> </div>
    <?php endif; ?>
    <?php if ( post_custom('bukken_process2') ) : ?>
    <div class="bukken_process_cell"> <span class="attachment"> <?php echo wp_get_attachment_link(post_custom('bukken_process2'),array(150, 150));?> <span class="title">基礎工事</span> </span> </div>
    <?php endif; ?>
    <?php if ( post_custom('bukken_process3') ) : ?>
    <div class="bukken_process_cell"> <span class="attachment"> <?php echo wp_get_attachment_link(post_custom('bukken_process3'),array(150, 150));?> <span class="title">上棟</span> </span> </div>
    <?php endif; ?>
    <?php if ( post_custom('bukken_process4') ) : ?>
    <div class="bukken_process_cell"> <span class="attachment"> <?php echo wp_get_attachment_link(post_custom('bukken_process4'),array(150, 150));?> <span class="title"><?php echo (post_custom('bukken_process4-title'));?></span> </span> </div>
    <?php endif; ?>
  </div>
</section>
<!--bukken_process-->
<?php endif; ?>
<section id="bukken-pickup" class="shadow">
  <h3 class="title">この物件の写真</h3>
  <?php if ( post_custom('bukken_gallery-code') ) : ?>
  <?php echo do_shortcode( post_custom('bukken_gallery-code')) ; ?>
  <?php else : ?>
  <section id="galleryslider" class="clearfix shadow"> <?php echo (do_shortcode('[gallery link="file" title="false" caption="true" description="true" size="thumbnail" ]')); ?> </section>
  <!--　-->
  <?php endif ; ?>
</section>
<!-- #bukken-pickup -->

<section id="bukken_lifeinfo" class="clearfix shadow">
  <section id="profile_googlemap">
    <h3 class="address clearfix">
      <?php if ( post_custom('bukken-name') ) : ?>
      「<?php echo post_custom_cft('bukken-name'); ?>」
      <?php else: ?>
      この物件の
      <?php endif; ?>
      周辺地図 <span>&nbsp;（
      <?php
      echo post_custom_cft( 'address1' );
      echo post_custom_cft( 'address2' );
      echo post_custom_cft( 'address3' );
      echo post_custom_cft( 'address4' );
      ?>
      付近）</span> </h3>
    <div class="movie-wrap">
      <?php //get_template_part('googlemaps', 'bukken'); ?>
      <?php
      $gm_address = post_custom( 'address1' ) . post_custom( 'address2' ) . post_custom( 'address3' );
      $address4 = post_custom( 'address4' );
      $gm_address .= ( ctype_digit( $address4 ) ) ? $address4 . '丁目': $address4;
      $gm_address .= post_custom( 'address5' );
      ?>
      <iframe width="100%" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?q=<?php echo $gm_address; ?>&amp;z=17&output=embed&iwloc=B"></iframe>
    </div>
  </section>
</section>
<section id="fudo-spec" class="stack-box">
  <input type="checkbox" id="stack-btn01" class="stack-btn" />
  <label for="stack-btn01" class="stack-label">この物件の詳細情報</label>
  <div class="stack-content">
    <?php get_template_part('hublog-spec-detail', $in_cat); //物件詳細 ?>
    <div id="spec_excerpt-btn" class="clearfix">
      <?php if ( post_custom('hanbaizumen') ) : ?>
      <div id="btn-spec-pdf"><a target="_blank" href="<?php echo esc_url(post_custom('hanbaizumen')); ?>"><span>販売図面ダウンロード
        </spanspan>
        </a></div>
      <!--btn-spec-pdf-->
      <?php endif; ?>
      <div id="btn-spec-print"><a href="#" onClick="window.print();return false"><span>この物件の概要を印刷
        </spanspan>
        </a> </div>
      <!--btn-spec-print--> 
      
    </div>
    <!--spec_excerpt-btn--> 
    <!--spec_excerpt-btn--> 
    
  </div>
</section>
<!-- #fudo-speck -->

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

</div>
<!-- #container -->
<?php get_footer(); ?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/inview/jquery.inview.js"></script> 
<script>  
  
  // JS
jQuery(function() {
	jQuery('.reach').on('inview', function(event, isInView, visiblePartX, visiblePartY) {
		if(isInView){
			jQuery(this).stop().addClass('on');
		}
		else{
			jQuery(this).stop().removeClass('on');
		}
	});
});
</script> 
