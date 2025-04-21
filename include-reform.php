<!--▼▼▼リフォーム事例▼▼▼-->
<section id="home-reform" class="wrapper pb-4 pb-md-5">
  <header class="content_header text-sm-center mb-3 mb-md-4">
    <h2 class="ttl mincho">リフォーム施工事例</h2>
    <a class="to_index grid" href="/reform/" title="リフォーム事例一覧ページヘのリンク">一覧</a> </header>
  <script>
jQuery(function($){
$('.posts .post.style-example').addClass('col-6 col-lg-4 ');
});
</script>
  <?php
  $args = array(
    'post_type' => 'reform', //カスタム投稿名
    //            'event_type' => array('newhouse','renovation'),
    //    'order' => 'ASC',
    'orderby' => 'order',
    'posts_per_page' => 9 //表示件数（ -1 = 全件 ）
  );
  $the_query = new WP_Query( $args );
  if ( $the_query->have_posts() ):
    ?>
  <div class="posts row justify-content-start pb-4">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <?php if (is_home()||is_front_page()) :?>
    <article class="post-<?php the_ID(); ?> style-example post  p-2 pb-md-3 linkarea">
      <picture title="<?php the_title_attribute( array( 'before' => '施工事例「', 'after' => '」詳細ページへ' ) ); ?>" class="thumbnail">
        <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
        <span title="新着" class="tmb-icon new">NEW</span>
        <?php endif; ?>
        <span class="attachment">
        <?php if ( function_exists( 'the_post_image' ) && !the_post_image( 'medium' ) ) : ?>
        <span class="noimg"></span>
        <?php endif; ?>
        </span> </picture>
      <?php //get_template_part('cat_icon');//カテゴリーアイコン ?>
      <span class="title mb-0">
      <?php the_title(); ?>
      </span>
      <?php if(post_custom('catchcopy')) :?>
      <p class="d-none d-md-block catchcopy"><?php echo nl2br ( post_custom('catchcopy') ); ?></p>
      <?php endif ;?>
      <span class="todetail"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"> 詳細を見る</a></span>
      <?php edit_post_link(__('Edit'), ''); ?>
    </article>
    <!--post-->
    
    <?php else :?>
    <?php get_template_part('looppart', 'example'); ?>
    <?php endif;?>
    <?php endwhile; ?>
  </div>
  <?php endif; wp_reset_postdata(); ?>
</section>
<!--　home-example　▲▲▲リフォーム事例▲▲▲--> 
