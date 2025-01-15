<?php
/**
 * /header.php
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php
	if ( is_home() || is_front_page() ) {
		bloginfo( 'name' ); 
	} else {
		wp_title(' | ',true,'right');
		bloginfo('name');
	}
?></title>
	
<?php wp_head(); ?>
	
</head>
<?php if (is_singular(array('lp','tnx') )): ?>
<?php get_template_part('code', 'fbpixel'); ?>
<?php endif;?>

<?php
$pagename = '';
$page_class = '';
if ( is_home() || is_front_page() ){
	$pagename = 'home';
} elseif ( is_page() ) {
	$pageObj = get_page(get_the_ID());
	if ($pageObj) {
		$page_name = $pageObj->post_name; //post_name is slug
		if ( $page_name ) {
			$page_class = 'page-' . $page_name;
		}
	}
	$pagename = $page_name;
}
?>
<body <?php body_class(); ?>>
<?php get_template_part( 'site_header' ); ?>
<div id="breadcrumb" class="breadcrumbs wrapper" vocab="https://schema.org/" typeof="BreadcrumbList">
  <div class="inbox">
    <?php
    if ( function_exists( 'bcn_display' ) ) {
      bcn_display();
    }
    ?>
  </div>
</div>
<?php
global $hublog6;
$topinfo_template = $hublog6->get_page_type();
$looppart = apply_filters('looppart', '');
?>	
<?php //get_template_part('topinfo', $topinfo_template); ?>
<main role="main" id="main" <?php body_class('rel_lb'); ?> ontouchstart="">
