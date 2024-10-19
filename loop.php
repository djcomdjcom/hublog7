<?php
/**
 * loop.php
 * hublog7
 * 20240920
 */
?>
<?php
if ( !( is_home() ) ):
  $h1_class = '';
if ( is_category() ):
  if ( function_exists( 'get_all_terms_meta' ) ) { //Plugin:wp-category-meta
    $catmetas = get_all_terms_meta( $cat );
    $catmeta = ( isset( $catmetas[ 'h1' ] ) ) ? array_pop( $catmetas[ 'h1' ] ) : '';
    if ( empty( $catmeta ) ) {
      $catmetas = get_all_terms_meta( get_parent_cat_id( $cat ) );
      $catmeta = ( isset( $catmetas[ 'h1' ] ) ) ? array_pop( $catmetas[ 'h1' ] ) : '';
    }
  }
if ( empty( $catmeta ) ) {
  $page_title = single_cat_title( '', false );
} else {
  $page_title = '<img src="' . $catmeta . '" alt="' . single_cat_title( '', false ) . '" title="' . single_cat_title( '', false ) . '" />';
  $h1_class = 'title-image';
} elseif ( is_tag() ): $page_title = sprintf( __( 'Tag Archives: %s', 'twentyten' ), '<span>' . single_tag_title( '', false ) . '</span>' );

elseif ( is_tax() ): $page_title = sprintf( __( '%s', 'twentyten' ), '<span class="taxonomy">' . single_term_title( '', false ) . '一覧</span>' );


elseif ( is_post_type_archive( array( 'example', 'voice', 'reform' ) ) ): $page_title = sprintf( __( '%s', 'twentyten' ), '<span>' . get_post_type_object( get_post_type() )->label . '</span>' );

elseif ( is_day() ): $page_title = sprintf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() );
elseif ( is_month() ): $page_title = sprintf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date( 'F Y' ) );
elseif ( is_year() ): $page_title = sprintf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date( 'Y' ) );
elseif ( is_404() ): $page_title = __( 'Not Found' );
else :$page_title = wp_title( '', false ) . __( ' の記事一覧' );
endif;
?>
<header class="entry-header wrapper mx-auto">
  <h1 class="index-title entry-title col <?php echo $h1_class; ?>"><span><?php echo $page_title; ?></span></h1>
</header>
<?php endif; //!is_home ?>
<script>
jQuery(function(){
jQuery('.posts .post.style-example').addClass('col-6 col-lg-4'); 
jQuery('.posts .post.style-voice').addClass('col-6 col-lg-4'); 
jQuery('.posts .post.style-event').addClass('mx-auto'); 
jQuery('.posts .post.style-event').addClass('mb-5'); 
jQuery('.posts .post.style-event .thumbnail').addClass('pr-md-5'); 
});
</script>
<?php if (is_post_type_archive ( array('example','voice') ) || is_tax(array('ex_cat','voice_cat'))):?>
<div class="wrapper px-3 px-xl-0">
<div <?php body_class( 'posts row justify-content-start' ); ?>>
<?php else :?>
<div class="wrapper maxw-1000 mx-auto pl-3 px-3">
  <div <?php body_class( 'posts mx-fit' ); ?>>
    <?php endif ;?>
    <?php
    if ( !have_posts() ):
      /* 記事が見つからなかった場合の表示 */
      ?>
    <div id="post-0" class="post error404 not-found mx-auto">
      <div class="entry-content cleartype" style="font-size:20px; color:#666; font-weight:bold; text-align:center; opacity: 0.65;">
        <p>&nbsp;</p>
        <p>申し訳ございません。</p>
        <p>お探しのページは削除または、アドレスが変更となりました。<br />
          恐れ入りますが、<br />
          <a href="<?php site_url(); ?>">トップページ</a><br />
          よりご希望のメニューをお選びください。 </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
      <!-- .entry-content --> 
    </div>
    <!-- #post-0 -->
    
    <?php else : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php $looppart = apply_filters('looppart','index'); ?>
    <?php get_template_part('looppart', $looppart); ?>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <!--posts archive--> 
</div>
<div class="pagebar">
  <?php wp_pagenavi(); ?>
</div>
<?php //if ( in_category(array('blog','genba','staff','shachou')) ):?>
<?php //get_sidebar(); ?>
<?php //endif;?>
