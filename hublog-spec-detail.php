<?php
/**
 * 物件概要一覧表示：売買物件
 *
 */
?>

<div id="bukken_spec" >
	<h2 class="title">物件名：  <?php echo post_custom_cft('bukken-name'); ?></h2>	


<div id="bukken_spec-header" class="clearfix flexbox">
  <section class="spec_topics w50 l-box">
    <?php get_template_part('hublog-spec-excerpt', $in_cat); //物件情報抜粋 ?>
  </section>

	<?php
	global $hublog_cft;
	if ( is_object($hublog_cft) ) :
		
    echo '<section id="spec_area" class="clearfix w50 r-box">';
    echo $hublog_cft->bukken_spec('spec_area');
    echo '</section><!--spec_area-->';
    endif;	?>
  </div><!--bukken_spec-header-->
<div class="inbox">
	<?php
	global $hublog_cft;
	if ( is_object($hublog_cft) ) :
		if ( post_is_in_category_slug('sell') || post_is_in_taxonomy_slug('sell','bukken') ){
			echo $hublog_cft->bukken_spec('cost_condo');
			if ( in_category(array('usedcondo','newcondo')) ){
				$myargs = array(
					'tatemonomenseki' => array( 'label'=>'専有面積「㎡」'),
					'tatemonomenseki-tsubo' => array( 'label'=>'専有面積「坪」'),
				);
    echo '<section class="spec_tatemono">';
				echo $hublog_cft->bukken_spec('spec_tatemono', $myargs);
				echo $hublog_cft->bukken_spec('spec_tatemono_condo');
    echo '</section>';
    
			} else {
    echo '<section class="spec_tatemono">';
				echo $hublog_cft->bukken_spec('spec_tatemono');
    echo '</section>';
			}
			
		} elseif ( post_is_in_category_slug('rent') || post_is_in_taxonomy_slug('rent','bukken') ) {
    echo '<section class="spec_rent">';
			echo $hublog_cft->bukken_spec('cost_rent');
			echo $hublog_cft->bukken_spec('spec_tatemono');
			echo $hublog_cft->bukken_spec('spec_tatemono_condo');
    echo '</section>';
		
		}
    echo '<section class="spec_tochi">';
		echo $hublog_cft->bukken_spec('spec_tochi');
    echo '</section>';
    echo '<section class="spec_setsubi">';
		echo $hublog_cft->bukken_spec('spec_setsubi');
    echo '</section>';
	endif;
	?>
    <section class="spec_law">
    <?php echo $hublog_cft->bukken_spec('spec_law');?>
    </section>

  <section class="spec_torihiki">
    <h3>取引に関する情報</h3>	
    <table class="bukken_spec" summary="取引に関する情報">
      <tbody>
        <?php if ( post_custom('genkyou_s') ) : ?>
        <tr>
          <th>現況</th>
          <td><?php echo post_custom_cft('genkyou_s'); ?></td>
        </tr>
        <?php endif; ?>
        <?php if ( post_custom('genkyou_r') ) : ?>
        <tr>
          <th>現況</th>
          <td><?php echo post_custom_cft('genkyou_s'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if ( post_custom('hikiwatashi') ) : ?>
        <tr>
          <th>引渡し</th>
          <td><?php echo post_custom_cft('hikiwatashi'); ?></td>
        </tr>
        <?php endif; ?>

        <?php if ( post_custom('torihiki') ) : ?>
        <tr>
          <th>取引態様</th>
          <td><?php echo post_custom_cft('torihiki'); ?></td>
        </tr>
        <?php endif; ?>
        <?php if ( post_custom('company') ) : ?>
        <tr>
          <th>管理会社</th>
          <td><?php echo post_custom_cft('company'); ?></td>
        </tr>
        <?php endif; ?>			
        </tr>
      </tbody>
    </table>
    </section>

<section id="spec_note" class="clearfix">
<?php   echo $hublog_cft->bukken_spec('spec_note');?>
</section><!--spec_note-->
    
    
	<?php
//	global $hublog_cft;
//	if ( is_object($hublog_cft) ) :
		
//		echo $hublog_cft->bukken_spec('spec_torihiki_r');
//		echo $hublog_cft->bukken_spec('spec_torihiki_s');
//		echo $hublog_cft->bukken_spec('spec_torihiki');

//    echo '<section id="spec_area" class="clearfix">';
//    echo $hublog_cft->bukken_spec('spec_area');
//    echo '</section><!--spec_area-->';

//    echo '<section id="spec_note" class="clearfix">';
//    echo $hublog_cft->bukken_spec('spec_note');
//    echo '</section><!--spec_note-->';
//    endif;
	?>

</div><!--inbox-->
</div><!-- #bukken_spec -->
