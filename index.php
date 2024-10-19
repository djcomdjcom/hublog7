<?php
/**
 * index.php
 */
 
get_header();
?>

<?php
if ( have_posts() ) {
	get_template_part('loop','index');
} else {
	get_template_part('loop','404');
}
?>

<?php get_footer(); ?>
