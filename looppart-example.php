<?php
/**
 * looppart-example.php
 *
 * @テーマ名	hublog6
 *
 */
?>

<article class="post-<?php the_ID(); ?> style-example post  p-2 p-sm-3 pb-md-3 linkarea">
  <figure class="post-thumbnail">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('medium', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
      <?php else : ?>
        <span class="noimg" aria-hidden="true"></span>
      <?php endif; ?>
		
    <?php
    // 投稿に割り当てられたカテゴリーを取得します。
    $terms = get_the_terms( get_the_ID(), 'ex_cat' );
    if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
      foreach ( $terms as $term ) {
        echo '<span class="cat_icon ' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</span>';
      }
    }
    ?>
  </figure>	
	
  <?php if(post_custom('catchcopy')) :?>
  <p class="title catchcopy"><?php echo nl2br ( post_custom('catchcopy') ); ?></p>
  <?php else :?>
  <p class="title mb-0">
    <?php the_title(); ?>
  </p>
  <?php endif ;?>
  <span class="todetail"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"> 詳細を見る</a></span>
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!--post--> 

