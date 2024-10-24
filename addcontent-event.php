<?php
/**
 * addcontent-event.php
 *
 * @テーマ名	hublog-c
 * @更新日付	2012.02.15
 *
 */
?>
<?php if (in_category('event-closed')) : ?>
<div class="addcontent-event">
<p class="event-closed text-center "> このイベントは終了しました。<br />
ありがとうございました。 </p>
</div>
<?php else  :?>
<?php if (post_custom('event-date')) :	?>
<div id="addcontent-event" class="row p-4 mx-0 mb-5">
  <div class="eyecatch col-md-6 px-0 pb-3 p-sm-3"> <span class="w100">
	  
<?php if (has_post_thumbnail()) : ?>
  <?php the_post_thumbnail('large'); ?>
<?php else: ?>
  <span class="noimg"></span>
<?php endif; ?>
    </span>
	<?php get_template_part('icon_status');//ステイタスアイコン ?>	
	</div>
  <div class="event-meta col-md-6 px-0 p-sm-3 pl-md-4">
	  
    <?php if(post_custom('catchcopy')) :?>
    <p class="catchcopy txt-ll mb-4 mb-sm-5"> <?php echo nl2br ( post_custom('catchcopy') ); ?> </p>
    <?php endif ;?>
	  <div class="pl-sm-4">
	<?php get_template_part('cat_icon');//カテゴリーアイコン ?>
	  
    <span class="event-date"> 開催日：<?php echo post_custom('event-date'); ?> </span> <span class="event-hour"> 開催時間：<?php echo post_custom('event-hour'); ?> </span> <span class="event-at"> 開催場所：<?php echo post_custom('event-at'); ?> </span> </div>
	</div>
</div>
<!--addcontent-event-->
<?php endif //event-date ;?>
<?php endif  ;?>
