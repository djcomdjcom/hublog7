
<section id="inc-map">
<p>

<?php if (post_custom('event-at')) : ?>
<strong><?php echo post_custom('event-at'); ?></strong>
<?php else :?>
<strong><?php echo get_option('profile_shopname'); ?></strong>（<?php echo get_option('profile_address'); ?>）
<?php endif;?>
</p>
	<div class="movie-wrap">

		<iframe width="100%" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?q=<?php echo get_option('profile_address'); ?>&amp;z=17&output=embed&iwloc=B"></iframe>

	
	<?php echo (post_custom('inc-map')) ; ?>
	</div>
</section>
