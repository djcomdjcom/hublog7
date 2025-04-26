<?php
/**
 * looppart.php
 * hublog7
 * 20250425
 */
?>

<article class="post-<?php the_ID(); ?> post style-blog row linkarea p-3 px-sm-4 mx-auto mb-3 ">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span title="新着" class="tmb-icon new">NEW</span>
  <?php endif; ?>
  <span title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>" class="thumbnail col-sm-5 pr-sm-5 my-2"> <span class="attachment">
  <?php if ( function_exists('the_post_image') && !the_post_image('medium') ) : ?>
  <span class="noimg"></span>
  <?php endif; ?>
  </span> </span>
  <div class="metabox col-sm-7 col-xl-6 align-self-stretch  py-3 px-3 pr-sm-0 py-xl-0"> <span class="date d-block pb-3 py-lg-3">
    <?php the_time('Y/n/j') ?>
    </span>
    <p class="title mb-0"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
      <?php the_title(); ?>
      </a> </p>
    <?php if (in_category('event-closed')) : ?>
    <span class="event-closed cleartype"> このイベントは終了しました。ありがとうございました。 </span>
    <?php endif  ?>
    <div class="excerpt d-none d-sm-block pt-2">
      <?php the_excerpt(); ?>
    </div>
  </div>
  <!--metabox--> 
  <span class="todetail"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"> 詳細を見る</a></span>
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!-- #post --> 

