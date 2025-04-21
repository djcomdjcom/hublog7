<?php
/**
 * looppart-thumb_title.php
 */
?>
<article class="post-<?php the_ID(); ?> post clearfix style-thumb_title linkarea">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new">新着</span>
  <?php endif; ?>
  <span class="thumbnail mb-2"> <span class="attachment">
  <?php if ( function_exists('the_post_image') && !the_post_image('thumbnail') ) : ?>
  <span class="noimg"></span>
  <?php endif; ?>
  </span><!--attachment--> 
  </span> <span class="date my-2">
  <?php the_time('Y/n/j') ?>
  </span>
  <p class="title pb-3">
    <?php the_title(); ?>
  </p>
  <span class="todetail"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
  <?php the_title(); ?>
  </a> </span>
  <?php edit_post_link(__('Edit'), '', ''); ?>
</article>
<!-- #post --> 
