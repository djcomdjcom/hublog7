<?php
/**
 * releated-posts.php : ポストインページなどで使用
 */

global $post;


$inc_ID = ( post_custom('inc_ID') ) ? post_custom('inc_ID') : post_custom('Cat_ID');
if ( is_numeric($inc_ID) && (int)$inc_ID > 0 ) : 
	$inc_ID = (int)$inc_ID;
	//init for Post in Page
	$inc_description = ( post_custom('inc_description') ) ? post_custom('inc_description') : post_custom('Cat_description');
	$inc_looppart    = ( post_custom('inc_looppart') && ctype_alnum(post_custom('inc_looppart')) ) ? post_custom('inc_looppart') : '';
	$inc_showposts   = ( post_custom('inc_showposts')   ) ? (int)post_custom('inc_showposts') : (int)post_custom('showposts'); 
	$pip_args['showposts'] = ( empty($inc_showposts) ) ? 10 : $inc_showposts;
	switch( post_custom('inc_type') ) :
		case 'author' :
			$pip_args['author'] = $inc_ID;
			break;
		case 'tag_id' :
			$pip_args['tag_id'] = $inc_ID;
			break;
		case 'bukken' :
			$pip_args['tax_query'] = array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'bukken',
					'field' => 'id',
					'terms' => array($inc_ID),
				)
			);
			break;
		case 'category' :
		default: //カテゴリーを選択したとみなす
			$pip_args['cat'] = $inc_ID;
	endswitch;
	?>


		<section class="releated-posts wrapper">

		<?php echo $inc_description; ?>
		
		<div class="posts archive clearfix px-3">
		<?php 
			query_posts($pip_args);
			while ( have_posts() ) : the_post();
				get_template_part('looppart', $inc_looppart);
			endwhile;
			wp_reset_query();
		?>
		</div>

		<?php if (post_custom('inc_after')) : ?>

			<?php echo post_custom('inc_after'); ?>
		<?php endif //inc_description ?>


		</section><!--releated-posts-->


		
<?php endif; ?>	

