<?php
/**
 * looppart.php
 * @テーマ名	hublog6
 */
?>
<div class="post-<?php the_ID(); ?> post style-slide clearfix carousel-cell">
  <?php if  (post_custom('slide_url')):?>
  <a class="w100" href="<?php echo (post_custom('slide_url')) ;?>" title="<?php the_title(); ?>"<?php if(get_post_meta(get_the_ID(),'slide_target',true)==1){ ?> target="_blank"<?php } ?>>
  <?php the_post_thumbnail(array(1200, 630, true)); ?>
  </a>
  <?php else:?>
  <span class="w100">
  <?php the_post_thumbnail(array(1200, 630, true)); ?>
  </span>
  <?php endif;?>
  <?php edit_post_link(__('Edit'), '', ''); ?>
</div>
<!-- #post --> 
