<?php
/**
looppart-inc_news.php
 * @テーマ名	hublog6
 */
?>
<article  class="post-<?php the_ID(); ?> post style-inc_news row justify-content-around p-2 py-md-3 mt-3 mb-4 mb-md-0 linkarea">
  <figure href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>" class="col-4 thumbnail mb-0"> <span class="attachment my-0">
    <?php if ( function_exists('the_post_image') && !the_post_image('medium') ) : ?>
    <span class="noimg"></span>
    <?php endif; ?>
    </span> </figure>
  <div class="metabox px-0 px-md-3 col-8 align-self-stretch">
    <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
    <span class="tmb-icon new d-block position-relative">新着</span>
    <?php endif; ?>
    <span class="d-block"> <span >
    <?php the_time('Y/n/j') ?>
    </span> </span>
    <p class="title">
      <?php the_title(); ?>
    </p>
  </div>
  <!--metabox--> 
  <span class="todetail"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"> 詳細を見る</a></span>
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!-- #post --> 

