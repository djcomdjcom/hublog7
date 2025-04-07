<?php
/**
 * looppart-reform.php
 * hublog6
 * 20230202
 */
?>
<article class="post-<?php the_ID(); ?> post row justify-content-around style-reform linkarea col-sm-12 py-3 py-md-4 mb-md-4 mb-lg-5">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span title="新着" class="tmb-icon new">NEW</span>
  <?php endif; ?>
  <span title="<?php the_title_attribute( array( 'before' => 'リフォーム事例「', 'after' => '」詳細ページへ' ) ); ?>" class="col-sm-4  mb-3 mb-sm-0 thumbnail"> <span class="attachment">
  <?php
  if ( function_exists( 'the_post_image' ) ) {
      if ( the_post_image( 'thumbnail' ) === false ) {
          ?>
  <span class="noimg"></span>
  <?php
  }
  }
  ?>
  </span> </span>
  <div class="metabox col-sm-8 align-self-stretch">
    <p class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
      <?php the_title(); ?>
      </a></p>
    <div class="reform-nmeta">
		
		
<?php $reform_youbou = SCF::get('reform-youbou', get_the_ID()); ?>
<?php if ( $reform_youbou ) : ?>
  <dl class="reform-youbou">
    <dt class="title">お客様のご要望・お悩み</dt>
    <dd class="postcustom"> <?php echo wpautop(esc_html($reform_youbou)); ?> </dd>
  </dl>
<?php endif; ?>

		
    </div>
    <!--event-nmeta--> 
  </div>
  <!--metabox--> 
  <span class="todetail"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"> 詳細を見る</a></span>
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
