<?php
/**
 * looppart-headline_event.php
 */
?>
<article id="post-<?php the_ID(); ?>" class="post clearfix style-headline event">
  <?php if (post_custom('event-date')) : ?>
  <span class="event-date"><small>開催日：</small><?php echo post_custom('event-date'); ?></span>
  <?php endif ;?>
  <span class="title">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new">新着</span>
  <?php endif; ?>
  <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
  <?php the_title(); ?>
  </a>
  <?php edit_post_link(__('Edit'), '', ''); ?>
  </span> <span class="date">投稿日：
  <?php the_time('Y/n/j') ?>
  </span> </article>
<!-- #post --> 

