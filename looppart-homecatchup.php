<?php
/**
 * looppart-homecatchup.php
 *
 * @テーマ名	hublog
 * @更新日付	2012.04.05
 *
 */

if ( $in_cat ) {
  $content_class[] = 'category-' . $in_cat;
}
$soldout = ( post_custom( 'soldout' ) ) ? 'soldout' : '';
if ( !empty( $soldout ) ) {
  $content_class[] = 'soldout';
}
?>
<article id="post-<?php the_ID(); ?>"  class="post clearfix style-home-catchup"> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="medium">
<?php if ( function_exists('the_post_image') && !the_post_image('medium') ) : ?>
  <span class="noimg"></span>
<?php endif; ?>

  </a>
  <div class="metabox">
    <?php if ( get_post_status() == 'private' ) { echo '<span class="admin">&laquo;非公開記事&raquo;</span>'; } ?>
    <?php get_template_part('hublog-spec-excerpt'); //物件情報抜粋 ?>
    <p class="title"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
      <?php
      if ( get_post_status() == 'private' ) {
        echo '非公開：';
      }
      echo( post_custom( 'catchcopy' ) ) ? post_custom( 'catchcopy' ) : wp_title( '' );
      ?>
      </a> </p>
  </div>
  <!--metabox--> 
  
  <span class="todetail"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">詳細情報</a> </span>
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!-- div#post-ID --> 
