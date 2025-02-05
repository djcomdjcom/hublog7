<?php
/**
 * looppart-headline.php
 */
?>
<article class="post-<?php the_ID(); ?> post style-headline ">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new mr-auto">新着</span>
  <?php endif; ?>
  <div class=" row justify-content-between mx-auto px-0"> <a class="title" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
    <?php the_title(); ?>
    </a> <span class="date"> 掲載日：
    <?php the_time('Y/n/j') ?>
    </span> </div>
  <?php edit_post_link(__('Edit'), '', ''); ?>
</article>
<!-- #post --> 

