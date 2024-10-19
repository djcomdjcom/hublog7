<?php
/**
 * hublog-hublog-inquiry_bukken.php
 *
 * @テーマ名	hublog
 *
 */


?>
<div id="form" class="hublog-inquiry single clearfix cleartype popup">
	<span class="title">物件のお問い合せ</span>
	<div class="inbox">
		<div class="hublog-inquiry-btn">
		<?php echo do_shortcode((string)get_option('hublog_wpcf7_estate')); ?>
		</div>
		
		<div class="hublog-inquiry-tel">
		
			<span class="profile_inquiry_tel"><span>お問い合せ電話番号</span><?php
			$profile_inquiry_tel = (get_option('profile_inquiry_tel')) ? get_option('profile_inquiry_tel') : get_option('profile_main_tel');
			if (!empty($profile_inquiry_tel)) : ?>&nbsp;<span class="telnum"><?php echo $profile_inquiry_tel; ?>&nbsp;</span><?php endif;
			?>
			</span>

			<div class="opning-hour-day">
				<span class="profile_opening_hours"><span class="title">営業時間：</span><?php echo (get_option('profile_opening_hours')) ?>
				</span>

				<?php if (get_option('profile_holiday')) : ?>
				  <span class="profile_holiday"><span class="title">定休日：</span><?php echo (get_option('profile_holiday')) ?></span>
				<?php endif; ?>
			</div><!--opning-hour-day-->
		</div>
		<!--hublog--tel-->
	</div><!--inbox-->
</div>
<!--hublog-inquiry-->


