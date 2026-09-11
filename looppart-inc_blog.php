<?php
/**
 * looppart-inc_blog.php
 * @テーマ名	hublog7
 */
?>
<article id="post-<?php the_ID(); ?>"  class="post clearfix pt-2 style-inc_blog linkarea">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new">新着</span>
  <?php endif; ?>
  <figure href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'お客様の声「', 'after' => '」詳細ページへ' ) ); ?>" class="thumbnail"> <span class="attachment">
    <?php
    if ( function_exists( 'the_post_image' ) ) {
      if ( the_post_image( 'medium' ) === false ) {
        ?>
    <span class="noimg"></span>
    <?php
    }
    }
    ?>
    </span> </figure>
  <div class="metabox"> <span class="date pb-2">
    <?php the_time('Y/n/j') ?>
    </span>
    <p class="title position-relative pb-3">
      <?php the_title(); ?>
    </p>
    <span class="todetail"><a href="<?php if(post_custom('events-page_url')) :?><?php echo(post_custom('events-page_url')) ;?>" target="_blank<?php else :?><?php the_permalink(); ?><?php endif;?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">詳細を見る</a></span> </div>
  <!--metabox-->
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!-- #post --> 

