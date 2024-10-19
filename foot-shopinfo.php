<?php
/**
 * foot-shopinfo.php 
 *
 * @テーマ名	hublog
 * 全てのサイドバーに表示されるパーツ
 * @更新日付	2012.04.06
 */
?>




<?php if (get_option('profile_corporate_name')) : ?>
	<article id="footwidget-shopinfo" class="cleartype clearfix">
	
<div class="inbox">

		<span class="title profile_corporate_name">
		<span class="blogname"><?php echo get_option('profile_corporate_name'); ?></span>
		<?php $header_image = get_header_image(); ?>
		<?php if ( ! empty( $header_image ) ) : ?>
		<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" alt="<?php echo get_option('profile_corporate_name'); ?>" />
		<?php endif; ?>
		</span>
		
		<?php if (get_option('profile_address')) : ?>
		
			<span class="profile_address">
			<?php if (get_option('profile_postcode')) : ?>
			<span class="postcode"><?php echo '〒' . get_option('profile_postcode'); ?></span>
			<?php endif; ?>
			<span class="address"><?php echo get_option('profile_address'); ?></span>
			</span>
		<?php endif; ?>
		
		
		
		<?php if (get_option('profile_inquiry_tel')) : ?>
		
		<span class="tel">
			<?php $profile_inquiry_tel = (get_option('profile_inquiry_tel')) ? get_option('profile_inquiry_tel') : get_option('profile_main_tel');
					if (!empty($profile_inquiry_tel)) : ?>
					<span class="title">TEL：</span><span class="number"><?php echo $profile_inquiry_tel; ?></span><?php endif; ?>
		</span>
		<?php endif; ?>


		<?php if (get_option('profile_opening_hours')) : ?>
		<span class="profile_opening_hours"><span class="title">営業時間：</span><?php echo (get_option('profile_opening_hours')) ?>
		</span>
		<?php endif; ?>

		<?php if (get_option('profile_holiday')) : ?>
		<span class="profile_holiday"><span class="title">定休日：</span><?php echo (get_option('profile_holiday')) ?>
		</span>
		<?php endif; ?>

		<?php if (get_option('profile_licentiate')) : ?>
		<span class="profile_licentiate"><?php echo wpautop( get_option('profile_licentiate')); ?></span>
		<?php endif; ?>
		

		<?php if (get_option('profile_photo')) : ?>
		<span class="profile_photo"><?php echo (get_option('profile_photo')) ?>
		</span>
		<?php endif; ?>

		<span class="to_inquiry">
			<a href="/inquiry">お問合せ</a>
		</span><!--to_inquiry-->
<?php endif; ?>
</div><!--inbox-->


</article>
