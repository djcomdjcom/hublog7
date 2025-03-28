

    <div class="profile_googlemap-access"> <?php echo wpautop(get_option('profile_googlemap-access')); ?> </div>
    <?php if (get_option('profile_googlemap')) : ?>
    <div class="profile_googlemap movie-wrap"> <?php echo get_option('profile_googlemap') ; ?> </div>
    <?php else: ?>
    <div class="profile_googlemap movie-wrap">
      <iframe width="100%" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?q=<?php echo get_option('profile_address'); ?>&amp;z=17&output=embed&iwloc=B"></iframe>
    </div>
    <?php endif; ?>
    <?php if (get_option('profile_googlemap02')) : ?>
    <div class="profile_googlemap-access02" style="margin-top:2em;"> <?php echo wpautop(get_option('profile_googlemap-access02')); ?> </div>
    <div class="profile_googlemap movie-wrap"> <?php echo get_option('profile_googlemap2') ; ?> </div>
    <?php endif; ?>
  <!--map--> 
