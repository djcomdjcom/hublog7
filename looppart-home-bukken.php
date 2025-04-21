<?php
/**
 * looppart-bukken.php
 *
 * @テーマ名	hublog
 *
 */
?>
<article id="post-<?php the_ID(); ?>"  <?php post_class('post style-home-bukken clearfix '); ?>>
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new">新着</span>
  <?php endif; ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumbnail">
	  <span class="attachment">
<?php if ( function_exists('the_post_image') && !the_post_image([600, 600]) ) : ?>
  <span class="noimg"></span>
<?php endif; ?>
  </span><!--attachment--> 
  
  </a>
  <div class="metabox">
    <div class="excerpt"> <span class="title"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
      <?php
      if ( get_post_status() == 'private' ) {
        echo '非公開：';
      }
      echo( post_custom( 'catchcopy' ) ) ? post_custom( 'catchcopy' ) : get_the_title();
      ?>
      </a> </span>
      <?php get_template_part('hublog-spec-excerpt', 'home'); //物件情報抜粋 ?>
      <div class="icon-features clearfix">
        <?php get_template_part('icon-features'); ?>
      </div>
    </div>
    <!--excerpt--> 
    
  </div>
  <!--metabox-->
  
  <?php if ( is_user_logged_in() ) : ?>
  <?php if ( post_custom('urinushi') ) : ?>
  <div class="user-loggedin clear" style="border-top:1px dotted #ccc;"> <?php echo post_custom('urinushi') ; ?> </div>
  <?php endif; ?>
  <?php endif; ?>
  <a class="todetail" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">物件詳細</a>
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!-- #post-ID --> 

