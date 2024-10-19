<?php
/**
 * looppart-sell.php
 *
 * @テーマ名	hublog
 *
 *excerptなしパターン
 */
?>			

			<article class="post-<?php the_ID(); ?> post clearfix category-sell poststyle-bukken">
				<?php if ( is_new( WHATSNEW_TTL ) ) : ?>
				<span class="tmb-icon new">新着</span>
				<?php endif; ?>
				
				<div class="metabox">

					<div class="excerpt">
						<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"><?php
						echo ( post_custom('catchcopy') ) ? post_custom('catchcopy') : the_title();
						?></a>
						</h2>


						<?php get_template_part('hublog-spec-excerpt', 'sell'); //物件情報抜粋 ?>

						<div class="the_excerpt">
								<?php the_excerpt(); ?>
						</div><!--the_excerpt-->

						<div class="icon-features clearfix"><?php get_template_part('icon-features'); ?></div>
						
					</div><!--excerpt-->

			
				</div><!--metabox-->
				
				

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="medium"><?php
						$thumbnail = get_the_post_thumbnail(get_the_ID(), array(300,180));
						if ( empty($thumbnail) ) :
								?><span class="noimg"></span><?php
						else :
								echo $thumbnail;
						endif; ?>
	
				</a>
				
			<?php if ( is_user_logged_in() ) : ?>
				<?php if ( post_custom('urinushi') ) : ?>
				<div class="user-loggedin clear" style="border-top:1px dotted #ccc;">
				<?php echo post_custom('urinushi') ; ?>
				</div>
				<?php endif; ?>
			<?php endif; ?>

			<span class="to_detail">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">詳細情報</a>
			</span>
			<?php edit_post_link(__('Edit'), ''); ?>

			</article><!-- #post-ID -->
			
