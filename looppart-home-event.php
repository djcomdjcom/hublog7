<?php
/**
 * looppart-side_event.php
 *
 * @テーマ名	hublog
 * @更新日付	2012.04.05
 *
 */
?>
<article id="post-<?php the_ID(); ?>" class="post clearfix style-home-event">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new">新着</span>
  <?php endif; ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'イベント「', 'after' => '」詳細・参加方法ページヘ' ) ); ?>" class="thumbnail"> <span class="attachment">
  <?php if ( function_exists('the_post_image') && !the_post_image([600, 600]) ) : ?>
  <span class="noimg"></span>
  <?php endif; ?>
  </span> </a>
  <div class="metabox">
    <div class="inbox">
      <p class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => 'イベント「', 'after' => '」詳細・参加方法ページへ' ) ); ?>">
        <?php the_title(); ?>
        </a></p>
      <div class="event-nmeta">
        <?php if (post_custom('event-closed')) : ?>
        <span class="event-closed cleartype"> このイベントは終了しました。 </span>
        <?php endif  ?>
        <span class="event-date"> <span>開催日：</span><?php echo post_custom('event-date'); ?> </span> <span class="event-hour"> <span>開催時間：</span><?php echo post_custom('event-hour'); ?> </span> <span class="event-at"> <span>開催場所：</span><?php echo post_custom('event-at'); ?> </span> </div>
      <!--event-nmeta--> 
      
      <span class="todetail"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => 'イベント「', 'after' => '」' ) ); ?>">詳細・参加方法</a> </span> </div>
    <!--inbox--> 
    
  </div>
  <!--metabox-->
  
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
