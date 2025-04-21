<?php
/**
 * looppart.php
 * @テーマ名	hublog6
 */
?>
<article class="post-<?php the_ID(); ?> post style-home_blog linkarea">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new">新着</span>
  <?php endif; ?>
  <figure href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>" class="thumbnail"> <span class="attachment">
<?php if ( function_exists('the_post_image') && !the_post_image('medium') ) : ?>
  <span class="noimg"></span>
<?php endif; ?>

    </span> </figure>
  <div class="metabox"> <span class="date">
    <?php the_time('Y/n/j') ?>
    </span>
    <p class="title">
      <?php the_title(); ?>
    </p>
    <?php if (in_category('event-closed')) : ?>
    <span class="event-closed cleartype"> このイベントは終了しました。ありがとうございました。 </span>
    <?php endif  ?>
    <div class="excerpt d-none d-sm-block">
      <?php the_excerpt(); ?>
      <span class="todetail"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"> 詳細を見る</a></span> </div>
  </div>
  <!--metabox-->
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!-- #post --> 

