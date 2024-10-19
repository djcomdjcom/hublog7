<?php
/**
 * hublog/hublog-spec-excerpt.php
 *
 * 物件情報の抜粋表示（価格（賃料）、所在地、面積、最寄駅、駅からの徒歩時間）
 */
?>


<?php
$kakaku = ( post_custom('_kakaku-hidden') ) ? '---' : post_custom_cft('kakaku');
$chinryo = ( post_custom('_chinryo-hidden') ) ? '---' : post_custom_cft('chinryo');
$address = post_custom_cft('address1') . post_custom_cft('address2') . post_custom_cft('address3') . post_custom_cft('address4');
?>

<table class="spec_excerpt">

		<?php
			// 販売ステータス
			if ( post_custom('sale-status') == '予約商談中' ){
				?>
	<tr class="bukken-status">
		<th colspan="2">
			<div class="sale-status-offer shoudanchu"><?php echo post_custom_cft('sale-status') ?></div>
		</th>
	</tr>
	<?php
			} elseif ( post_custom('sale-status') == 'ご成約済み' ) {
				?>
	<tr class="bukken-status">
		<th colspan="2">
			<div class="sale-status-offer soldout"><?php echo post_custom_cft('sale-status') ?></div>
		</th>
	</tr>


		<?php
			}
			?>
	
	<?php if ( post_is_in_taxonomy_slug('sell','bukken') ) : ?>

		<tr class="kakaku sell">
			<th><span>価格</span></th>
			<td>
				<span class="number"><?php echo $kakaku; ?></span>
				<span class="tsubo">
					<?php if ( post_custom('kakaku-tsubo') ): ?>
						坪単価：<?php echo post_custom_cft('kakaku-tsubo'); ?>
					<?php elseif ( post_custom('kakaku-m2') ): ?>
						平米単価：<?php echo post_custom_cft('kakaku-m2'); ?>
					<?php endif; ?>
				</span>
			</td>
		</tr>

	<?php elseif ( post_is_in_taxonomy_slug('rent','bukken') ) : ?>

		<tr class="kakaku rent">
			<th><span>賃料</span></th>
			<td>
				<span class="number"><?php echo $chinryo; ?></span>
			
				<div>            
					<?php if ( post_custom('kanrihi') ) : ?>
						<span class="r_kanrihi">管理費：<?php echo post_custom_cft('r_kanrihi'); ?></span>
					<?php elseif ( post_custom('kanrihi') ) : ?>
						<span class="r_kyouekihi">共益費：<?php echo post_custom_cft('r_kyouekihi'); ?></span>
					<?php endif; ?>
					
					<?php if ( post_custom('shuuzen') ) : ?>		
						<span class="shuuzen">修繕費：<?php echo post_custom_cft('shuuzen'); ?></span>
					<?php endif; ?>
				</div>                    
			</td>
		</tr>

	<?php endif; // kakaku:chinryo ?>

	<tr class="address">
		<th>所在地</th>
		<td><?php echo $address; ?>&nbsp;</td>
	</tr>

	<?php if ( post_custom('madori') ) : ?>
		<tr class="madori">
			<th>間取</th>
			<td><?php echo post_custom_cft('madori') ; ?>&nbsp;</td>
		</tr>
	<?php elseif ( post_custom('tochimenseki') ) : ?>
		<tr class="menseki">
			<th>面積</th>
			<td><?php echo post_custom_cft('tochimenseki') ; ?>&nbsp;</td>
		</tr>
	<?php endif; ?>

	<tr class="station">
		<th>最寄駅</th>
		<td><span><?php echo post_custom_cft('line'), '&nbsp;', post_custom_cft('station'); ?></span></td>
	</tr>
	
	<tr class="ekiyori">
		<th>駅より</th>
		<td><span><?php 
				$toho = post_custom_cft('toho');
				echo $toho;
				if ( is_numeric($toho) ){
					echo '&nbsp;分';
				}
			?></span></td>
	</tr>

</table><!-- .spec_excerpt -->
