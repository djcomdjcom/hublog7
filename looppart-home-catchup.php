<?php
/**
 * looppart-homecatchup.php
 *
 * @テーマ名	hublog
 * @更新日付	2012.04.05
 *
 */


$kakaku = ( post_custom('_kakaku-hidden') ) ? '---' : post_custom_cft('kakaku');
$address = post_custom_cft('address1') . post_custom_cft('address2') . post_custom_cft('address3') . post_custom_cft('address4');
?>



			
			<article id="post-<?php the_ID(); ?>"  class="post clearfix post catchup">
	
		
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="medium"><?php
						$thumbnail = get_the_post_thumbnail(get_the_ID(), array(180,180));
						if ( empty($thumbnail) ) :
								?><span class="noimg"></span><?php
						else :
								echo $thumbnail;
						endif; ?>

				</a>



				<div class="metabox">

<?php if( is_object_in_term($post->ID, 'bukken' )): ?>


<section class="spec_excerpt">

				<span class="kakaku">
				
					<span class="bukken-status">
					<?php // 販売ステータス
					
					if ( post_custom('sale-status') == '予約商談中' ){
					?>
					<span class="sale-status-offer shoudanchu"><?php echo post_custom_cft('sale-status') ?></span>
					
					<?php
					} elseif ( post_custom('sale-status') == 'ご成約済み' ) {
					?>
					<span class="sale-status-offer soldout"><?php echo post_custom_cft('sale-status') ?></span>
					<?php
					}
					?>
					</span>

				
				<span class="number"><?php echo $kakaku; ?></span></span>
					<?php if ( post_custom('kakaku-tsubo') ): ?>
				<span class="tsubo">
						坪単価：<?php echo post_custom_cft('kakaku-tsubo'); ?>
				</span>
					<?php elseif ( post_custom('kakaku-m2') ): ?>
				<span class="tsubo">
						平米単価：<?php echo post_custom_cft('kakaku-m2'); ?>
				</span>
					<?php endif; ?>

				<span class="address"><?php echo $address; ?></span>
				

				<?php if ( post_custom('madori') ) : ?>
				<span class="hirosa">
				<span class="madori"><?php echo post_custom_cft('madori') ; ?></span>
				
					<?php if ( post_custom('tochimenseki') ) : ?>
					<span class="menseki">（土地：<span><?php echo post_custom_cft('tochimenseki') ; ?>）</span></span>
					<?php endif; ?>
				
				</span>


				<?php else : ?>
					<?php if ( post_custom('tochimenseki') ) : ?>
				
				<span class="menseki">土地面積：<span><?php echo post_custom_cft('tochimenseki') ; ?></span></span>
				<?php endif; ?>

				<?php endif; ?>
			</section>

				

				<?php endif; ?>


						<h2 class="title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"><?php
																if ( get_post_status() == 'private' ) { echo '非公開：'; }
						echo ( post_custom('catchcopy') ) ? post_custom('catchcopy') : wp_title('');
						?></a>
						</h2>

				</div><!--metabox-->	


	

<?php edit_post_link(__('Edit'), ''); ?>



			</article><!-- div#post-ID -->
			