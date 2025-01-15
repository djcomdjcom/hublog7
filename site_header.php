<?php
/**
 * site_header.php
 * 
 * (extend for header.php)
 */
?>

<header id="header">
<div id="globalheader" class="d-flex">
<div class="sitetitle maxw-260 pl-5 pl-md-0">
<a class="w100 maxw-210" href="/" >
<?php if (is_home() ): ?>
<h1 class="w100 m-0 p-0"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sitetitle@2x.png" alt="<?php echo get_option('profile_corporate_name'); ?>"></h1>
<?php else:?>
<span class="w100"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sitetitle@2x.png" alt="<?php echo get_option('profile_corporate_name'); ?>"></span>
<?php endif;?>
</a>
</div>

<nav id="headnav" class="d-none d-lg-block">
  <?php get_template_part( 'global-navi-menu' ); ?>
</nav>
</div>
</header>
