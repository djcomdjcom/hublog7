<?php
/**
 * looppart-home-blog.php
 * @テーマ名	hublog6
 */
?>
<article  class="post-<?php the_ID(); ?> post style-inc_blog row justify-content-around m-0 px-2 py-3 mb-1 linkarea">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new">新着</span>
  <?php endif; ?>
  <span href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>" class="thumbnail col-5 m-0"> <span class="attachment">
  <?php
  if ( function_exists( 'the_post_image' ) ) {
    if ( the_post_image( array( 400, 400 ) ) === false ) {
      ?>
  <span class="noimg"></span>
  <?php
  }
  }
  ?>
  </span> </span>
  <div class="metabox col-7 pl-0"> <span class="date">
    <?php the_time('Y/n/j') ?>
    </span>
    <p class="title">
      <?php the_title(); ?></p>
    <?php if (in_category('event-closed')) : ?>
    <span class="event-closed cleartype"> このイベントは終了しました。ありがとうございました。 </span>
    <?php endif  ?>
  </div>
  <!--metabox-->
  <span class="todetail"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"> 詳細を見る</a></span>
	
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!-- #post --> 

