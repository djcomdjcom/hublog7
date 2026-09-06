<?php
/**
 * looppart-card_media.php
 * hublog7
 * 20260312
 */
?>

<article class="post-<?php the_ID(); ?> post style-card_media linkarea p-3  mb-3 d-flex d-md-block col-12 col-md-3">
  <figure title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>" class="thumbnail col-5 col-sm-4 col-md-12 p-0">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span title="新着" class="tmb-icon new">NEW</span>
  <?php endif; ?>
  <?php if ( function_exists('the_post_image') && !the_post_image('medium') ) : ?>
  <span class="noimg"></span>
  <?php endif; ?>
  </figure>
  <div class="metabox pl-4 pl-md-0">
    <p class="title mb-0"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
      <?php the_title(); ?>
      </a> </p>
    <div class="excerpt d-none d-md-block pt-2 txt-s">
      <?php the_excerpt(); ?>
    </div>
  </div>
  <!--metabox--> 
  <span class="todetail"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"> 詳細を見る</a></span>
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!-- #post --> 

