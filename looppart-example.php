<?php
/**
* looppart-example.php
*
* @テーマ名	hublog6
*
*/
?>

<article class="post-<?php the_ID(); ?> style-example post  p-2 p-sm-3 pb-md-3 linkarea">

	<figure href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => '施工事例「', 'after' => '」詳細ページへ' ) ); ?>" class="thumbnail">
	<?php if ( is_new( WHATSNEW_TTL ) ) : ?>
	<span title="新着" class="tmb-icon new">NEW</span>
	<?php endif; ?>
		<span class="attachment">
			<?php if ( function_exists('the_post_image') ) {
				if ( the_post_image(array(600, 600)) === false ){
					?><span class="noimg"></span><?php
				}
			} ?>
		</span>
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

</article><!--post-->


