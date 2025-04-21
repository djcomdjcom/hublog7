<?php
/**
 * looppart-bukken.php
 *
 * @テーマ名	hublog
 *
 */
?>
<?php if ( post_is_in_taxonomy_slug('sell','bukken') ) : ?>
<article id="post-<?php the_ID(); ?>" class="post clearfix style-bukken sell">
<?php if ( is_new( WHATSNEW_TTL ) ) : ?>
<span class="tmb-icon new">新着物件</span>
<?php endif; ?>
<?php elseif ( post_is_in_taxonomy_slug('rent','bukken') ) : ?>
<article id="post-<?php the_ID(); ?>"   class="post clearfix style-bukken rent">
<?php else : ?>
<article id="post-<?php the_ID(); ?>"  class="post clearfix style-bukken">
  <?php endif; // kakaku:chinryo ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>" class="thumbnail"> <span class="attachment">
  <?php if ( function_exists( 'the_post_image' ) && !the_post_image( 'medium' ) ) : ?>
  <span class="noimg"></span>
  <?php endif; ?>
  </span> </a>
  <div class="metabox">
    <div class="inbox"> <span class="title"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
      <?php
      if ( get_post_status() == 'private' ) {
        echo '非公開：';
      }
      echo( post_custom( 'catchcopy' ) ) ? post_custom( 'catchcopy' ) : get_the_title();
      ?>
      </a></span>
      <?php get_template_part('hublog-spec-excerpt', 'sell'); //物件情報抜粋 ?>
      <div class="icon-features clearfix">
        <?php get_template_part('icon-features'); ?>
      </div>
      <div class="the_excerpt" style="clear: both;">
        <?php the_excerpt(); ?>
      </div>
      <!--the_excerpt--> 
      
      <span class="todetail"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">詳細情報</a> </span> </div>
    <!--inbox--> 
    
  </div>
  <!--metabox-->
  
  <?php if ( is_user_logged_in() ) : ?>
  <?php if ( post_custom('urinushi') ) : ?>
  <div class="user-loggedin clear" style="border-top:1px dotted #ccc;"> <?php echo post_custom('urinushi') ; ?> </div>
  <?php endif; ?>
  <?php endif; ?>
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!-- #post-ID --> 