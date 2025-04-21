<?php
/**
 * looppart-products.php
 *
 * @テーマ名	hublog
 * @更新日付	2012.06.17
 *
 */
?>
<article class="post-<?php the_ID(); ?> post clearfix style-products">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new">新着</span>
  <?php endif; ?>
  <div class="metabox">
    <div class="inbox">
      <div class="products-meta">
        <p class="products-item"> <?php echo post_custom('products-item'); ?> </p>
        <span class="products-kakaku"> <span class="kakaku"><?php echo post_custom('products-kakaku'); ?></span><span class="enn overtext">円～（税別）</span> </span> <span class="products-name"> <?php echo post_custom('products-name'); ?> </span> <span class="products-catchcopy"> <?php echo post_custom('products-catchcopy'); ?> </span> </div>
      <!--products-meta--> 
    </div>
    <!--inbox--> 
    
    <a class="todetail" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => '商品情報「', 'after' => '」詳細ページへ' ) ); ?>">詳細情報</a> </div>
  <!--metabox--> 
  
  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumbnail"> <span class="attachment">
<?php if ( function_exists('the_post_image') && !the_post_image('medium') ) : ?>
  <span class="noimg"></span>
<?php endif; ?>

  </span> </a>
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!--post--> 

