<?php
/**
 * looppart-event.php
 *
 * @テーマ名	hublog7
 * @更新日付	2025.05.23
 *
 */
?>
<article class="post-<?php the_ID(); ?> post linkarea style-event row px-4 py-4  <?php if (in_category('event-closed')) echo 'closed'; ?>">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new">新着</span>
  <?php endif; ?>
  <figure href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'お客様の声「', 'after' => '」詳細ページへ' ) ); ?>" class="thumbnail col-md-5"> <span class="attachment">

<?php if ( function_exists( 'the_post_image' ) && !the_post_image( 'medium' ) ) : ?>
  <span class="noimg"></span>
<?php endif; ?>
	  
    </span> </figure>
  <div class="metabox col-md-7 col-xl-6 align-self-stretch  py-3 px-0 pl-lg-3 py-xl-0">
    <?php get_template_part('cat_icon');//カテゴリーアイコン ?>
    <?php
    // Use get_post_meta() to fetch the 'catchcopy' field value for the current post.
    $post_id = get_the_ID(); // Ensure you have the correct post ID in a variable.
    $catchcopy = get_post_meta( $post_id, 'catchcopy', true );

    if ( !empty( $catchcopy ) ): ?>
    <p class="title catchcopy"><?php echo nl2br(esc_html($catchcopy)); ?></p>
    <?php else: ?>
    <p class="title d-none d-md-block mb-0">
      <?php the_title(); ?>
    </p>
    <?php endif; ?>
    <div class="event-meta pl-md-4">
      <?php if ( post_custom('event-date') ) :?>
      <span class="event-date"> <span>開催日：</span><?php echo ( post_custom('event-date') ) ;?></span>
      <?php endif  ?>
      <?php if (post_custom('event-hour')) : ?>
      <span class="event-hour"> <span>開催時間：</span><?php echo post_custom('event-hour'); ?> </span>
      <?php endif  ?>
      <?php if (post_custom('event-at')) : ?>
      <span class="event-at"> <span>開催場所：</span><?php echo post_custom('event-at'); ?> </span>
      <?php endif  ?>
      <span class="to_detail">More Info</span> </div>
    <!--event-nmeta--> 
  </div>
  <span class="todetail"> <a class="" href="<?php if(post_custom('events-page_url')) :?><?php echo(post_custom('events-page_url')) ;?>" target="_blank<?php else :?><?php the_permalink(); ?><?php endif;?>" rel="bookmark" title="<?php the_title(); ?>">詳細・参加方法</a> </span> 
  
  <!--metabox-->
  <?php get_template_part('icon_status');//ステイタスアイコン ?>
  <?php if (in_category('event-closed')) : ?>
  <a href="<?php if(post_custom('events-page_url')) :?><?php echo(post_custom('events-page_url')) ;?>" target="_blank<?php else :?><?php the_permalink(); ?><?php endif;?>" class="event-closed"> <span>このイベントは終了しました。<br />
  ありがとうございました。</span> </a>
  <?php endif  ?>
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
