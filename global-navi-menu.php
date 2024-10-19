<div class="home-menu">
  <ul class="menu">
    <?php
    wp_nav_menu( array(
      'container' => '',
      'items_wrap' => '%3$s',
      'theme_location' => 'global-navi',
    ) );
    ?>
    <?php get_template_part( 'links-offer' ); ?>
    <?php if (get_option('profile_sns_ig')): ?>
    <li class="links_offer to_sns to_ig p-0 d-none d-inline-block"> <a target="_blank" class="w100" href="<?php echo get_option('profile_sns_ig'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/snsicon-ig.webp" width="64" height="64" alt="Instaramアイコン"></a></li>
    <?php endif;?><?php get_template_part('looppart','smaple'); ?>
  </ul>
</div>
