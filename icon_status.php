
<?php
if ( post_custom( 'event-status' ) == '0' ): ?>

<?php
elseif ( post_custom( 'event-status' ) == 'on' ): ?>
<span class="event-status on w100 ">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_evtstts_on@2x.png" alt="予約受付中 "/></span>

<?php
elseif ( post_custom( 'event-status' ) == 'kaisai' ): ?>
<span class="event-status kaisai w100 ">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_evtstts_kaisaichu@2x.png" alt="開催中"/></span>

<?php
elseif ( post_custom( 'event-status' ) == 'koukai' ): ?>
<span class="event-status koukai w100 ">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_evtstts_koukaichu@2x.png" alt="開催中"/></span>

<?php
elseif ( post_custom( 'event-status' ) == 'afewleft' ): ?>
<span class="event-status afewleft w100 ">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_evtstts_afewleft@2x.png" alt="締切り間近"/></span>

<?php
elseif ( post_custom( 'event-status' ) == 'off' ): ?>
<span class="event-status off w100 ">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_evtstts_off@2x.png" alt="受付終了"/></span>

<?php else:?>

<?php endif; ?>

