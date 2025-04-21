<?php
/**
 * looppart-shokunin.php
 *
 * @テーマ名	hublog
 * @更新日付	2016.03.25
 *
 */
?>
<div  class="post-<?php the_ID(); ?> post clearfix style-shokunin flex50">
  <div class="thumbnail">
<?php if ( function_exists('the_post_image') && !the_post_image('thumbnail') ) : ?>
  <span class="noimg"></span>
<?php endif; ?>

  </div>
  <!--thumbnail-->
  
  <div class="clearfix metabox">
    <div class="inbox">
      <div class="shokunin-meta-name clearfix">
        <div class="shokunin-skill-name"> <span class="shokunin-skill"> <span><?php echo post_custom('shokunin-skill'); ?></span> </span>
          <div class="shokunin-name-box"> <span class="shokunin-rubi"><?php echo post_custom('shokunin-rubi'); ?></span> <span class="shokunin-name">
            <?php the_title(); ?>
            </span> </div>
          <!--shokunin-name-box--> 
        </div>
        <!--shokunin-skill-name-->
        
        <div class="shokunin-meta">
          <?php if (post_custom('shokunin-history')) : ?>
          <span class="shokunin-history">職歴：<?php echo post_custom('shokunin-history'); ?></span>
          <?php endif  ?>
          <?php if (post_custom('shokunin-from')) : ?>
          <span class="shokunin-from"><?php echo post_custom('shokunin-from'); ?>出身</span>
          <?php endif  ?>
        </div>
        <!--inbox--> 
      </div>
      <!--shokunin-meta-name-->
      
      <div class="shokunin-description"> <?php echo wpautop(post_custom('shokunin-description')); ?></div>
      <?php if (post_custom('shokunin-message')) : ?>
      <div class="shokunin-message clearfix"> <span class="title">一言メッセージ</span> <?php echo  wpautop(post_custom('shokunin-message')); ?> </div>
      <?php endif  ?>
    </div>
    <!--inbox--> 
  </div>
  <!--shokunin-metabox-->
  
  <?php edit_post_link(__('Edit'), ''); ?>
</div>
