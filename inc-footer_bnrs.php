<?php //イベントバナー

$args = array(
  'post_type' => 'event_bnr', //カスタム投稿名
  'showposts' => '-1',
  'orderby' => 'menu_order',
  'order' => 'ASC',
  'tax_query' => array(
    array(
      'taxonomy' => 'bnr_type', //タクソノミーnews
      'field' => 'slug',
      'terms' => 'footer_bnr', //ターム名
      //		 'operator' => 'NOT IN',
    ),
  ),
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ):

 ?>

<!--home-event-->
<section class="wrapper" id="footer_bnrs">
	
<p class="text-center">
	<?php
  $terms = get_terms( 'bnr_type');
  foreach ( $terms as $term ){
    echo $term->name; //タームのリンク
  }
?></p>	
  <div class="posts row justify-content-center px-5 px-lg-0 mx-auto">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div id="post-<?php the_ID(); ?>" class="post p-2 <?php if (post_custom('footer_bnr_col')) :?><?php echo (post_custom('footer_bnr_col')) ;?><?php else :?> col-12 col-sm-6 col-lg-3<?php endif;?>">
      <?php if (post_custom('event_bnr_url')) :?>
      <a target="<?php if (post_custom('event_bnr_target')) :?>_blank<?php endif;?>" class=" w100" href="<?php echo(post_custom('event_bnr_url')) ;?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'),the_title_attribute('echo=0')); ?>">
      <?php
      if ( function_exists( 'the_post_image' ) ) {
        if ( the_post_image( array( 300, 100 ) ) === false ) {
          ?>
      <img src="<?php echo get_template_image('noimage');?>" alt="No Image" />
      <?php
      }
      }
      ?>
      </a>
      <?php else :?>
      <span class=" w100" title="<?php printf(__('Permanent Link to %s'),the_title_attribute('echo=0')); ?>">
      <?php
      if ( function_exists( 'the_post_image' ) ) {
        if ( the_post_image( array( 300, 100 ) ) === false ) {
          ?>
      <img src="<?php echo get_template_image('noimage');?>" alt="No Image" />
      <?php
      }
      }
      ?>
      </span>
      <?php endif;?>
      <?php edit_post_link(__('Edit'), ''); ?>
    </div>
    <?php endwhile; ?>
  </div>
</section>
<!--home-event-->

<?php endif; wp_reset_postdata(); ?>
